<?php if ($cart_rs->rowCount() != 0) { ?>
    <div class="col-9">
        <div class="page-title">
            <div>確認商品</div>
            <div><button class="btn btn-reon-b" onclick="btn_confirmLink('確定清空購物車？','shopcart_del.php?mode=2')"><i class="fa-solid fa-eraser"></i> 清空購物車</button></div>
        </div>
        <div class="container">
            <?php
            $SQLstring = "SELECT * FROM cart, product, product_img WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "'AND orderid IS NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
            $cart_rs = $link->query($SQLstring);
            $subtotal = 0;
            $fee = 100;
            ?>
            <form action="checkout.php" method="post" id="cartForm1" name="cartForm1">
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5% ; text-align:center">編號</th>
                            <th scope="col" style="width: 10%;">商品圖示</th>
                            <th scope="col" style="width: 35%;">商品名稱</th>
                            <th scope="col" style="width: 5%; text-align:center">單價</th>
                            <th scope="col" style="width: 15%; text-align:center">數量</th>
                            <th scope="col" style="width: 10%; text-align:center">金額</th>
                            <th scope="col" style="width: 10%; text-align:center">下次再買</th>
                            <th scope="col" style="width: 10%; text-align:center">加入收藏</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($cart_data = $cart_rs->fetch()) {
                            $lineTotal = $cart_data['p_price'] * $cart_data['qty'];
                            $subtotal += $lineTotal;
                        ?>
                            <tr>
                                <th scope="row" style="text-align:center;"><?php echo $cart_data['p_id'] ?></th>
                                <td><img src="images/<?php echo $cart_data['img_file'] ?>" class="img-fluid"></td>
                                <td><?php echo $cart_data['p_name'] ?></td>
                                <td style="text-align:center;"><?php echo $cart_data['p_price'] ?></td>
                                <td style="text-align:center;">
                                    <div style="display: flex;justify-content:center;">
                                        <div class="input-group w-75">
                                            <input id="qty[]" name="qty[]" cartid="<?php echo $cart_data['cartid'];?>" type="number" class="form-control" value="<?php echo $cart_data['qty'] ?>" required min="1" max="50">
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align:center;"><?php echo $lineTotal ?></td>
                                <td style="text-align:center;"><button class="btn btn-reon-b" type="button" id="btn[]" name="btn[]" onclick="btn_confirmLink('確認移除本商品？','shopcart_del.php?mode=1&cartid=<?php echo $cart_data['cartid']; ?>')"><i class="fa-regular fa-trash-can"></i></button></td>
                                <td style="text-align:center;"><button class="btn btn-reon-b"><i class="fa-regular fa-heart"></i></button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <br>
            <br>
            <br>
            <table class="table table-borderless" style="text-align: center ;">
                <tr>
                    <td style="width: 30%;">商品總額</td>
                    <td style="width: 5%;"></td>
                    <td style="width: 30%;">運費</td>
                    <td style="width: 5%;"></td>
                    <td style="width: 30%;">本次消費總計</td>
                </tr>
                <tr>
                    <td>
                        <h1>$<?php echo  $subtotal; ?></h1>
                    </td>
                    <td>
                        <h1>+</h1>
                    </td>
                    <td>
                        <h1>$<?php echo $fee; ?></h1>
                    </td>
                    <td>
                        <h1>=</h1>
                    </td>
                    <td>
                        <h1 style="font-weight: bolder;">$<?php echo $subtotal + $fee; ?></h1>
                    </td>
                </tr>
            </table>
            <div style="display: flex;justify-content:center;margin:50px;">
                <button class="btn btn-reon-b-order"><a href="shopping.php">繼續選購</a></button>
                <button class="btn btn-reon-nextstep"><a href="checkout.php">下一步</a></button>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <div class="col-9">
        <div class="page-title">
            <div>確認商品</div>
        </div>
        <div class="alert alert-light" role="alert" style="margin:20px;">
            購物車目前沒有商品呦！快去挑選喜歡的商品吧！
            <button class="btn btn-reon-b-order"><a href="shopping.php">逛街去</a></button>
        </div>
    </div>
<?php
};
?>
<div class="col-3">
    <div id="plus_area">
        <h5>經典加購</h5>
        <div class="plus-item">
        </div>
    </div>
</div>