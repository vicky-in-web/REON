<?php
if ($cart_rs->rowCount() != 0) {
    $SQLstring = "SELECT * FROM cart, product, product_img WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "'AND orderid IS NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
    $cart_rs = $link->query($SQLstring);
    $subtotal = 0;
    $fee = 100;
?>
    <div class="page-title">
        <div class="location">
            <div>確認訂購資訊</div>
        </div>
        <div><button class="btn btn-reon-b-clear" onclick="btn_confirmLink('確定清空購物車？','shopcart_del.php?mode=2')"><i class="fa-solid fa-eraser"></i> 清空購物車</button></div>
    </div>

    <div class="cart-list">
        <form action="checkout.php" method="post" id="cartForm1" name="cartForm1">
            <div class="cart-list-row list-head">
                <div class="cart-list-up">
                    <div class="list-pic">商品圖片</div>
                    <div class="list-name">商品名稱</div>
                </div>
                <div class="cart-list-down">
                    <div class="list-price">單價</div>
                    <div class="list-num">數量</div>
                    <div class="list-total">總額</div>
                </div>
                <div class="cart-list-footer">
                    <div class="list-del">下次再買</div>
                    <div class="list-heart">加入收藏</div>
                </div>
            </div>
            <?php
            while ($cart_data = $cart_rs->fetch()) {
                $lineTotal = $cart_data['p_price'] * $cart_data['qty'];
                $subtotal += $lineTotal;
            ?>
                <div class="cart-list-row">
                    <div class="cart-list-up">
                        <div class="list-pic">
                            <img src="images/<?php echo $cart_data['img_file'] ?>" class="img-fluid">
                        </div>
                        <div class="list-name">
                            <?php echo $cart_data['p_name'] ?>
                        </div>
                    </div>
                    <div class="cart-list-down">
                        <div class="list-price">
                            NT$<?php echo $cart_data['p_price'] ?>
                        </div>
                        <div class="list-num">
                            <div style="display: flex;justify-content:center;">
                                <div class="input-group">
                                    <input id="qty[]" name="qty[]" cartid="<?php echo $cart_data['cartid']; ?>" type="number" class="form-control" value="<?php echo $cart_data['qty'] ?>" required min="1" max="50">
                                </div>
                            </div>
                        </div>
                        <div class="list-total">
                            NT$<?php echo $lineTotal ?>
                        </div>
                    </div>
                    <div class="cart-list-footer">
                        <div class="list-del">
                            <button class="btn btn-reon-b-del" type="button" id="btn[]" name="btn[]" onclick="btn_confirmLink('確認移除本商品？','shopcart_del.php?mode=1&cartid=<?php echo $cart_data['cartid']; ?>')">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </div>
                        <div class="list-heart">
                            <button class="btn btn-reon-b-heart"><i class="fa-regular fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </form>
    </div>

    <?php
    // 取得收件者地址資料
    $SQLstringbook = sprintf("SELECT *, city.Name AS ctName, town.Name AS toName 
    FROM addbook 
    LEFT JOIN town ON addbook.myzip = town.Post 
    LEFT JOIN city ON town.AutoNo = city.AutoNo 
    WHERE emailid='%d' AND setdefault='1'", $_SESSION['emailid']);
    $addbook_rs = $link->query($SQLstringbook);
    if ($addbook_rs && $addbook_rs->rowCount() != 0) {
        $data = $addbook_rs->fetch();
        $cname = $data['cname'];
        $mobile = $data['mobile'];
        $address = $data['address'];

        $fullAddress = '';
        if (!is_null($data['myzip'])) {
            $fullAddress .= $data['myzip'];
            if (!empty($data['ctName'])) $fullAddress .= $data['ctName'];
            if (!empty($data['toName'])) $fullAddress .= $data['toName'];
        }
        $fullAddress .= $address;
    }
    ?>
    <div class="payment">
        <div class="payment-content">
            <div class="payment-info-title">付款及配送資訊</div>
            <div class="info-content">
                <div class="info-content-item">
                    <div>收件 / 付款人</div>
                    <div><?php echo $cname; ?></div>
                </div>
                <div class="info-content-item">
                    <div>連絡電話</div>
                    <div><?php echo $mobile; ?></div>
                </div>
                <div class="info-content-item">
                    <div>收件地址</div>
                    <div><?php echo $fullAddress; ?></div>
                </div>
                <div class="btn-change" data-bs-toggle="modal" data-bs-target="#infoModal">變更資訊</div>
            </div>
        </div>
        <div class="total-content">
            <div class="total-price-title">訂單資訊</div>
            <div class="total-price-content">
                <div class="price-content-item">
                    <div>小計</div>
                    <div>$<?php echo  $subtotal; ?></div>
                </div>
                <div class="price-content-item">
                    <div>運費</div>
                    <div>$<?php echo $fee; ?></div>
                </div>
                <hr>
                <div class="price-content-item">
                    <div>總計</div>
                    <div>$<?php echo $subtotal + $fee; ?></div>
                </div>
            </div>
            <div class="total-price-btn">
                <a href="shopping.php"><button class="btn btn-reon-b-backtoshop">繼續選購</button></a>
                <a href="shopping.php"><button class="btn btn-reon-nextstep" type="button" id="btn04" name="btn04">送出訂單</button></a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">收件人資訊</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="cname" id="cname" class="form-control" placeholder="收件者姓名">
                            </div>
                            <div class="col">
                                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="收件者電話">
                            </div>
                            <div class="col">
                                <select name="myCity" id="myCity" class="form-control">
                                    <option value="">請選擇市區</option>
                                    <?php
                                    $city = "SELECT * FROM city WHERE State=0";
                                    $city_rs = $link->query($city);
                                    while ($city_rows = $city_rs->fetch()) {
                                    ?>
                                        <option value="<?php echo $city_rows['AutoNo']; ?>"><?php echo $city_rows['Name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <select name="myTown" id="myTown" class="form-control">
                                    <option value="">選擇鄉鎮市</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input type="hidden" name="myZip" id="myZip">
                                <label for="address" class="form-label" id="zipcode" name="zipcode">郵遞區號</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="請輸入後續地址">
                            </div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-auto">
                                <button type="button" class="btn btn-success" id="recipient" name="recipient">新增收件人</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <?php
                    $SQLstring = sprintf(
                        "SELECT *, city.Name AS ctName, town.Name AS toName FROM addbook LEFT JOIN town ON addbook.myzip = town.Post LEFT JOIN city ON town.AutoNo = city.AutoNo WHERE emailid='%d'",
                        $_SESSION['emailid']
                    );
                    $addbook_rs = $link->query($SQLstring);
                    ?>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">收件人姓名</th>
                                <th scope="col">電話</th>
                                <th scope="col">地址</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($addbook_rs && $addbook_rs->rowCount() != 0) {
                                while ($data = $addbook_rs->fetch()) {
                                    $fullAddress = '';
                                    if (!is_null($data['myzip'])) {
                                        $fullAddress .= $data['myzip'];
                                        if (!empty($data['ctName'])) $fullAddress .= $data['ctName'];
                                        if (!empty($data['toName'])) $fullAddress .= $data['toName'];
                                    }
                                    $fullAddress .= $data['address'];
                            ?>
                                    <tr>
                                        <th scope="row">
                                            <input type="radio"
                                                name="gridRadios"
                                                id="gridRadios[]"
                                                value="<?php echo $data['addressid']; ?>"
                                                <?php echo ($data['setdefault'] == '1') ? 'checked' : ''; ?>>
                                        </th>
                                        <td><?php echo $data['cname']; ?></td>
                                        <td><?php echo $data['mobile']; ?></td>
                                        <td><?php echo $fullAddress; ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php
} else {
?>
    <div class="page-title">
        <div class="location">
            <div>確認訂購資訊</div>
        </div>
    </div>
    <div class="alert alert-light" role="alert" style="margin:20px;">
        購物車目前沒有商品呦！快去挑選喜歡的商品吧！
        <a href="shopping.php"><button class="btn btn-reon-b-order">逛街去</button></a>
    </div>
<?php
};
?>