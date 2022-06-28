<?php
$db = "mysql";
$server_Name = "localhost";
$db_Name = "Ray_Blog";
$user_Name = "root";
$user_Pwd = "1234";

$conn = new PDO("$db:host=$server_Name;dbname=$db_Name", $user_Name, $user_Pwd);
$conn->exec("set names utf8");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
