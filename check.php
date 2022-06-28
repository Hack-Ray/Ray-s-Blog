<?php
session_start();
include("const.php");
if(isset($_POST['account'])) {
    if ($_POST['account'] == 'ray') {
        if ($_POST['pwd'] == $admin_pwd){
            echo "<h1>登入成功！</h1>";
            $_SESSION['user'] = 'ok';
            header('location: http://localhost/blog/admin.php');
        } else {
            echo "<script>alert('密碼錯誤！');</script>";
        }
    } else {
            echo "<script>window.location.herf='http://localhost/blog/login.php';</script>";
    }
}