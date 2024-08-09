<?php
    $servername = "localhost";
    $username = "ayayatoe";
    $password = "tP94l7nyXH(9#B";
    $dbname = "ayayatoe_toeic";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    $conn->exec("set names utf8mb4");
    
    if(!$conn){
        die("Connect database failed");
    }
?>
