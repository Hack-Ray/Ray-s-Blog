<?php
    session_start();
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='http://localhost/blog/login.php';</script>";
    }
    include("dbconn.php");
    
    $stmt = $conn->prepare("INSERT INTO `articles` (title, body, class) VALUES (:title, :body, :class);");
    $stmt->bindParam(":title", $_POST['title']);
    $stmt->bindParam(":body", $_POST['body']);
    $stmt->bindParam(":class", $_POST['class']);
    $stmt->execute();
    $conn = null;
    header("location: http://localhost/blog/admin.php");