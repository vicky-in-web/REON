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
                <?php require_once("cart_content.php") ?>
            </div>
        </div>
    </section>


    <?php require_once("gotop.php") ?>
    <?php require_once("footer.php") ?>
    <?php require_once("jsfile.php") ?>
    <?php require_once("product_count.php") ?>
    <script>
        function btn_confirmLink(message, url) {
            if (message == "" || url == "") {
                return false;
            }
            if (confirm(message)) {
                window.location = url;
            }
            return false;
        }
    </script>

</body>

</html>