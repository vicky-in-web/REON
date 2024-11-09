<!-- 資料庫連線 -->
<?php
require_once('Connections/dbset.php');
//如果session沒有自動啟動，則手動命令session功能
(!isset($_SESSION)) ? session_start() : "";
require_once("php_lib.php");

// 設定路徑
if (isset($_GET['sPath'])) {
    $sPath = $_GET['sPath'] . ".php";
} else {
    $sPath = "login.php";
}
// 沒有登入的話導回登入頁
if (!isset($_SESSION['login'])) {
    header(sprintf("location:%s", $sPath));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("headfile.php") ?>
</head>

<body>
    <?php require_once("newnavbar.php") ?>
    <div class="page-title">
        <div class="location">
            <div class="location_item">親愛的會員，歡迎回來：</div>
        </div>
        <div class="btn btn-reon-logout"><a href="logout.php">登出</a></div>
    </div>
    <div class="login-index-container">
        <div class="login-item">
            會員資料
        </div>
        <div class="login-item">
            歷史訂單
        </div>
        <div class="login-item">
            收藏清單
        </div>
        <div class="login-item">
            專屬優惠
        </div>
    </div>


    <?php require_once("footer.php") ?>
    <?php require_once("jsfile.php") ?>
</body>

</html>