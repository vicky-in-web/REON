<div class="col-md-10" id="product_list">

    <?php require_once("breadcrumb.php") ?>
    <!-- 首欄大圖(輪播？) -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner showing-pic">
            <?php
            // if(isset($_GET['classid'])){
            //     // 如果有接收到指定的classid
            //     $SQLstring="SELECT caro_id FROM carousel WHERE caro_online=1";
            //     $classid_rs=$link->query($SQLstring);
            //     $data=$classid_rs->fetch();
            //     $ladder=$data['caro_id'];
            // }else{
            //     $ladder=1;
            // }
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
        <div class="container-fluid">

            <!-- 建立產品列表自動帶入資料庫 -->
            <?php
            $maxRows_rs = 12; //設定每一頁的數量
            $pageNum_rs = 0; //起始頁從0開始
            if (isset($_GET['pageNum_rs'])) {
                $pageNum_rs = $_GET['pageNum_rs'];
            }
            $startRow_rs = $pageNum_rs * $maxRows_rs;

            if (isset($_GET['search_name'])) {
                $queryFirst = sprintf("SELECT * FROM product,product_img, class WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid=class.classid AND product.p_name LIKE '%s' ORDER BY product.p_id DESC", '%' . $_GET['search_name'] . '%');
            }
            // 建立類別查詢
            else if (isset($_GET['classid'])) {
                // 利用類別抓資料
                $queryFirst = sprintf("SELECT * FROM product, product_img WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid='%d' ORDER BY  product.p_id DESC", $_GET['classid']);
            } else {
                // 列出產品查詢結果
                $queryFirst = "SELECT * FROM product 
                JOIN product_img ON product.p_id = product_img.p_id 
                WHERE p_open=1 AND product_img.sort=1 
                ORDER BY product.p_id DESC";
            }

            $query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRow_rs, $maxRows_rs);
            $pList01 = $link->query($query);
            $i = 1;

            while ($pList01_Rows = $pList01->fetch()) {
                if ($i % 4 == 1) {
            ?>
                    <div class="row">
                    <?php
                }
                    ?>

                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-card-img"><img src="./images/<?php echo $pList01_Rows['img_file'];   ?>" alt="" class="p-img"></div>
                            <div class="product-card-content">
                                <?php echo $pList01_Rows['p_name']; ?><br>$
                                <?php echo $pList01_Rows['p_price']; ?>
                            </div>
                            <div class="product-card-footer">
                                <a href="good.php?p_id=<?php echo $pList01_Rows['p_id']?>"><button type="button" class="btn btn-reon-b btn-sm">了解更多</button></a>
                            </div>
                        </div>
                    </div>
                    <?php if ($i % 4 == 0 || $i == $pList01->rowCount()) { ?>
                    </div>
            <?php }
                    $i++;
                }
            ?>
        </div>
    </div>
    <!-- 頁碼 -->
    <?php
    //  取得目前頁數
    if (isset($_GET['totalRows_rs'])) {
        $totalRows_rs = $_GET['totalRows_rs'];
    } else {
        $all_rs = $link->query($queryFirst);
        $totalRows_rs = $all_rs->rowCount();
    }
    $totalPages_rs = ceil($totalRows_rs / $maxRows_rs) - 1;
    // 呼叫分頁的功能函數
    $prev_rs = "&laquo;";
    $next_rs = "&raquo;";
    $separator = "|";
    $max_links = 20;
    $pages_rs = buildNavigation($pageNum_rs, $totalPages_rs, $prev_rs, $next_rs, $separator, $max_links, true, 3, "rs");
    ?>
    <!-- 頁碼本體 -->
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm justify-content-end">
            <?php echo $pages_rs[0] . $pages_rs[1] . $pages_rs[2]; ?>
        </ul>
    </nav>
</div>