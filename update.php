<?php
    session_start();
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='http://localhost/blog/login.php';</script>";
    }
    include("dbconn.php");

    $stmt = $conn->prepare("UPDATE `articles` SET `title`= :title, `body` = :body, `class` = :class WHERE id = :id");
    $stmt->bindParam(":title", $_POST['title']);
    $stmt->bindParam(":body", $_POST['body']);
    $stmt->bindParam(":class", $_POST['class']);
    $stmt->bindParam(":id", $_POST['id']);
    $stmt->execute();
    $conn = null;
    header("location: http://localhost/blog/admin.php");