<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REON里光眼鏡</title>
    <link rel="stylesheet" href="/css/all.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton+SC&family=Archivo+Black&family=Noto+Serif+TC:wght@200..900&family=Righteous&display=swap');

        html {
            margin: 0;
            padding: 0;
            font-family: "Righteous";

        }

        .background {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        /* 
        @mixin disaplay_row {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            @content;
        } */

        /* .outline {
            @include display_row {
                font-size: 12rem;
                color: #dbb95a;
                background-color: #eee;
            }
        } */

        .outline {
            font-size: 12rem;
            color: #dbb95a;
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            position: absolute;
        }

        .outline a {
            text-decoration: none;
            color: inherit;
            display: block;
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            position: absolute;
        }

        .RE {
            position: relative;
            right: 0;
            transition: all 1s ease 0s;
        }

        .ON {
            position: relative;
            left: 0;
            transition: all 1s ease 0s;
        }

        .outline a:hover>.RE {
            right: 120px;
        }

        .outline a:hover>.ON {
            left: 160px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Anton+SC&family=Archivo+Black&family=Noto+Sans+TC:wght@100..900&family=Noto+Serif+TC:wght@200..900&family=Righteous&display=swap');

        .motto {
            font-family: "Noto Sans Traditional Chinese";
            color: #dbb95a;
            font-weight: bolder;
            opacity: 0;
            transition: all 0.5s ease 0.1s;
            z-index: -1;
        }

        .up {
            padding-top: 10px;
            text-align: center;
        }

        .down {
            text-align: center;
        }

        .outline:hover+.motto {
            opacity: 1;
        }

        .middleline {
            width: 150px;
            padding-top: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #dbb95a;
        }
    </style>
</head>

<body>
    <!-- <a href="main.php"></a> -->
    <div class="background">
        <div class="outline">
            <a href="main.php">
                <div class="RE">RE</div>
                <div class="ON">ON</div>
            </a>
        </div>
        <div class="motto">
            <div class="up"> 尋 找 </div>
            <div class="middleline"></div>
            <div class="down"> 你 眼 裡 的 光 </div>
        </div>
    </div>

</body>

</html>