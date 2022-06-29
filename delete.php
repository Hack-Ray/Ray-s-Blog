<?php
    session_start();
    include("const.php");
    //驗證是否登入了 否則導回login頁面
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='$login_url';</script>";
    }
    //db連線
    include("dbconn.php");

    //取得get num變數
    $num = $_GET["num"];
    //刪除id = num的文章
    $stmt = $conn->prepare("DELETE FROM `articles` WHERE id = :num");
    $stmt -> bindParam(":num", $num);
    $stmt -> execute();

    $conn = null;//清除資料庫連線
    echo "<script>window.location.href='$admin_url';</script>";