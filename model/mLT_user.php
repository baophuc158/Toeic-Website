<?php
    include_once('ketnoi.php');
    class mLT_user
    {
        function show_user_route($mahv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            $p=new ketnoi();
            if($conn)
            {
                /*if(isset($_POST['accept']))
                {
                    $malt=$_POST['malt'];
                }*/
                $sql= "SELECT *FROM lotrinh_thoigian WHERE user='$mahv' and route_status='studying'";
                $qr= mysqli_query($conn, $sql);
                return $qr;
                $p->ngatketnoi($conn);
                
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
        function update_LT_user_info($mahv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            $p=new ketnoi();
            if($conn)
            {
                if(isset($_POST['cancel']))
                {
                    $malt = $_GET['route'];
                    $mahv = $_SESSION['ID'];
                }
                $sql= "UPDATE hocvien SET MaLT = NULL WHERE MaHV='$mahv'";
                $qr= mysqli_query($conn, $sql);
                return $qr;
                $p->ngatketnoi($conn);
                
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
    }
?>