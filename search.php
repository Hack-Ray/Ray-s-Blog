<?php
    //修改文章時預先搜尋填回表格
    $num = $_GET["num"];
    include("dbconn.php");
    $stmt = $conn->prepare("SELECT * FROM `articles` WHERE id = :num;");
    $stmt->bindParam(":num", $num);                
    $stmt->execute();            
    // set the resulting array to associative
    $result = $stmt->Fetch(PDO::FETCH_ASSOC);
    // ${result['title']} ${result['body']} ${result['class']}
    //將資料綁回變數
    $title = $result['title'];
    $body =  $result['body'];
    $class = $result['class'];
    $id = $result['id'];
    $conn = null;//清除資料庫連線
