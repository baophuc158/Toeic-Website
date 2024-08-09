<?php
    include_once('ketnoi.php');
    class baiviet
    {
        function xuat_baiviet()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql= "select *from diendan";
                $qr= mysqli_query($conn, $sql);
                return $qr;
                mysqli_close($conn);
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
    }
?>