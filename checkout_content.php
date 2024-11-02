<div class="col-9">
    <div class="page-title">
        <div class="location">
            <div class="location_item">確認商品</div>
            <div class="location_item">></div>
            <div class="location_item"><a href="#">確認結帳資訊</a></div>
            <div class="location_item">></div>
            <div class="location_item">完成訂購</div>
        </div>
        <div><button class="btn btn-reon-b"><i class="fa-solid fa-rotate-left"></i><a href="cart.php"> 返回上一步</a></button></div>
    </div>
    <div class="container" style="display:flex;">
        <div class="deliver-info col">
            <h5>配送資訊</h5>
            <br>
            <p>收件人：小名</p>
            <p>連絡電話：小名</p>
            <p>配送地址：小名</p>
            <p class="change-info"><span>變更收件人</span></p>
        </div>
        <div class="pay-info col">
            <h5>付款資訊</h5>
            <br>
            <p>收件人：小名</p>
            <p>收件人：小名</p>
            <p>收件人：小名</p>
            <p class="change-info"><span>變更收件人</span></p>
        </div>
    </div>
    <div style="display: flex;justify-content:center;margin:50px;">
        <button class="btn btn-reon-b-order"><a href="shopping.php">繼續選購</a></button>
        <button class="btn btn-reon-nextstep"><a href="#">確認下單</a></button>
    </div>
</div>
<div class="col-3">
    <div id="plus_area">
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