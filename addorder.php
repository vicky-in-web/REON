<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json;charset=utf-8');

(!isset($_SESSION)) ? session_start() : "";
require_once("Connections/dbset.php");

if (isset($_SESSION['emailid']) && $_SESSION['emailid'] != "") {
    $emailid = $_SESSION['emailid'];
    $addressid = $_POST['addressid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $orderid = date('Ymdhis') . rand(10000, 99999);
    $query = sprintf("INSERT INTO uorder (orderid, emailid, addressid, howpay, paystatus, status) VALUES ('%s','%d','%d','3','35','7');", $orderid, $emailid, $addressid);
    $result = $link->query($query);

    if ($result) {
        $query = sprintf("UPDATE cart SET orderid='%s', emailid='%d', status='8' WHERE ip='%s' AND orderid IS NULL;", $orderid, $emailid, $ip);
        $result = $link->query($query);
        $retcode = array("c" => "1", "m" => '謝謝您，系統已經完成結帳，請在首頁查閱訂單處理狀態。');
    } else {
        $retcode = array("c" => "0", "m" => '抱歉！資料無法寫入後台資料庫，請聯絡管理人員');
    }
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
}
return;

    //     if ($result) {
    //         // 更新 cart 資料表
    //         $query = sprintf("UPDATE cart SET orderid='%s', emailid='%d', status='8' WHERE ip='%s' AND orderid IS NULL;", $orderid, $emailid, $ip);
    //         $result = $link->query($query);

    //         // 檢查更新是否成功
    //         if ($result) {
    //             // 刪除已經完成結帳的購物車記錄
    //             $deleteQuery = sprintf("DELETE FROM cart WHERE emailid='%d' AND status='8';", $emailid);
    //             $deleteResult = $link->query($deleteQuery);

    //             // 返回成功訊息
    //             if ($deleteResult) {
    //                 $retcode = array("c" => "1", "m" => '謝謝您，系統已經完成結帳，請在首頁查閱訂單處理狀態。');
    //             } else {
    //                 $retcode = array("c" => "0", "m" => '抱歉！無法清空購物車，請聯絡管理人員');
    //             }
    //         } else {
    //             $retcode = array("c" => "0", "m" => '抱歉！資料無法寫入後台資料庫，請聯絡管理人員');
    //         }
    //         echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
    //     }
    // }