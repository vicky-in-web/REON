<section class="navbar-wrapper-new-m">
    <nav class="navbar-new-m">
        <a href="main.php">
            <img src="images/REON_LOGO-2.png" title="REON里光眼鏡" class="logo-pic">
        </a>
        <div>
            <?php
            if (!isset($_SESSION['login'])) {
            ?>
                <a href="login.php">
                <?php
            } else {
                ?>
                    <a href="login-index.php">
                    <?php
                }
                    ?><i class="fa-regular fa-circle-user"></i></a>
                    <a href="wish_list.php"><i class="fa-regular fa-heart"></i></a>
                    <a href="./cart.php"><i class="fa-solid fa-cart-shopping">
                            <span class="position-absolute translate-middle badge rounded-pill text-bg-warning">
                                <?php
                                $stmt = $link->prepare("SELECT SUM(qty) AS total_quantity FROM cart WHERE orderid IS NULL AND ip = :ip");
                                $stmt->bindParam(':ip', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
                                $stmt->execute();
                                $total_quantity = $stmt->fetchColumn();
                                ?>
                                <?php
                                echo htmlspecialchars($total_quantity, ENT_QUOTES, 'UTF-8');
                                ?></span>
                        </i></a>
                    <i class="fa-solid fa-bars fa-2xl" style="color: #949494;margin-left:1rem; cursor:pointer;"></i>
        </div>
    </nav>
    <div class="side-menu">
        <div class="side-menu-content">
            <ul class="side-menu-1">
                <li class="side-item-1">
                    <div class="item-title"><a href="#">眼鏡</a><i class="fa-solid fa-chevron-down fa-sm icon1"></i></div>
                    <ul class="side-menu-2">
                        <li class="side-item-2">
                            <a href="#" class="item-title">挑鏡框</a>
                        </li>
                        <li class="side-item-2">
                            <a href="#" class="item-title">挑鏡框</a>
                        </li>
                    </ul>
                </li>
                <li class="side-item-1">
                    <div class="item-title">墨鏡<i class="fa-solid fa-chevron-down fa-sm icon1"></i></div>
                    <ul class="side-menu-2">
                        <li class="side-item-2">
                            <div class="item-title">挑鏡框</div>
                        </li>
                        <li class="side-item-2">
                            <div class="item-title">挑鏡框</div>
                        </li>
                        <li class="side-item-2">
                            <div class="item-title">挑鏡框</div>
                        </li>
                        <li class="side-item-2">
                            <div class="item-title">挑鏡框</div>
                        </li>
                    </ul>
                </li>
                <li class="side-item-1">
                    <div class="item-title">隱形眼鏡<i class="fa-solid fa-chevron-down fa-sm icon1"></i></div>
                    <ul class="side-menu-2">
                        <li class="side-item-2">
                            <div class="item-title">日本品牌<i class="fa-solid fa-chevron-down fa-sm icon2"></i></div>
                            <ul class="side-menu-3">
                                <li class="side-item-3">evercolor</li>
                                <li class="side-item-3">evercolor</li>
                            </ul>
                        </li>
                        <li class="side-item-2">
                            <div class="item-title">韓國品牌<i class="fa-solid fa-chevron-down fa-sm icon2"></i></div>
                            <ul class="side-menu-3">
                                <li class="side-item-3">evercolor</li>
                                <li class="side-item-3">evercolor</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="side-item-1">
                    <div class="item-title">隱形眼鏡<i class="fa-solid fa-chevron-down fa-sm icon1"></i></div>
                    <ul class="side-menu-2">
                        <li class="side-item-2">
                            <div class="item-title">日本品牌<i class="fa-solid fa-chevron-down fa-sm icon2"></i></div>
                            <ul class="side-menu-3">
                                <li class="side-item-3">evercolor</li>
                                <li class="side-item-3">evercolor</li>
                            </ul>
                        </li>
                        <li class="side-item-2">
                            <div class="item-title">韓國品牌<i class="fa-solid fa-chevron-down fa-sm icon2"></i></div>
                            <ul class="side-menu-3">
                                <li class="side-item-3">evercolor</li>
                                <li class="side-item-3">evercolor</li>
                            </ul>
                        </li>
                        <li class="side-item-2">
                            <div class="item-title">台灣品牌<i class="fa-solid fa-chevron-down fa-sm icon2"></i></div>
                            <ul class="side-menu-3">
                                <li class="side-item-3">evercolor</li>
                                <li class="side-item-3">evercolor</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <form action="shopping.php" method="get" id="search">
            <div class="input-group input-group-sm mb-3" style="padding-top: 18px;">
                <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="search_name" id="search_name" value="<?php echo (isset($_GET['search_name'])) ? $_GET['search_name'] : ''; ?>" required>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
        <br>
    </div>
</section>