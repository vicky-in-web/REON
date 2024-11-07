<div class="col-2" id="sidebar">
    <div id="sidebar_background">
        <ul><a href="shopping.php">全部商品</a></ul>
        <hr>
        <ul>第一步：選外觀！</ul>
        <hr>
        <ul>REON明星商品</ul>

        <?php
        // 列出產品第一層
        $SQLstring = "SELECT * FROM class WHERE level=1 ORDER BY sort";
        $class01 = $link->query($SQLstring);
        $i = 1; //控制編號順序
        ?>
        <?php
        while ($class01_Rows = $class01->fetch()) {
        ?>
            <ul style="margin-top: 1.5rem;"><a href="shopping.php?classid=<?php echo $class01_Rows['classid']?>"><span class="level1"><?php echo $class01_Rows['cname'] ?></span></a>

                <?php
                // 列出產品第二層
                $SQLstring = sprintf("SELECT * FROM class WHERE level=2 AND uplink=%d ORDER BY sort", $class01_Rows['classid']);
                $class02 = $link->query($SQLstring);
                while ($class02_Rows = $class02->fetch()) {
                ?>
                    <ul>
                        <li><span class="level2"><a href="shopping.php?classid=<?php echo $class02_Rows['classid']; ?>"><?php echo $class02_Rows['cname'] ?></a></span>

                            <ul>
                                <?php
                                // 列出產品第三層
                                $SQLstring = sprintf("SELECT * FROM class WHERE level=3 AND uplink=%d ORDER BY sort", $class02_Rows['classid']);
                                $class03 = $link->query($SQLstring);
                                while ($class03_Rows = $class03->fetch()) {
                                ?>
                                    <li><span class="level3"><a href="shopping.php?classid=<?php echo $class03_Rows['classid']; ?>"><?php echo $class03_Rows['cname'] ?></a></span></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>
            </ul>
        <?php
            $i++;
        }
        ?>
    </div>
</div>
