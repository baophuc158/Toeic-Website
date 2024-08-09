<?php
include('xacnhan.php');
if(isset($_REQUEST["updatech"]))
{
    $MaCH= $_REQUEST['mach'];
    $MaPart= $_REQUEST['mapart'];
    $Cauhoi= $_REQUEST['cauhoi'];
    $DapanA= $_REQUEST['dapana'];
    $DapanB= $_REQUEST['dapanb'];
    $DapanC= $_REQUEST['dapanc'];
    $DapanD= $_REQUEST['dapand'];
    $DapanDung= $_REQUEST['dapandung'];
    $MaDV= $_REQUEST['madv'];
    $Script = $_REQUEST['script'] != '' ? $_REQUEST['script'] : null;
    $MaLT = $_REQUEST['malt'] != '' ? $_REQUEST['malt'] : null;
    if($MaCH==''||$MaPart==''||$Cauhoi==''||$DapanA==''||$DapanB==''||$DapanC==''||$DapanD==''||$DapanDung==''||$MaDV=='')
    {
        echo "<script>alert('Thiếu thông tin nhập')</script>";
        echo header("refresh:0;url='update-question.php'");
    }
    else
    {
        if(isset($_POST['updatech']))
        {
            $fileInfo= array('mach'=> $MaCH, 'mapart'=>$MaPart, 'cauhoi'=>$Cauhoi, 'dapana'=>$DapanA, 'dapanb'=>$DapanB, 'dapanc'=>$DapanC, 'dapand'=>$DapanD, 'dapandung'=>$DapanDung, 'madv'=>$MaDV, 'script'=>$Script, 'malt'=>$MaLT);
            $fileInfo= http_build_query($fileInfo);
            $fileInfos= stream_context_create(array('http' => array(
                    'method' => "POST",
                    'header'=> "Content-type: application/x-www-form-urlencoded\r\n",
                    'content' => $fileInfo
                )));

            $files= file_get_contents('https://ayaya-toeic-iuh.click/Test/question/update.php', false, $fileInfos);
            $rekq= json_decode($files);
            //print_r($files);
            if($rekq->status==1)
            {
                echo "<script>alert('Cập nhật câu hỏi thành công!')</script>";
                echo header("refresh:0;url='gallery.php'");
            }
            else
            {
                echo "<script>alert('Cập nhật câu hỏi thất bại!')</script>";
                echo header("refresh:0;url='gallery.php'");
            }
        }
    }
}
?>