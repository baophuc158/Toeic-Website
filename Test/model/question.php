<?php
    class Question
    {
        private $conn;

        //cấu trúc câu hỏi :
        public $MaCH;
        public $MaPart;
        public $Cauhoi;
        public $DapanA;
        public $DapanB;
        public $DapanC;
        public $DapanD;
        public $DapanDung;
        public $MaDV;
        public $script;
        public $MaLT;

        //kết nối CSDL :
        public function __construct($db)
        {
            $this->conn = $db;
            $this->conn->exec("set names utf8mb4");
        }
        
        //đọc DL :
        public function read()
        {
            $query = "SELECT *FROM noidungon where MaPart='R5' or MaPart='R6' or MaPart='R7' ORDER BY MaPart ASC ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        //hiển thị DL :
        public function show()
        {
            $query = "SELECT *FROM noidungon WHERE MaCH =? LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt ->bindParam(1, $this->MaCH);
            $stmt ->execute();
           
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->Cauhoi = $row['Cauhoi'];
            $this->MaPart = $row['MaPart'];
            $this->DapanA = $row['DapanA'];
            $this->DapanB = $row['DapanB'];
            $this->DapanC = $row['DapanC'];
            $this->DapanD = $row['DapanD'];
            $this->DapanDung = $row['DapanDung'];
            $this->MaDV = $row['MaDV'];
            $this->script = $row['script'];
            $this->route_level = $row['route_level'];
        }
        //Tạo dữ liệu
        public function create()
        {
            $query = "INSERT INTO noidungon SET MaPart=:MaPart, Cauhoi =:Cauhoi, DapanA=:DapanA, DapanB=:DapanB, DapanC=:DapanC, DapanD=:DapanD, DapanDung=:DapanDung, MaDV=:MaDV, script=:script, route_level=:route_level";
            
            $stmt = $this->conn->prepare($query);
            //làm sạch dữ liệu 
            $this->MaPart = htmlspecialchars(strip_tags($this->MaPart));
            $this->Cauhoi = htmlspecialchars(strip_tags($this->Cauhoi));
            $this->DapanA = htmlspecialchars(strip_tags($this->DapanA));
            $this->DapanB = htmlspecialchars(strip_tags($this->DapanB));
            $this->DapanC = htmlspecialchars(strip_tags($this->DapanC));
            $this->DapanD = htmlspecialchars(strip_tags($this->DapanD));
            $this->DapanDung = htmlspecialchars(strip_tags($this->DapanDung));
            $this->MaDV = htmlspecialchars(strip_tags($this->MaDV));
            $this->script = htmlspecialchars(strip_tags($this->script));
            $this->route_level = htmlspecialchars(strip_tags($this->route_level));

            //bind dữ liệu :
            $stmt->bindParam(':MaPart',$this->MaPart);
            $stmt->bindParam(':Cauhoi',$this->Cauhoi);
            $stmt->bindParam(':DapanA',$this->DapanA);
            $stmt->bindParam(':DapanB',$this->DapanB);
            $stmt->bindParam(':DapanC',$this->DapanC);
            $stmt->bindParam(':DapanD',$this->DapanD);
            $stmt->bindParam(':DapanDung',$this->DapanDung);
            $stmt->bindParam(':MaDV',$this->MaDV);
            $stmt->bindParam(':script',$this->script);
            $stmt->bindParam(':route_level',$this->route_level);
            if($stmt->execute())
            {
                return true;
            }
            else
            {
                printf("Error %s. \n" ,$stmt->error);
                return false;
            }
        }
        //update dữ liệu :
        public function update()
        {
            $query = "UPDATE noidungon SET MaPart=:MaPart, Cauhoi =:Cauhoi, DapanA=:DapanA, DapanB=:DapanB, DapanC=:DapanC, DapanD=:DapanD, DapanDung=:DapanDung, MaDV=:MaDV, script=:script, route_level=:route_level WHERE MaCH=:MaCH";
            
            $stmt = $this->conn->prepare($query);
            //làm sạch dữ liệu 
            $this->MaCH = htmlspecialchars(strip_tags($this->MaCH));
            $this->MaPart = htmlspecialchars(strip_tags($this->MaPart));
            $this->Cauhoi = htmlspecialchars(strip_tags($this->Cauhoi));
            $this->DapanA = htmlspecialchars(strip_tags($this->DapanA));
            $this->DapanB = htmlspecialchars(strip_tags($this->DapanB));
            $this->DapanC = htmlspecialchars(strip_tags($this->DapanC));
            $this->DapanD = htmlspecialchars(strip_tags($this->DapanD));
            $this->DapanDung = htmlspecialchars(strip_tags($this->DapanDung));
            $this->MaDV = htmlspecialchars(strip_tags($this->MaDV));
            $this->script = htmlspecialchars(strip_tags($this->script));
            $this->route_level = htmlspecialchars(strip_tags($this->route_level));

            //bind dữ liệu :
            $stmt->bindParam(':MaCH',$this->MaCH);
            $stmt->bindParam(':MaPart',$this->MaPart);
            $stmt->bindParam(':Cauhoi',$this->Cauhoi);
            $stmt->bindParam(':DapanA',$this->DapanA);
            $stmt->bindParam(':DapanB',$this->DapanB);
            $stmt->bindParam(':DapanC',$this->DapanC);
            $stmt->bindParam(':DapanD',$this->DapanD);
            $stmt->bindParam(':DapanDung',$this->DapanDung);
            $stmt->bindParam(':MaDV',$this->MaDV);
            $stmt->bindParam(':script',$this->script);
            $stmt->bindParam(':route_level',$this->route_level);
            if($stmt->execute())
            {
                return true;
            }
            else
            {
                printf("Error %s. \n" ,$stmt->error);
                return false;
            }
        }
        //delete dữ liệu :
        public function delete()
        {
            $query = "DELETE FROM noidungon WHERE MaCH=:MaCH";
            
            $stmt = $this->conn->prepare($query);
            //làm sạch dữ liệu 
            $this->MaCH = htmlspecialchars(strip_tags($this->MaCH));

            //bind dữ liệu :
            $stmt->bindParam(':MaCH',$this->MaCH);

            if($stmt->execute())
            {
                return true;
            }
            else
            {
                printf("Error %s. \n" ,$stmt->error);
                return false;
            }
        }
    }
?>