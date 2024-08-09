<?php
    $server_name = "localhost";
    $user_name = "ayayatoe";
    $password = "tP94l7nyXH(9#B";
    $db="ayayatoe_toeic";
    
    $conn = mysqli_connect($server_name, $user_name, $password,$db);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>