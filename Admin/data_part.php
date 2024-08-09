<?php
    header('Content-Type: application/json');
    require_once('../Admin/csdl.php');
    $data = array();
    $query = "SELECT part.*,COUNT(noidungon.Mapart) as amount_Question FROM noidungon inner join part on noidungon.MaPart = part.MaPart GROUP BY noidungon.MaPart";
    $stmt = $conn->prepare($query);
    if($stmt->execute()){
        if($stmt->rowCount()>0){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    foreach($result as $row){
        $data[] = $row;
    }
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
?>
