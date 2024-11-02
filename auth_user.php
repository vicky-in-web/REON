<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json;charset=utf-8');
(!isset($_SESSION)) ? session_start() : "";
require_once('Connections/dbset.php');
if (isset($_POST['inputAccount']) && isset($_POST['inputPassword'])) {
    $inputAccount = $_POST['inputAccount'];
    $inputPassword = $_POST['inputPassword'];
    $query = sprintf("SELECT * FROM member WHERE email='%s' AND pw1='%s'", $inputAccount, $inputPassword);
    $result = $link->query($query);
    if ($result) {
        if ($data['active']) {
            $_SESSION['login'] = true;
            $_SESSION['emailid'] = $data['emailid'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['cname'] = $data['cname'];
            $_SESSION['imgname'] = $data['imgname'];
            $retcode = array("c" => "1", "m" => '會員驗證成功');
        } else {
            // 清除 session，以確保無法自動登入
            session_unset();
            session_destroy();
            $retcode = array("c" => "2", "m" => '會員帳號已鎖定，請聯絡管理員');
        }
    } else {
        $retcode = array("c" => "0", "m" => '抱歉！會員驗證失敗，請聯絡管理員');
    }
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
    return;
}
