<?php
    session_start();
    include("const.php");
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='$login_url';</script>";
    }
    include("dbconn.php");

    $stmt = $conn->prepare("UPDATE `articles` SET `title`= :title, `body` = :body, `class` = :class WHERE id = :id");
    $stmt->bindParam(":title", $_POST['title']);
    $stmt->bindParam(":body", $_POST['body']);
    $stmt->bindParam(":class", $_POST['class']);
    $stmt->bindParam(":id", $_POST['id']);
    $stmt->execute();
    $conn = null;
    header("location: " . $admin_url);