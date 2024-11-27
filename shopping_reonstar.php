<!-- 資料庫連線 -->
<?php
require_once('Connections/dbset.php');

//如果session沒有自動啟動，則手動命令session功能
(!isset($_SESSION)) ? session_start() : "";

require_once("php_lib.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once("headfile.php") ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, sans-serif;
            background: #fff;
        }
    </style>
</head>

<body>
    <?php require_once("newnavbar.php") ?>

    <section id="shopping_content">
        <div class="container-fluid">
            <div class="row">
                <!-- sidebar -->
                <?php require_once("sidebar.php") ?>
                <div class="col-md-10" id="product_list">

                    <?php require_once("breadcrumb.php") ?>

                    <!-- 首欄大圖(輪播？) -->
                    <div id="carouselExampleFade" class="carousel slide carousel-fade">
                        <div class="carousel-inner showing-pic">
                            <?php
                            $SQLstring = "SELECT * FROM carousel WHERE caro_online=1 ORDER BY caro_sort";
                            $carousel = $link->query($SQLstring);
                            $i = 0; //控制active啟動
                            while ($data = $carousel->fetch()) {
                            ?>
                                <div class="carousel-item  <?php echo activeShow($i, 0) ?>">
                                    <a href="shopping.php?classid=<?php echo $data['class_id'] ?>">
                                        <img src="./images/<?php echo $data['caro_pic']; ?>" class="d-block w-100" alt="..."></a>
                                </div>
                            <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- 商品列表 -->
                    <div class="product-list-content">
                        <div class="container">
                            <div class="row">
                                <!-- 建立產品列表自動帶入資料庫 -->
                                <?php
                                $queryStar = "SELECT * FROM reonstar, product, product_img WHERE product.p_open=1 AND product_img.sort=1 AND product.p_id = product_img.p_id AND product_img.p_id = reonstar.p_id ORDER BY reonstar.star_sort DESC";
                                $starList = $link->query($queryStar);
                                while ($starList_Row = $starList->fetch()) {
                                ?>

                                    <div class="col-md-3">
                                        <a href="good.php?p_id=<?php echo $starList_Row['p_id'] ?>">
                                            <div class="product-item">
                                                <div class="product-card-img"><img src="./images/<?php echo $starList_Row['img_file'];   ?>" alt="" class="p-img"></div>
                                                <div class="product-card-content">
                                                    <?php echo $starList_Row['p_name']; ?><br>$
                                                    <?php echo $starList_Row['p_price']; ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php require_once("gotop.php") ?>
    <?php require_once("footer.php") ?>
    <?php require_once("jsfile.php") ?>


</body>

</html>