<?php
session_start();
include("const.php");
//驗證登入 先驗證管理者 再驗證密碼 錯誤都會提醒並導回login介面
//A
if(isset($_POST['account'])) {
    if ($_POST['account'] == 'ray') {
        if ($_POST['pwd'] == $admin_pwd){
            echo "<h1>登入成功！</h1>";
            $_SESSION['user'] = 'ok';
            header('location: ' . $admin_url);
        } else {
            echo "<script>alert('密碼錯誤！');</script>";
            echo "<script>window.location.href='$login_url';</script>";
            // header('location: ' . $login_url);
        }
    } else {
        echo "<script>alert('帳號錯誤!');</script>";
        echo "<script>window.location.href='$login_url';</script>";
    }
}