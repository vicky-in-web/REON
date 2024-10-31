    <!-- 正常navbar -->
    <section id="navbar" class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="position: relative;">
            <div class="container-fluid">
                <!-- LOGO欄 -->
                <div id="logobar" class="col-md-2">
                    <div class="container-fluid">
                        <div class="logo-pic">
                            <a href="main.php">
                                <img src="images/REON_LOGO-2.png" title="REON里光眼鏡" class="logo-pic">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- 選單欄 -->
                <div class="collapse navbar-collapse col-md-10" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0"> <!-- 導覽列第一層本體框，所以用navbar-nav -->
                        <?php
                        // 列出產品第一層
                        $SQLstring = "SELECT * FROM class WHERE level=1 ORDER BY sort";
                        $class01 = $link->query($SQLstring);
                        $i = 1; //控制編號順序
                        ?>
                        <?php
                        while ($class01_Rows = $class01->fetch()) {
                        ?>
                            <li class="nav-item dropdown"><!-- 還有選單，定位dropdown(往下) -->
                                <a class="nav-link" href="./shopping.php">
                                    <?php echo $class01_Rows['cname'] ?> <i class="fa-solid fa-chevron-down fa-2xs"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- 第二層框架用dropdown-menu -->
                                    <?php
                                    // 列出產品第二層
                                    $SQLstring = sprintf("SELECT * FROM class WHERE level=2 AND uplink=%d ORDER BY sort", $class01_Rows['classid']);
                                    $class02 = $link->query($SQLstring);
                                    while ($class02_Rows = $class02->fetch()) {
                                    ?>
                                        <li class="dropend">
                                            <!-- 還有選單，定位dropdend(往右，往下會蓋住上一層) -->
                                            <a class="dropdown-item" href="#"><?php echo $class02_Rows['cname'] ?> <i class="fa-solid fa-chevron-down fa-rotate-270 fa-2xs"></i></a>
                                            <ul class="dropdown-menu">
                                                <!-- 第三層框架用dropdown-menu -->
                                                <li>
                                                    <?php
                                                    // 列出產品第三層
                                                    $SQLstring = sprintf("SELECT * FROM class WHERE level=3 AND uplink=%d ORDER BY sort", $class02_Rows['classid']);
                                                    $class03 = $link->query($SQLstring);
                                                    while ($class03_Rows = $class03->fetch()) {
                                                    ?>
                                                        <!-- 沒有選單，不定位 -->
                                                        <a class="dropdown-item" href="#"><?php echo $class03_Rows['cname'] ?></a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php
                            $i++;
                        }
                        ?>
                        <div class="controller d-flex" style="justify-content: flex-end;">
                            <a href="login.php"><i class="fa-regular fa-circle-user " style="padding-top:17px;padding-right:16px"></i></a>
                            <a href="#"><i class="fa-regular fa-heart" style="padding-top:17px;padding-right:16px"></i></a>
                            <a href="#"><i class="fa-solid fa-cart-shopping" style="padding-top:17px;padding-right:16px"></i></a>
                            <div class="input-group input-group-sm mb-3" style="padding-top: 8px;">
                                <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </section>








    <!-- 失敗版navbar -->
    <!-- <section id="new-navbar">
        <div class="container-fluid sticky-top">
            <div class="row list1">
                <div class="col-2">
                    <div class="logo-pic">
                        <a href="main.php">
                            <img src="images/REON_LOGO-2.png" title="REON里光眼鏡" class="logo-pic">
                        </a>
                    </div>
                </div>
                <div class="col-1 item1" data-target="list2-1">SALE!</div>
                <div class="col-1 item1" data-target="list2-2">眼鏡</div>
                <div class="col-1 item1" data-target="list2-3">墨鏡</div>
                <div class="col-1 item1" data-target="list2-4">隱形眼鏡</div>
                <div class="col-1 ">周邊產品</div>
                <div class="col-3"></div>
                <div class="col-2">
                    <div class="controller d-flex" style="justify-content: flex-end;">
                        <a href="login.php"><i class="fa-regular fa-circle-user " style="padding-top:17px;padding-right:16px"></i></a>
                        <a href="#"><i class="fa-regular fa-heart" style="padding-top:17px;padding-right:16px"></i></a>
                        <a href="#"><i class="fa-solid fa-cart-shopping" style="padding-top:17px;padding-right:16px"></i></a>
                        <div class="input-group input-group-sm mb-3" style="padding-top: 8px;">
                            <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid list2" id="list2-1">
            <div class="item2">REON五歲慶</div>
            <div class="item2">不能沒有的套組</div>
            <div class="item2">新進韓國隱形眼鏡快跟上</div>
        </div>
        <div class="container-fluid list2" id="list2-2">
            <div class="item2">222</div>
            <div class="item2">不能沒有的套組</div>
            <div class="item2">新進韓國隱形眼鏡快跟上</div>
        </div>
        <div class="container-fluid list2" id="list2-3">
            <div class="item2">333</div>
            <div class="item2">不能沒有的套組</div>
            <div class="item2">新進韓國隱形眼鏡快跟上</div>
        </div>
        <div class="container-fluid list2" id="list2-4">
            <div class="item2">444</div>
            <div class="item2">不能沒有的套組</div>
            <div class="item2">新進韓國隱形眼鏡快跟上</div>
        </div> -->

    <!-- <div class="row ">
                <div class="list2 list_sale">
                    <div class="item2">REON五歲慶</div>
                    <div class="item2">不能沒有的套組</div>
                    <div class="item2">新進韓國隱形眼鏡快跟上</div>
                </div>
            </div> -->
    <!-- <div class="row ">
                <div class="list2box list2 list_glasses">
                    <div class="item2">選鏡框</div>
                    <div class="item2">選顏色</div>
                    <div class="item2">選材質</div>
                </div>
            </div>
            <div class="row">
                <div class="list2box  list2 list_sunglasses">
                    <div class="item2">選鏡框</div>
                    <div class="item2">選顏色</div>
                </div>
            </div>
            <div class="row">
                <div class="list2box list2 list_lenses">
                    <div class="item2">台灣品牌</div>
                    <div class="item2">日本品牌</div>
                    <div class="item2">韓國品牌</div>
                    <div class="item2">其他品牌</div>
                </div>
            </div>
            <div class="row">
                <div class="list2box list2 list_others">
                    <div class="item2">眼鏡保養</div>
                    <div class="item2">隱形眼鏡保養</div>
                    <div class="item2">其他</div>
                </div>
            </div> -->
    <!-- </div>



    </section> -->