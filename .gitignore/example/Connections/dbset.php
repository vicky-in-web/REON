<?php
//POD sql連線指令
$dsn="mysql:host=localhost;dbname=lincan;charset=utf8";
$user="sales";
$password="123456";
$link=new PDO($dsn,$user,$password);
date_default_timezone_set("Asia/Taipei");

?>