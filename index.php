<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html {
            margin: 0;
            padding: 0;
        }

        html a {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        body {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
        }

        .outline {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            font-size: 12rem;
            color: #dbb95a;
            background-color: #eee;
        }

        .RE {
            position: relative;
            right: 0;
            transition: all 0.5s ease 0s;
        }

        .RE:hover {
            right: 200px;
        }

        .ON {
            position: relative;
            left: 0;
            transition: all 0.5s ease 0s;
        }

        .ON:hover {
            left: 200px;
        }

        /* 可以指定接觸到ouline或之類的時候，讓RE和ON產生hover嗎 */
    </style>
</head>

<body>
    <div class="outline">
        <div class="RE">RE</div>
        <div class="ON">ON</div>
    </div>
    <a href="main.php">
        <div class="motto">
            <div class="up">尋找</div>
            <hr>
            <div class="down">你眼裡的光</div>
        </div>
    </a>

</body>

</html>