<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once('../config/ketnoiPDO.php');
    include_once('../model/question.php');

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);

    //$data = json_decode(file_get_contents("php://input"));
    $MaCH=$_REQUEST['MaCH'];
    $question->MaCH = $MaCH;
    

    if($question->delete())
    {
        echo json_encode(array('message', 'Câu hỏi đã được xóa !'));
    }
    else
    {
        echo json_encode(array('message', 'Câu hỏi chưa được xóa !'));
    }
?>