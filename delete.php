<?php
    session_start();
    include("const.php");
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='$login_url';</script>";
    }
    include("dbconn.php");

    $num = $_GET["num"];
    $stmt = $conn->prepare("DELETE FROM `articles` WHERE id = :num");
    $stmt -> bindParam(":num", $num);
    $stmt -> execute();

    echo "<script>window.location.href='$admin_url';</script>";