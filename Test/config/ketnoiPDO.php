<?php
class db{

    private $servername = "localhost";
    private $username = "ayayatoe";
    private $password = "tP94l7nyXH(9#B";
    private $db = "ayayatoe_toeic";
  
  public function connect(){
    $this->conn = null;
    try{
      $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db."", $this->username, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
    catch(PDOException $e) {
      echo "Kết nối thất bại ! " . $e->getMessage();
    }
    return $this->conn;
  }
}


?>