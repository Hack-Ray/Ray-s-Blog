<?php
    $num = $_GET["num"];
    include("dbconn.php");
    $stmt = $conn->prepare("SELECT * FROM `articles` WHERE id = :num;");
    $stmt->bindParam(":num", $num);                
    $stmt->execute();            
    // set the resulting array to associative
    $result = $stmt->Fetch(PDO::FETCH_ASSOC);
    // ${result['title']} ${result['body']} ${result['class']}
    $title = $result['title'];
    $body =  $result['body'];
    $class = $result['class'];
    $id = $result['id'];
