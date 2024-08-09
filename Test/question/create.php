<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once('../config/ketnoiPDO.php');
    include_once('../model/question.php');

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);

    //$data = json_decode(file_get_contents('php://input'));
    $MaPart= $_REQUEST['mapart'];
    $Cauhoi= $_REQUEST['ch'];
    $DapanA= $_REQUEST['dapana'];
    $DapanB= $_REQUEST['dapanb'];
    $DapanC= $_REQUEST['dapanc'];
    $DapanD= $_REQUEST['dapand'];
    $DapanDung= $_REQUEST['dapandung'];
    $MaDV= $_REQUEST['madv'];
    $script= $_REQUEST['script'];
    $MaLT= $_REQUEST['malt'];
    
    $question->MaPart = $MaPart;
    $question->Cauhoi = $Cauhoi;
    $question->DapanA = $DapanA;
    $question->DapanB = $DapanB;
    $question->DapanC = $DapanC;
    $question->DapanD = $DapanD;
    $question->DapanDung = $DapanDung;
    $question->MaDV = $MaDV;
    $question->script = $script;
    $question->route_level = $MaLT;

    if($question->create())
    {
        echo json_encode(array('status'=>1), JSON_UNESCAPED_UNICODE);
    }
    else
    {
        echo json_encode(array('status'=>0), JSON_UNESCAPED_UNICODE);
    }
?>