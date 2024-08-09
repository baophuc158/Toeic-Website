<?php
    include_once('ketnoi.php');
    class mdki{
        function dkiTK()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['dki']))
                {
                    $matk= $_POST['user'];
                    $mk= hash('ripemd160',$_POST['pass']);
                    
                }
                $sql= "insert into taikhoan (MaTK, Password, MaVT) values ('$matk', '$mk', 'HV')";
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
        function addttHV()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['dki']))
                {
                    $matk= $_POST['user'];
                    $email= $_POST['email'];
                    $tenhv= $_POST['fullname'];    
                }
                $sql= "insert into hocvien (MaHV, Email, TenUser, MaVT) values ('$matk', '$email', N'$tenhv', 'HV')";
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
        function capTK()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['cap']))
                {
                    $matk= $_POST['username'];
                    $mk= hash('ripemd160',$_POST['password']);
                    
                }
                $sql= "insert into taikhoan (MaTK, Password, MaVT) values ('$matk', '$mk', 'QLTL')";
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
        function addttQL()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['cap']))
                {
                    $matk= $_POST['username'];
                    $email= $_POST['email'];
                    $tenql= $_POST['fullname'];
                    $phone= $_POST['phone'];    
                }
                $sql= "insert into quanlytailieu (MaQLTL, Email, TenUser, MaVT, SĐT) values ('$matk', '$email', N'$tenql', 'QLTL', $phone)";
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
