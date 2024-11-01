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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REON里光眼鏡</title>
    <link href="plugin/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="plugin/fontawesome-free-6.6.0-web/css/all.css">
    <link rel="stylesheet" href="reon_style.css">
    <style>
        #outline {
            overflow: hidden;
            width: 100%;
            height: 800px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url(./images/login_bg-2-1.png);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body>
    <?php require_once("newnavbar.php") ?>
    <div id="outline">
        <div class="frame">
            <div class="logo"><a href="./main.php">REON</a></div>
            <div class="title">會員登入 Log In</div>
            <div class="enterBox">電子信箱</div>
            <input type="text" class="enterInput" placeholder="E-mail">
            <div class="enterBox" class="enterInput">密碼</div>
            <input type="text" class="enterInput" placeholder="password">
            <button class="btn-login">登入</button>
        </div>
    </div>

    <?php require_once("footer.php") ?>
    <?php require_once("jsfile.php") ?>
</body>

</html>