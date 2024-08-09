<?php
include('xacnhan.php');
include('../controller/cch.php');
$p=new cCH();
if(isset($_REQUEST["addch"]))
{
    $MaPart= $_REQUEST['mapart'];
    $Cauhoi= $_REQUEST['ch'];
    $DapanA= $_REQUEST['dapana'];
    $DapanB= $_REQUEST['dapanb'];
    $DapanC= $_REQUEST['dapanc'];
    $DapanD= $_REQUEST['dapand'];
    $DapanDung= $_REQUEST['dapandung'];
    $MaDV= $_REQUEST['madv'];
    $Noidung=$_REQUEST['noidung'];
    $Script = $_REQUEST['script'] != '' ? $_REQUEST['script'] : null;
    $MaLT = $_REQUEST['malt'] != '' ? $_REQUEST['malt'] : null;
    if($MaPart=='none'||$Cauhoi==''||$DapanA==''||$DapanB==''||$DapanC==''||$DapanD==''||$DapanDung==''||$MaDV==''||$Noidung='')
    {
        echo "<script>alert('Thiếu thông tin nhập')</script>";
        echo header("refresh:0;url='them_ch.php'");
        exit();
    }
    
    $check = $p->recheckch($MaPart);
    foreach ($check as $recheck)
    {
        if($recheck == $p->reslug($Cauhoi))
        {
            echo "<script>alert('Đã tồn tại câu hỏi $Cauhoi!')</script>";
            echo "<script>window.location.href = 'them_ch.php'</script>";
            exit();
        }
    }
    $kq=$p->upDV();
    $fileInfo= array('mapart'=>$MaPart, 'ch'=>$Cauhoi, 'dapana'=>$DapanA, 'dapanb'=>$DapanB, 'dapanc'=>$DapanC, 'dapand'=>$DapanD, 'dapandung'=>$DapanDung, 'madv'=>$MaDV, 'script'=>$Script, 'malt'=>$MaLT);
    $fileInfo= http_build_query($fileInfo);
    $fileInfos= stream_context_create(array('http' => array(
            'method' => "POST",
            'header'=> "Content-type: application/x-www-form-urlencoded\r\n",
            'content' => $fileInfo
        )));

    $files= file_get_contents('https://ayaya-toeic-iuh.click/Test/question/create.php', false, $fileInfos);
    $rekq= json_decode($files);
    if($rekq->status==1)
    {
        echo "<script>alert('Thêm câu hỏi thành công!')</script>";
        echo header("refresh:0;url='them_ch.php'");
        exit();
    }
    else
    {
        echo "<script>alert('Thêm câu hỏi thất bại!')</script>";
        echo header("refresh:0;url='them_ch.php'");
        exit();
    }
}
?>