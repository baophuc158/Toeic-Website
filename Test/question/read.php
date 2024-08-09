<?php
//format kiểu file JSON :
    header('Access-control-allow-origin: *');
    header('Content-Type: application/json');

    include_once('../config/ketnoiPDO.php');
    include_once('../model/question.php');

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);
    $read = $question->read();
    $num = $read->rowCount();
    if($num>0)
    {
        $question_array = [];
        $question_array['data'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            //if($MaPart=='R5' || $MaPart=='R6' || $MaPart=='R7')
            //{
                $question_item = array(
                    'MaCH' => $MaCH,
                    'MaPart' => $MaPart,
                    'Cauhoi' => $Cauhoi,
                    'DapanA' => $DapanA,
                    'DapanB' => $DapanB,
                    'DapanC' => $DapanC,
                    'DapanD' => $DapanD,
                    'DapanDung' => $DapanDung,
                    'MaDV' => $MaDV,
                    'script' => $script,
                    'route_level' => $MaLT
                );
                array_push($question_array['data'],$question_item);
            //}
        }
        //print_r(json_encode($question_array));
        echo json_encode($question_array,JSON_UNESCAPED_UNICODE);
        //print_r(json_last_error());
    }
?>