<?php
$SQLstring = sprintf("SELECT * FROM product_img WHERE product_img.p_id=%d ORDER BY sort", $_GET['p_id']);
$img_rs = $link->query($SQLstring);
$imgList = $img_rs->fetch();
$mainImage_rs = $link->query($SQLstring);
$mainImage = $mainImage_rs->fetch();
$datastring = sprintf("SELECT * FROM product WHERE product.p_id=%d AND p_open=1 ORDER BY p_id", $_GET['p_id']);
$data_rs = $link->query($datastring);
$dataList = $data_rs->fetch();
?>

<div class="col-10">

    <?php require_once("breadcrumb.php") ?>

    <div id="orderbox" class="container">
        <div class="row">
            <div class="side-img col-2">
                <table>
                    <?php
                    do {
                    ?>
                        <tr>
                            <td><a href="./images/<?php echo $imgList['img_file']; ?>" rel="group" class="
                            fancybox"><img src="./images/<?php echo $imgList['img_file']; ?>" class="img-fluid w-75 side-img-item"></a></td>
                        </tr>
                    <?php
                    } while ($imgList = $img_rs->fetch());
                    ?>
                </table>
            </div>
            <div class="show-img col-5">
                <img src="./images/<?php echo $mainImage['img_file']; ?>" class="img-fluid" id="showGoods">
            </div>
            <div class="order-text col-4">
                <h5 class="card-title"><?php echo $dataList['p_name']; ?></h5>
                <p class="card-text"><?php echo $dataList['p_intro']; ?></p>
                <p class="card-text">$<?php echo $dataList['p_price']; ?></p>
                <p class="card-text">數量<br>
                <div class="input-group w-50">
                    <input type="type" class="form-control" value="0" onkeypress="return isNumberKey(event)"
                        onchange="validateInput(this)" id="numberInput">
                    <button class="btn btn-outline-dark" type="button" onclick="increaseValue()">+</button>
                    <button class="btn btn-outline-dark" type="button" onclick="decreaseValue()">-</button>
                </div>
                </p>
                <button class="btn btn-reon-b-order"><i class="fa-regular fa-heart"></i> 加入收藏</button>
                <button class="btn btn-reon-b-order" type="button" onclick="addcart(<?php echo $dataList['p_id']; ?>)"><i class="fa-solid fa-cart-shopping"></i> 加入購物車</button>
            </div>
        </div>
    </div>

    <div id="product_intro">
        <h4>商品介紹</h4>
        <?php echo $dataList['p_content']; ?>
        <!-- <h4>了解更多</h4>
        <h4>注意事項</h4> -->
    </div>

    <div id="something_about">
        <h4 style="text-align: center;font-weight:bolder;padding-top:1rem;">相關商品</h4>
        <div class="row">
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-card-img"><img src="./images/evercolor1-1.webp" alt="" class="p-img"></div>
                    <div class="product-card-content">
                        產品名稱<br>$1,000</div>
                    <div class="product-card-footer">
                        <button type="button" class="btn btn-reon-b btn-sm">了解更多</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-card-img"><img src="./images/evercolor1-1.webp" alt="" class="p-img"></div>
                    <div class="product-card-content">
                        產品名稱<br>$1,000</div>
                    <div class="product-card-footer">
                        <button type="button" class="btn btn-reon-b btn-sm">了解更多</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-card-img"><img src="./images/evercolor1-1.webp" alt="" class="p-img"></div>
                    <div class="product-card-content">
                        產品名稱<br>$1,000</div>
                    <div class="product-card-footer">
                        <button type="button" class="btn btn-reon-b btn-sm">了解更多</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-card-img"><img src="./images/evercolor1-1.webp" alt="" class="p-img"></div>
                    <div class="product-card-content">
                        產品名稱<br>$1,000</div>
                    <div class="product-card-footer">
                        <button type="button" class="btn btn-reon-b btn-sm">了解更多</button>
                    </div>
                </div>
            </div>
        </div>
    </div>





</div>