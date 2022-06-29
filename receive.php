<?php
    session_start();
    include("const.php");
    //驗證是否登入
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='$login_url';</script>";
    }
    include("dbconn.php");
    
    //插入資料
    $stmt = $conn->prepare("INSERT INTO `articles` (title, body, class) VALUES (:title, :body, :class);");
    $stmt->bindParam(":title", $_POST['title']);
    $stmt->bindParam(":body", $_POST['body']);
    $stmt->bindParam(":class", $_POST['class']);
    $stmt->execute();
    $conn = null;
    header("location: " . $admin_url);
    //導回管理頁面