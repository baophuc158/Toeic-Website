<?php
    include_once('ketnoi.php');
    class mTK
    {
        function xemtaikhoan()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from taikhoan ";
                $qr = mysqli_query($conn, $sql);
                if(!$qr)
                {
                    echo mysqli_error($conn);
                }
                return $qr;
                mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function xemchitiet($matk)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select *from taikhoan where MaTK='$matk'";
                $qrr = mysqli_query($conn,$sql);
                $mand=mysqli_fetch_assoc($qrr);
                if($mand['MaVT']=='HV')
                {
                    $sql= "select *from hocvien JOIN taikhoan ON MaHV=MaTK WHERE MaTK='$matk'";
                }
                elseif($mand['MaVT']=='QLTL')
                {
                    $sql= "select *from quanlytailieu JOIN taikhoan ON MaQLTL=MaTK WHERE MaTK='$matk'";
                }
                elseif($mand['MaVT']=='QTHT')
                {
                    $sql= "select *from quantrihethong JOIN taikhoan ON MaQTHT=MaTK WHERE MaTK='$matk'";
                }
                $qr= mysqli_query($conn, $sql);
                return $qr;
                mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
    }
?>