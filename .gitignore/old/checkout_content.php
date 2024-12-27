<?php
// 取得收件者地址資料
$SQLstring = sprintf("SELECT *, city.Name AS ctName, town.Name AS toName 
    FROM addbook 
    LEFT JOIN town ON addbook.myzip = town.Post 
    LEFT JOIN city ON town.AutoNo = city.AutoNo 
    WHERE emailid='%d' AND setdefault='1'", $_SESSION['emailid']);
$addbook_rs = $link->query($SQLstring);
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

<div class="col-1"></div>
<div class="col-7">
    <div class="page-title" style="margin-right:0;">
        <div class="location">
            <div class="location_item">確認商品</div>
            <div class="location_item">></div>
            <div class="location_item"><a href="#">確認結帳資訊</a></div>
            <div class="location_item">></div>
            <div class="location_item">完成訂購</div>
        </div>
        <div><button class="btn btn-reon-b"><i class="fa-solid fa-rotate-left"></i><a href="cart.php"> 返回上一步</a></button></div>
    </div>







    <div class="container" style="display:flex; margin-left:2%;">
        <div class="deliver-info col">
            <div style="display: flex; justify-content:space-between;height:fit-content;margin-bottom:20px;">
                <h5>配送資訊 </h5>
                <div class="change-info" data-bs-toggle="modal" data-bs-target="#infoModal">變更收件人</div>
            </div>
            <p>收件人：<?php echo $cname; ?></p>
            <p>連絡電話：<?php echo $mobile; ?></p>
            <p>配送地址：<?php echo $fullAddress; ?></p>
        </div>
        <div class="pay-info col">
            <div style="display: flex; justify-content:space-between;height:fit-content;margin-bottom:20px;">
                <h5>付款資訊 </h5>
            </div>
            <p>付款方式：貨到付款</p>
            <p>付款人：<?php echo $cname; ?></p>
            <p>連絡電話：<?php echo $mobile; ?></p>
            <p>配送地址：<?php echo $fullAddress; ?></p>
        </div>
    </div>







    
    <div style="display: flex;justify-content:center;margin:50px;">
        <button class="btn btn-reon-b-order"><a href="shopping.php">繼續選購</a></button>
        <button class="btn btn-reon-nextstep" type="button" id="btn04" name="btn04"><a href="#">確認下單</a></button>
    </div>
</div>

<!-- Modal -->
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

<div class="col-3">
    <div id="list_area">
        <h5>購買清單</h5>
        <br>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 50%;">商品</td>
                        <td style="width: 20%;text-align:center;">數量</td>
                        <td style="width: 30%;text-align:center;">小計</td>
                    </tr>
                </thead>
                <?php
                $SQLstring = "SELECT * FROM cart, product, product_img WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "'AND orderid IS NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
                $cart_rs = $link->query($SQLstring);
                $subtotal = 0;
                $fee = 100;

                while ($cart_data = $cart_rs->fetch()) {
                    $lineTotal = $cart_data['p_price'] * $cart_data['qty'];
                    $subtotal += $lineTotal;
                ?>
                    <tr>
                        <td style="width: 50%;"><?php echo $cart_data['p_name'] ?></td>
                        <td style="width: 20%;text-align:center;"><?php echo $cart_data['qty'] ?></td>
                        <td style="width: 30%;text-align:center;"><?php echo $lineTotal ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <table class="table table-borderless">
                <tr>
                    <td style="width: 70%;">運費</td>
                    <td style="width: 30%;text-align:center;"><?php echo $fee; ?></td>
                </tr>
                <tr style="font-weight:bolder;font-size:1.2rem;">
                    <td>總金額</td>
                    <td style="text-align:center;"><?php echo $subtotal; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="col-1"></div>