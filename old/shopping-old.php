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
    <title>REON里光眼鏡</title>
    <link href="plugin/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="plugin/fontawesome-free-6.6.0-web/css/all.css">
    <link rel="stylesheet" href="reon_style.css">
</head>

<body>
    <?php require_once("navbar.php") ?>

    <section id="shopping_content">
        <div class="container-fluid">
            <div class="row">
                <!-- sidebar -->
                <?php require_once("sidebar.php") ?>

                <!-- product list -->
                <?php require_once("product_list.php") ?>

            </div>
        </div>
    </section>



    <?php require_once("footer.php") ?>
    <?php require_once("jsfile.php") ?>

    <!-- <script>
        var item1s = document.getElementsByClassName('item1');
        var list1s = document.getElementsByClassName('list1');
        let hoverTimeout;

        for (let i = 0; i < item1s.length; i++) {
            item1s[i].addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout); // 清除隐藏定时器
                for (let j = 0; j < list1s.length; j++) {
                    list1s[j].classList.remove('show2'); // 隐藏所有菜单
                }
                var targetId1 = this.getAttribute('data-target'); // 获取当前item1对应的菜单
                var targetList1 = document.getElementById(targetId1);
                targetList1.classList.add('show2'); // 显示当前目标菜单
            });

            item1s[i].addEventListener('mouseleave', function() {
                let currentElement = this; // 当前离开的元素
                hoverTimeout = setTimeout(function() {
                    var targetId1 = currentElement.getAttribute('data-target');
                    var targetList1 = document.getElementById(targetId1);
                    targetList1.classList.remove('show2'); // 隐藏当前菜单
                }, 200); // 设置延迟关闭菜单
            });
        }

        for (let i = 0; i < list1s.length; i++) {
            list1s[i].addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout); // 如果鼠标进入子菜单，取消关闭
                this.classList.add('show2'); // 确保子菜单仍然显示
            });

            list1s[i].addEventListener('mouseleave', function() {
                let currentList = this; // 当前的列表元素
                hoverTimeout = setTimeout(function() {
                    currentList.classList.remove('show2'); // 延迟隐藏菜单
                }, 300); // 设置稍长的延迟以避免抖动
            });
        }
    </script> -->



    <!-- <script>
        //取得第一層
        var item1s = document.getElementsByClassName('item1');
        var list1s = document.getElementsByClassName('list1')
        let hoverTimeout;
        // console.log(item1s);
        // console.log(list1s);


        //設定第一層
        for (var i = 0; i < item1s.length; i++) {
            console.log(item1s[i]);
            item1s[i].addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout);
                for (var j = 0; j < list1s.length; j++) {
                    list1s[j].classList.remove('show2');
                }
                //設定顯示
                var targetId1 = this.getAttribute('data-target');
                var targetList1 = document.getElementById(targetId1);
                // console.log(targetId1);
                // console.log(targetList1);
                targetList1.classList.add('show2');
            });
            item1s[i].addEventListener('mouseleave', function() {
                hoverTimeout = setTimeout(function() {
                    for (var j = 0; j < list1s.length; j++) {
                        list1s[j].classList.remove('show2');
                    }
                }, 200)
            });
        }

        for (var i = 0; i < list1s.length; i++) {
            list1s[i].addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout);
                this.classList.add('show2');
            });

            list1s[i].addEventListener('mouseleave', function() {
                var that = this;
                hoverTimeout = setTimeout(function() {
                    that.classList.remove('show2');
                }, 300);
            });
        }
    </script> -->
</body>

</html>