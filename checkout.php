<!-- 資料庫連線 -->
<?php
require_once('Connections/dbset.php');

//如果session沒有自動啟動，則手動命令session功能
(!isset($_SESSION)) ? session_start() : "";

require_once("php_lib.php");

if (isset($_GET['sPath'])) {
    $sPath = $_GET['sPath'] . ".php";
} else {
    $sPath = "login.php";
}
// 確認有無登入
if (!isset($_SESSION['login'])) {
    header(sprintf("location:%s", $sPath));
}

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
                <?php require_once("checkout_content.php") ?>
            </div>
        </div>
    </section>


    <?php require_once("gotop.php") ?>
    <?php require_once("footer.php") ?>
    <?php require_once("jsfile.php") ?>

    <script>
        $(function() {
            // 取得縣市代碼後查詢縣市名稱
            $("#myCity").change(function() {
                var CNo = $('#myCity').val();
                if (CNo == "") {
                    return false;
                }
                $('#myZip').val("");
                $('#add_label').html("郵遞區號：");
                $.ajax({
                    // 將縣市名稱從後台取出
                    url: 'Town_ajax.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        CNo: CNo,
                    },
                    success: function(data) {
                        if (data.c == true) {
                            $('#myTown').html(data.m);
                            $('#myZip').val("");
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function(data) {
                        alert("系統目前無法連線至資料庫 mycity")
                    }
                });
            });
            $("#myTown").change(function() {
                var AutoNo = $('#myTown').val();
                if (AutoNo == "") {
                    return false;
                }
                $.ajax({
                    url: 'Zip_ajax.php',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        AutoNo: AutoNo,
                    },
                    success: function(data) {
                        if (data.c == true) {
                            $('#myZip').val(data.Post);
                            $('#zipcode').html(data.Post + data.Cityname + data.Name);
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function(data) {
                        alert("系統目前無法連線至資料庫 mytown")
                    }
                });
            });
        })

        $(function() {
            // 新增收件人
            $('#recipient').click(function() {
                var validate = 0,
                    msg = "";
                var cname = $("#cname").val();
                var mobile = $("#mobile").val();
                var myZip = $('#myZip').val();
                var address = $('#address').val();
                if (cname == "") {
                    msg = msg + "收件人不得為空白！;\n";
                    validate = 1;
                }
                if (mobile == "") {
                    msg = msg + "電話不得為空白！;\n";
                    validate = 1;
                }
                if (myZip == "") {
                    msg = msg + "郵遞區號不得為空白！;\n";
                    validate = 1;
                }
                if (address == "") {
                    msg = msg + "地址不得為空白！;\n";
                    validate = 1;
                }
                if (validate) {
                    alert(msg);
                    return false;
                }
                $.ajax({
                    url: 'addbook.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        cname: cname,
                        mobile: mobile,
                        myZip: myZip,
                        address: address,
                    },
                    success: function(data) {
                        if (data.c == true) {
                            alert(data.m);
                            window.location.reload();
                        } else {
                            alert("Database response error：" + data.m);
                        }
                    },
                    error: function(data) {
                        alert("系統目前無法連接到後台資料庫addbook");
                    }
                })
            })
        })

        $('input[name=gridRadios]').change(function() {
            var addressid = $(this).val();
            $.ajax({
                url: 'changeaddr.php',
                type: 'post',
                dataType: 'json',
                data: {
                    addressid: addressid,
                },
                success: function(data) {
                    if (data.c == true) {
                        alert(data.m);
                        window.location.reload();
                    } else {
                        alert("Database reponse error：" + data.m);
                    }
                },
                error: function(data) {
                    alert("ajax request error");
                }
            });
        });

        $('#btn04').click(function() {
            let msg = "系統將進行結帳，請確認金額與收件人是否正確";
            if (!confirm(msg)) return false;
            var addressid = $('input[name=gridRadios]:checked').val();
            $.ajax({
                url: 'addorder.php',
                type: 'post',
                dataType: 'json',
                data: {
                    addressid: addressid,
                },
                success: function(data) {
                    if (data.c == true) {
                        alert(data.m);
                        window.location.href = "index.php";
                    } else {
                        alert("Database reponse error：" + data.m);
                    }
                },
                error: function(data) {
                    alert("ajax request error");
                }
            });
        });
    </script>
</body>

</html>