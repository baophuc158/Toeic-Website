<?php
    include_once('ketnoi.php');
    class MBLOG
    {
        function tao_post()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['posts']))
                {
                    $mabv= $_POST['mabv'];
                    $TieuDe= $_POST['TieuDe'];
                    $Mota= $_POST['Mota'];   
                    $noidung= $_POST['noidung']; 
                    $chuyenmuc= $_POST['chuyenmuc'];
                    $MaUser= $_POST['mand'];
                    $ngaydang= $_POST['ngaydang'];
                }
                $sql= "insert into diendan (MaBV, TieuDe, Mota, Baiviet, chuyenmuc, MaUser, ngaydang) values ('$mabv', N'$TieuDe', N'$Mota', N'$noidung', N'$chuyenmuc', '$MaUser', '$ngaydang' )";
                $qr= mysqli_query($conn, $sql);
                return $qr;
                mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
        function xem_tieude()
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
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
        function xem_baiviet($mabv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql= "select *from diendan where MaBV = '$mabv'";
                $qr= mysqli_query($conn, $sql);
                return $qr;
               mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
        function binhluan()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $mabv= $_POST['mabv'];
                $MaUser= $_POST['MaUser'];
                $vaitro= $_POST['vaitro'];   
                $binhluan= $_POST['binhluan']; 
                $thoigianbl= $_POST['thoigianbl'];
                
                $sql= "insert into diendan_hocvien (MaBV, MaUser, vaitro, binhluan, thoigianbl) values ('$mabv','$MaUser', '$vaitro', N'$binhluan', '$thoigianbl')";
                $qr= mysqli_query($conn, $sql);
                return $qr;
                mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
        function xem_binhluan($mabv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql= "select *from diendan_hocvien where MaBV = '$mabv'";
                $qr= mysqli_query($conn, $sql);
                return $qr;
                mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
    }
?>