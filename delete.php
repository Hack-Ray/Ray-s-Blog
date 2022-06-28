<?php
    session_start();
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='http://localhost/blog/login.php';</script>";
    }
    include("dbconn.php");

    $num = $_GET["num"];
    $stmt = $conn->prepare("DELETE FROM `articles` WHERE id = :num");
    $stmt -> bindParam(":num", $num);
    $stmt -> execute();

    echo "<script>window.location.href='http://localhost/blog/admin.php';</script>";