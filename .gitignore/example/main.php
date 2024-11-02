<?php
if (isset($_POST['flag'])) {
    require_once("Connections/dbset.php");
    $cname = $_POST['cname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $SQLstring = sprintf("INSERT INTO feedback (cname, tel, email, address, message) VALUES ('%s', '%s', '%s', '%s', '%s')", $cname, $tel, $email, $address, $message);
    $result = $link->query($SQLstring);
    if ($result) {
        echo "<script>alert('謝謝您，送出資料已經收到，我會將盡速與您聯絡');</script>";
    } else {
        echo "<script>alert('資料無法寫入，請與管理員聯絡。');</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>林肯運動鞋專賣店-電子商店</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css">

    <link rel="stylesheet" href="website01.css">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style type="text/css">
        body {
            padding: 0px;
            margin: 0px;
            height: 3000px;
        }

        #mainmenu {
            position: relative;
            width: 100%;
            height: 3000px;
            background-image: url("images/pic86.jpg");
            background-attachment: fixed;
            z-index: 999999;
        }
    </style>

</head>

<body>
    <!-- 置頂選單欄 -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#index.php">
                <i class="fas fa-home" style="color:red;font-size:40px;margin-top:-5px;margin-left:5px;"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="index.php" class="nav-link"><img src="images/lincanLogo.png" alt="" class="img-fluid"></a></li>
                    <!-- 測試 -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            測試中心
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item dropend">
                                <a href="#" class="dropdown-item dropdown-toggle">
                                    Submenu
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">Item1</a></li>
                                    <li><a href="#" class="dropdown-item">Item2</a></li>
                                    <li><a href="#" class="dropdown-item">Item3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- 以上測試 -->

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#production">站長推薦</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sportlogo">品牌精選</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#buyrules">服務說明</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">聯絡我們</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            會員中心
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">訂單查詢</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">退訂/退款查詢</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">現金積點查詢</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">折價券查詢</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">折價券查詢</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">登入</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">註冊</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">登出</a>
                    </li>
                    <li class="nav-item">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- 頁首 -->
    <section id="mainmenu">

        <!-- 封面
        <div class="container-fluid">
            <div class="row text-center">
                <div class="jumbotron">
                    <h1 class="display-4">！讓我們一起動起來！</h1>
                    <p class="lead">在運動出汗的過程中，皮膚的新陳代謝加快，毒素排出體外，而且出汗還能夠幫助清潔毛孔，有效護膚美容。</p>
                    <hr class="my-4">
                    <p>讓我們提供一雙好的運動鞋來幫助你</p>
                    <p>林肯運動節專賣店-電子商店</p>
                    <a class="btn btn-primary btn-lg" href="#" role="botton">Show More</a>
                </div>
            </div>
        </div> -->

    </section>
    <hr>
    <!-- 站長推薦 -->
    <section id="production">
        <div class="container text-center">
            <div class="row">
                <div class="col-xl-12">
                    <h2>站長推薦熱銷運動鞋</h2>
                </div>
            </div>
            <!-- 第一行 -->
            <div class="row">
                <div class="card col-md-4">
                    <img class="card-img-top" src="images/pic61.jpg" alt="愛迪達休閒慢跑鞋">
                    <div class="card-body">
                        <h5 class="card-title">adidas 休閒慢跑鞋</h5>
                        <p class="card-text">Loop Racer 全黑 復古 男鞋 女鞋 B42446 愛迪達 Originals 三葉草 輕量透氣舒適運動鞋穿搭推薦, 男女款情侶鞋</p>
                        <p>NT2500</p>
                        <a href="#" class="btn btn-primary">更多資源</a>
                        <a href="#" class="btn btn-success">放購物車</a>
                    </div>
                </div>
                <div class="card col-md-4">
                    <img class="card-img-top" src="images/pic62.jpg" alt="Reebok 休閒慢跑鞋">
                    <div class="card-body">
                        <h5 class="card-title">Reebok 休閒慢跑鞋</h5>
                        <p class="card-text">Reebok Insta Pump Fury SP 藍 灰 麂皮 潑漆 雪花 休閒鞋 男鞋 平底鞋 休閒鞋 慢跑鞋 球鞋 情侶運動鞋</p>
                        <p>NT4500</p>
                        <a href="#" class="btn btn-primary">更多資源</a>
                        <a href="#" class="btn btn-success">放購物車</a>
                    </div>
                </div>
                <div class="card col-md-4">
                    <img class="card-img-top" src="images/pic63.jpg" alt="Nike 阿甘鞋">
                    <div class="card-body">
                        <h5 class="card-title">Nike 阿甘鞋</h5>
                        <p class="card-text">RWmns Classic Cortez Leather 復古慢跑鞋 白藍紅 OG 原版配色 女鞋 漢娜妞 松本惠奈 女孩球鞋穿搭推薦款式 百搭熱銷款 皮面不容易髒</p>
                        <p>NT3300</p>
                        <a href="#" class="btn btn-primary">更多資源</a>
                        <a href="#" class="btn btn-success">放購物車</a>
                    </div>
                </div>
                <!-- 第二行 -->
                <div class="row">
                    <div class="card col-md-4">
                        <img class="card-img-top" src="images/pic64.jpg" alt="Puma 慢跑鞋">
                        <div class="card-body">
                            <h5 class="card-title">Puma 慢跑鞋</h5>
                            <p class="card-text">Speed 600 Ignite Pwrcool Wn 黃銀 運動 女鞋 188521-02 Running 超輕量透氣 低筒 跑步健身訓練推薦鞋款</p>
                            <p>NT2880</p>
                            <a href="#" class="btn btn-primary">更多資源</a>
                            <a href="#" class="btn btn-success">放購物車</a>
                        </div>
                    </div>
                    <div class="card col-md-4">
                        <img class="card-img-top" src="images/pic65.jpg" alt="Asics 慢跑鞋">
                        <div class="card-body">
                            <h5 class="card-title">Asics 慢跑鞋</h5>
                            <p class="card-text">競速跑鞋 Tartherzeal 4 藍 橘 白底 男鞋 輕量 運動鞋 TJR282-5230 Racing 低筒 虎走 馬拉松 路跑推薦款式 特殊專業跑鞋設計</p>
                            <p>NT4490</p>
                            <a href="#" class="btn btn-primary">更多資源</a>
                            <a href="#" class="btn btn-success">放購物車</a>
                        </div>
                    </div>
                    <div class="card col-md-4">
                        <img class="card-img-top" src="images/pic66.jpg" alt="美津濃 Mizuno Prophecy 5">
                        <div class="card-body">
                            <h5 class="card-title">美津濃 Mizuno Prophecy 5</h5>
                            <p class="card-text">美津濃 Mizuno Prophecy 5藍黃 彈簧 慢跑鞋 男鞋 J1GC16-0047 Running U4ic中底材質,X10耐磨INFINITY WAVE大底</p>
                            <p>NT5080</p>
                            <a href="#" class="btn btn-primary">更多資源</a>
                            <a href="#" class="btn btn-success">放購物車</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- 頁尾頁數 -->
        <div class="container">
            <div class="row pt-2">
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>



    </section>
    <hr>
    <!-- 品牌精選 -->
    <section id="sportlogo">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2>品牌精選</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3"><img src="images/pic71.jpg" alt="adidas" title="adidas" class="img-fluid"></div>
                <div class="col-sm-3"><img src="images/pic72.jpg" alt="adidas" title="adidas" class="img-fluid"></div>
                <div class="col-sm-3"><img src="images/pic73.jpg" alt="adidas" title="adidas" class="img-fluid"></div>
                <div class="col-sm-3"><img src="images/pic74.jpg" alt="adidas" title="adidas" class="img-fluid"></div>
            </div>
            <div class="row">
                <div class="col-sm-3"><img src="images/pic75.jpg" alt="adidas" title="adidas" class="img-fluid"></div>
                <div class="col-sm-3"><img src="images/pic76.jpg" alt="adidas" title="adidas" class="img-fluid"></div>
                <div class="col-sm-3"><img src="images/pic77.jpg" alt="adidas" title="adidas" class="img-fluid"></div>
                <div class="col-sm-3"><img src="images/pic78.jpg" alt="adidas" title="adidas" class="img-fluid"></div>
            </div>
        </div>

    </section>
    <hr>
    <!-- 猜你喜歡 -->
    <section id="guess">
        <div class="container text-center">
            <!-- 猜你喜歡標題 -->
            <div class="row">
                <div class="col-xl-12">
                    <h2>猜你喜歡</h2>
                </div>
            </div>
            <!-- 猜你喜歡 物件輪播 -->
            <div class="row">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <!-- 輪播第一頁 -->
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="card col-md-3">
                                    <img src="images/picnew01.webp" class="card-img-top" alt="【SKECHERS】女 慢跑系列 GORUN TRAIL ALTITUDE(128203RAS)">
                                    <div class="card-body">
                                        <h5 class="card-title">【SKECHERS】女 慢跑系列 GORUN TRAIL ALTITUDE(128203RAS)</h5>
                                        <p class="card-text">品號：8844911<br>加深刻紋的橡膠大底<br>輕量回彈避震緩衝中底<br>市售價2,790元 促銷價1,990</p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="images/picnew02.webp" class="card-img-top" alt="【NIKE 耐吉】籃球鞋 PG 6 EP 男鞋 女鞋 黑白(DH8447001)">
                                    <div class="card-body">
                                        <h5 class="card-title">【NIKE 耐吉】籃球鞋 PG 6 EP 男鞋 女鞋 黑白(DH8447001)</h5>
                                        <p class="card-text">品號：10130074<br>Nike React 泡綿中底<br>中足鞋眼式固定鞋帶融為一體<br>
                                            橡膠外底提供多向抓地表現<br>市售價3,800元 促銷價2,584元</p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="images/picnew03.webp" class="card-img-top" alt="慢跑鞋 NIKE AIR ZOOM PEGASUS 39 男鞋 灰黑(DH4071004)">
                                    <div class="card-body">
                                        <h5 class="card-title">慢跑鞋 NIKE AIR ZOOM PEGASUS 39 男鞋 灰黑(DH4071004)</h5>
                                        <p class="card-text">品號：10243109<br>出眾腳感舒適包覆雙足<br>足底兩個Zoom Air 緩震<br>市售價3,500元 促銷價2,380元<br></p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="images/picnew04.webp" class="card-img-top" alt="【asics 亞瑟士】JOLT 男女中性款 寬楦 慢跑 跑鞋 運動鞋(多款任選)">
                                    <div class="card-body">
                                        <h5 class="card-title">【asics 亞瑟士】JOLT 男女中性款 寬楦 慢跑 跑鞋 運動鞋(多款任選)</h5>
                                        <p class="card-text">品號：10138374<br>經典造型和絕佳腳感<br>在奔跑中讓腳步的移動更流暢<br>鞋款偏小，建議選擇大半號<br>市售價1,880元 促銷價1,499元</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 輪播第二頁 -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="card col-md-3">
                                    <img src="images/picnew05.webp" class="card-img-top" alt="【SKECHERS】女 慢跑系列 GORUN TRAIL ALTITUDE(128203RAS)">
                                    <div class="card-body">
                                        <h5 class="card-title">【adidas 愛迪達】慢跑鞋 RESPONSE SR 女款 多款任選(GZ8428 GZ8425)</h5>
                                        <p class="card-text">品號：9314683<br>網布鞋面搭配支撐性貼條<br>彈性泡棉雙區緩震設計<br>Cloudfoam 中底<br>
                                            市售價2,890元 促銷價1,390元<br></p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="images/picnew06.webp" class="card-img-top" alt="【NIKE 耐吉】籃球鞋 PG 6 EP 男鞋 女鞋 黑白(DH8447001)">
                                    <div class="card-body">
                                        <h5 class="card-title">【LOTTO】女鞋 絆帶氣墊跑鞋/增高美型健走鞋/厚底美型輕便鞋(多款任選)
                                            品號：8812979<br></h5>
                                        <p class="card-text">品號：8812979<br>
                                            飛織網布材質，柔軟透氣<br>
                                            舒壓避震乳膠鞋墊，耐磨止滑<br>
                                            增厚底設計，能修飾腿部線條<br>
                                            市售價1,390元 促銷價699元<br></p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="images/picnew07.webp" class="card-img-top" alt="慢跑鞋 NIKE AIR ZOOM PEGASUS 39 男鞋 灰黑(DH4071004)">
                                    <div class="card-body">
                                        <h5 class="card-title">【MIZUNO 美津濃】MIZUNO MAXIMIZER 24 一般型寬楦男款慢跑鞋 K1GA2200XX(慢跑鞋)</h5>
                                        <p class="card-text">品號：9830301<br>
                                            適合一般慢跑或步行<br>
                                            輕運動與慢跑初學者需求<br>
                                            促銷價1,680元 折扣後價格1,530元<br></p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="images/picnew08.webp" class="card-img-top" alt="【asics 亞瑟士】JOLT 男女中性款 寬楦 慢跑 跑鞋 運動鞋(多款任選)">
                                    <div class="card-body">
                                        <h5 class="card-title">【SKECHERS】女 慢跑系列 GORUN MAX CUSHIONING ARCH FIT(128303CHAR)</h5>
                                        <p class="card-text">品號：9805973<br>
                                            ULTRA GO中底<br>
                                            大底高磨耗區添加固特異橡膠<br>
                                            動態型足弓適應鞋墊<br>
                                            市售價3,590元 促銷價3,052元<br></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 左右按鈕 -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <!-- 左右按鈕 -->
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- 我們的服務 -->
    <section id="buyrules" class="bgcolor">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2><i class="fas fa-envelope" aria-hidden="true"></i></h2>
                    <h2>我們的服務</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <h2><i class="fas fa-user" aria-hidden="true"></i></h2>
                    <h4>購物須知</h4>
                    <p>★如本店有正當理由無法接受您的訂單，將於收到您的訂單後二個工作日附正當理由通知您。但已付款者視為契約成立。</p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-comment-dots fa-lg pe-2" aria-hidden="true">Show More</i></button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-user" aria-hidden="true"></i></h2>
                    <h4>付款方式</h4>
                    <p>★超商付款取貨，至超商取貨時付款，全家繳費不取貨，適用無卡片轉帳且需宅配取件的顧客，線上刷卡，信用卡一次付清。</p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-comment-dots fa-lg pe-2" aria-hidden="true">Show More</i></button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-user" aria-hidden="true"></i></h2>
                    <h4>交貨方式</h4>
                    <p>★黑貓宅配包裹：寄出後1-2天送達，可選擇送達時段，郵局包裹寄送：寄出後1-2天送達，外島地區寄出後3-7天送達。
                        <i class="fas fa-thumbs-up fa-lg pe-2" aria-hidden="true"></i>
                    </p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-comment-dots fa-lg pe-2" aria-hidden="true">Show More</i></button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-user" aria-hidden="true"></i></h2>
                    <h4>退換貨說明</h4>
                    <p>★登入填寫退貨單，由平台請宅配收取退貨，需完整保留商品及其配件，並簡易包裝保護商品，勿直接使用膠帶黏貼商品。
                        <i class="fas fa-address-card fa-lg pe-2" aria-hidden="true"></i>
                    </p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-comment-dots fa-lg pe-2" aria-hidden="true">Show More</i></button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-user" aria-hidden="true"></i></h2>
                    <h4>出貨時間</h4>
                    <p>★每日商品依訂單成立時間，服務時間星期一至星期五 9:30-21:30，(星期六、日及特定國定假日，無提供出貨服務)。</p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-comment-dots fa-lg pe-2" aria-hidden="true">Show More</i></button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-user" aria-hidden="true"></i></h2>
                    <h4>連絡方式</h4>
                    <p>★(02)7717-9177 分機202 電子商城客服專員，服務時間：星期一至五 9:30-18:30 (12:30-13:30為午休時間)。</p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-comment-dots fa-lg pe-2" aria-hidden="true">Show More</i></button>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- 聯絡我們 -->
    <secontion id="contact">
        <div class="container text-center box">
            <div class="row">
                <div class="col-sm-12 pt-3">
                    <h2>聯絡我們</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <form action="main.php" method="post" name="form1" id="form1">
                        <div class="row">
                            <input type="text" class="form-control" name="cname" id="cname" placeholder="Name" required>
                        </div>
                        <br>
                        <div class="row">
                            <input type="number" class="form-control" name="tel" id="tel" placeholder="TEL" required>
                        </div>
                        <br>
                        <div class="row">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                        <br>
                        <div class="row">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                        </div>
                        <br>
                        <div class="row">
                            <textarea rows="6" class="form-control" name="message" id="message" placeholder="Message" required></textarea>
                            <input type="hidden" name="flag" id="flag" value="form1">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-lg mx-auto">送出</button>
                    </form>
                </div>
            </div>
        </div>
    </secontion>
    <!-- footer -->
    <section id="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h4>林肯運動鞋專賣店 地址：40767台中市西屯區工業區一路100號 電話：04-23592181 免付費電話：0800-555-666</h4>
                </div>
            </div>
            <div class="row">
                <div class="col x1-12">COPY RIGHT &copy; LINCAN SPORT SERVICE CO, ALL RIGHT RESERED.</div>
            </div>
        </div>
    </section>

    <!-- bootstrap的javescript -->
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <script src="morphext.js"></script>
    <script src="text_ctrl.js"></script>
    <script>
        $(function() {
            $(window).scroll(function() {
                var scroll_position = $(window).scrollTop() / 2;
                $('#mainmenu').css({
                    'background-position-x': -scroll_position + 'px',
                })
            })
        })
    </script>
</body>

</html>