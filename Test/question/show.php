<?php
    header('Access-control-allow-origin: *');
    header('Content-Type: application/json');

    include_once('../config/ketnoiPDO.php');
    include_once('../model/question.php');

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);
    //if else rút gọn : nếu có tồn tại thì lấy còn không thì ngủm :D 
    $question->MaCH = isset($_GET['MaCH']) ? $_GET['MaCH'] : die();

    $question->show();
        if($question->MaPart=='R5'||$question->MaPart=='R6'||$question->MaPart=='R7')
        {
            $question_item = array(
                'MaCH' => $question ->MaCH,
                'MaPart' => $question->MaPart,
                'Cauhoi' => $question->Cauhoi,
                'DapanA' => $question->DapanA,
                'DapanB' => $question->DapanB,
                'DapanC' => $question->DapanC,
                'DapanD' => $question->DapanD,
                'DapanDung' => $question->DapanDung,
                'script' => $question->script,
                'route_level' => $question->route_level
            );
        }
        print_r(json_encode($question_item));
?>