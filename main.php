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
        echo "<script>alert('已經收到您的訊息囉！謝謝您寶貴的意見！');</script>";
    } else {
        echo "<script>alert('糟糕！訊息發送不成功，請與管理員聯絡！');</script>";
    }
}
?>
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
    <!-- <link href="project01/plugin/bootstrap-5.3.3-dis/css/bootstrap.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="plugin/fontawesome-free-6.6.0-web/css/all.css">
    <link rel="stylesheet" href="reon_style.css">

    <script>
        document.addEventListener('scroll', () => {
            const serviceSection = document.getElementById('service');
            const viewportHeight = window.innerHeight;
            const sectionTop = serviceSection.getBoundingClientRect().top;

            if (sectionTop < viewportHeight * 0.8) { // 當 section 80% 進入視口時觸發動畫
                serviceSection.classList.add('visible');
            } else {
                serviceSection.classList.remove('visible');
            }
        });
        document.addEventListener('scroll', () => {
            const suggestSection = document.getElementById('suggest');
            const viewportHeight = window.innerHeight;
            const sectionTop = suggestSection.getBoundingClientRect().top;

            if (sectionTop < viewportHeight * 0.8) {
                suggestSection.classList.add('visible');
            } else {
                suggestSection.classList.remove('visible');
            }
        });
        document.addEventListener('scroll', () => {
            const thenewsSection = document.getElementById('thenews');
            const viewportHeight = window.innerHeight;
            const sectionTop = thenewsSection.getBoundingClientRect().top;

            if (sectionTop < viewportHeight * 0.8) {
                thenewsSection.classList.add('visible');
            } else {
                thenewsSection.classList.remove('visible');
            }
        });
    </script>

</head>

<body>
    <!-- Narbar -->
    <?php require_once("newnavbar.php") ?>

    <!-- 首頁輪播 -->
    <section id="top_carousel">
        <div class="container-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/cover/cover01-2.jpg
                        " class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/cover/cover02.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/cover/cover03.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- 特色服務 -->
    <section id="service" class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row text-center d-flex justify-content-center align-items-center">
                <div class="col-sm-1 service-item">
                    <i class="fa-solid fa-stethoscope fa-2xl"></i>
                </div>
                <div class="col-sm-2 text-start">
                    專業眼科醫師推薦
                </div>
                <div class="col-sm-1 service-item">
                    <i class="fa-solid fa-headset fa-2xl"></i>
                </div>
                <div class="col-sm-2 text-start">
                    真人線上客服<br>瞭解您所有疑慮
                </div>
                <div class="col-sm-1 service-item">
                    <i class="fa-solid fa-list-check fa-2xl"></i>
                </div>
                <div class="col-sm-2 text-start">
                    從檢驗到製作<br>每道工序層層把關
                </div>
                <div class="col-sm-1 service-item">
                    <i class="fa-solid fa-handshake-simple fa-2xl"></i>
                </div>
                <div class="col-sm-2 text-start">
                    重視溝通<br>全面了解您的需求
                </div>
            </div>
        </div>

    </section>

    <!-- 最新消息 -->
    <section id="thenews" class="d-flex justify-content-center align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="little-title">最新消息</div>
            </div>
            <div class="row">
                <div class="col-sm-3 news-item">
                    <a href="#" style="display: block; text-decoration: none;">
                        <div>
                            <img src="images/room.jpg" alt="" class="news-item-img">
                        </div>
                        <div class="news-item-body">
                            勤美門市即將開幕！延續REON活潑風格！<br>2024/08/22
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 news-item">
                    <a href="#" style="display: block; text-decoration: none;">
                        <div>
                            <img src="images/50percentoff.jpg" alt="" class="news-item-img">
                        </div>
                        <div class="news-item-body">
                            慶祝REON五歲了！多樣商品五折優惠！<br>2024/08/19
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 news-item">
                    <a href="#" style="display: block; text-decoration: none;">
                        <div>
                            <img src="images/news3.jpg" alt="" class="news-item-img">
                        </div>
                        <div class="news-item-body">
                            LENS TOWN進駐REON啦！多款系列任挑！<br>2024/07/30
                        </div>
                    </a>
                </div>
                <div class="card col-sm-3 d-flex justify-content-center align-items-center ">
                    <a href="#" class="text-grey">
                        <h1 style="line-height:7rem;"><i class="fa-regular fa-circle-up fa-rotate-90 fa-2xl"></i></h1>
                        <h6 style="font-weight:bold;">更 多 消 息 </h6>
                    </a>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <!-- 當月精選 -->
    <section id="suggest" class="d-flex justify-content-center align-items-center">
        <div class="container suggestion-size">
            <div class="row">
                <div class="little-title">當月精選</div>
            </div>
            <div class="row text-center d-flex justify-content-center">
                <!-- 卡片一 -->
                <div class="col-sm-2 d-flex justify-content-center">
                    <div class="card" style="width: 10rem;">
                        <!-- 卡一輪播 -->
                        <div id="carouselExampleDark-1" class="carousel carousel-dark slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/g04L/01.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04L/02.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04L/03.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04L/04.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04L/05.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04L/06.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04L/07.webp" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark-1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark-1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- 卡一介紹 -->
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="card-body-height">
                                <h6 class="card-title" style="font-weight:bold">RESI0817G</h6>
                                <p class="card-text">墨鏡眼鏡兩用/波士頓多角形/不鏽鋼/Asia fit鼻墊/REON DESIGN</p>
                            </div>
                            <a href="#" class="btn btn-reon-b btn-sm">了解更多</a>
                        </div>
                    </div>
                </div>
                <!-- 卡片二 -->
                <div class="col-sm-2 d-flex justify-content-center">
                    <div class="card" style="width: 10rem;">
                        <!-- 卡二輪播 -->
                        <div id="carouselExampleDark-2" class="carousel carousel-dark slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/g04B/01.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04B/02.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04B/03.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04B/04.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04B/05.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04B/06.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g04B/07.webp" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark-2" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark-2" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- 卡二介紹 -->
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="card-body-height">
                                <h6 class="card-title" style="font-weight:bold">RESI0817B</h6>
                                <p class="card-text">墨鏡眼鏡兩用/波士頓多角形/不鏽鋼/Asia fit鼻墊/REON DESIGN</p>
                            </div>
                            <a href="#" class="btn btn-reon-b btn-sm">了解更多</a>
                        </div>
                    </div>
                </div>
                <!-- 卡片三 -->
                <div class="col-sm-2 d-flex justify-content-center">
                    <div class="card" style="width: 10rem;">
                        <!-- 卡三輪播 -->
                        <div id="carouselExampleDark-3" class="carousel carousel-dark slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/g01/01.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g01/02.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g01/03.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g01/04.webp" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark-3" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark-3" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- 卡三介紹 -->
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="card-body-height">
                                <h6 class="card-title" style="font-weight:bold">NICA0817</h6>
                                <p class="card-text">多角形/不鏽鋼/Asia fit鼻墊/NIA CIA</p>
                            </div>
                            <a href="#" class="btn btn-reon-b btn-sm">了解更多</a>
                        </div>
                    </div>
                </div>
                <!-- 卡片四 -->
                <div class="col-sm-2 d-flex justify-content-center">
                    <div class="card" style="width: 10rem;">
                        <!-- 卡四輪播 -->
                        <div id="carouselExampleDark-4" class="carousel  carousel-dark slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/g02/01.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g02/02.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g02/03.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/g02/04.webp" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark-4" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark-4" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- 卡四介紹 -->
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="card-body-height">
                                <h6 class="card-title" style="font-weight:bold">NICA0818</h6>
                                <p class="card-text">方形/不鏽鋼/Asia fit鼻墊/NIA CIA</p>
                            </div>
                            <a href="#" class="btn btn-reon-b btn-sm">了解更多</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php require_once("footer.php") ?>
    <?php require_once("jsfile.php") ?>
</body>

</html>