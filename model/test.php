<?php
$servername = "localhost";
$username = "ayayatoe";
$password = "tP94l7nyXH(9#B";
$db = "ayayatoe_toeic";

try {
  $conn = new PDO("mysql:host=localhost;dbname=ayayatoe_toeic", "ayayatoe", "tP94l7nyXH(9#B");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>