<?php
    include_once('ketnoi.php');
    class mLT
    {
        function ttLT($malt)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from lotrinhluyenthi where MaLT='$malt' ";
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
        function upLT($malt)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['up']))
                {
                    $tgian=$_POST['thoigian'];
                    $dexuat= $_POST['dexuat'];
                }
                $sql= "update lotrinhluyenthi set Thoigian='$tgian', Dexuat=N'$dexuat' where MaLT='$malt'";
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
        function hvlt($mahv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['accept']))
                {
                    $malt=$_POST['malt'];
                }
                $sql= "update hocvien set MaLT='$malt' where MaHV='$mahv'";
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
        function time_selecting($mahv,$tenlt)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                if(isset($_POST['accept']))
                {
                    //$batdau = date('Y-m-d H:i:s', strtotime($date_begin));
                    //$ketthuc = date('Y-m-d H:i:s', strtotime($date_end));
                    
                    $batdau = $_POST['start-time'];
                    $ketthuc = $_POST['end-time'];
                    if(!empty($batdau) && !empty($ketthuc))
                    {
                        $sql = "INSERT INTO lotrinh_thoigian (ID, user, date_begin, date_end, route_name, route_status) VALUES ('', '$mahv', '$batdau', '$ketthuc', '$tenlt', 'studying')";      
                        $qr= mysqli_query($conn, $sql);
                        if($qr)
                        {
                            return $qr;
                        }
                        else
                        {
                            return false;
                        }

                    }
                }
                //$sql = "INSERT INTO lotrinh_thoigian (ID, date_begin, date_end, route_status, route_name, user) VALUES ('$batdau', '$ketthuc','studying','$tenlt', '$mahv') WHERE user='$mahv'";
                $p->ngatketnoi($conn);         
            }
            else
            {
                return false;
            }
        }
        function time_checking($mahv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                if(isset($_POST['accept']))
                {
                    $malt=$_POST['malt'];
                }
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
        function time_showing($mahv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
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
        function update_user_route($malt, $mahv, $goal, $result)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            $p=new ketnoi();
            if($conn)
            {
                if(isset($_POST['cancel']) || isset($_POST['ending']))
                {
                    if($goal == $result)
                    {
                        $sql= "UPDATE lotrinh_thoigian SET route_status='completed' WHERE user='$mahv' and route_name='$malt' and route_status = 'studying'";
                    }
                    else
                    {
                        $sql= "UPDATE lotrinh_thoigian SET route_status='incomplete' WHERE user='$mahv' and route_name='$malt' and route_status = 'studying'";
                    }
                }
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