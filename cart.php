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

    <?php require_once("footer.php") ?>
    <?php require_once("product_count.php") ?>
    <?php require_once("jsfile.php") ?>

    <script>
        //單筆取消功能
        function btn_confirmLink(message, url) {
            if (message == "" || url == "") {
                return false;
            }
            if (confirm(message)) {
                window.location = url;
            }
            return false;
        }

        // 變更數量
        $("input").change(function() {
            var qty = $(this).val();
            const cartid = $(this).attr("cartid");
            if (qty <= 0 || qty >= 50) {
                alert("更改數量需大於0以上，以及小於50以下。");
                return false;
            }
            $.ajax({
                url: 'change_qty.php',
                type: 'post',
                data: {
                    cartid: cartid,
                    qty: qty,
                },
                success: function(data) {
                    if (data.c == true) {
                        //alert(data.m);
                        window.location.reload();
                    } else {
                        alert(data.m)
                    }
                },
                error: function(data) {
                    alert("系統目前無法連線後台資料庫");
                }
            })
        })

    </script>
</body>

</html>