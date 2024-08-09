<?php
include('xacnhan.php');
if($_SESSION['vt']=='QTHT')
{
    if(isset($_REQUEST["cap"]))
    {
        $matk=$_REQUEST["username"];
        $mk=$_REQUEST["password"];
        $email=$_REQUEST["email"];
        $tenql=$_REQUEST["fullname"];
        $phone=$_REQUEST["phone"];
        $chkmatk='/^[a-zA-Z0-9]{3,10}$/';
        //$chkmk='/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,15}$/';
        $chk='/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/';
        if($matk==''||$mk==''||$email==''||$tenql==''||$phone=='')
        {
            echo "<script>alert('Thiếu thông tin nhập')</script>";
            echo header("refresh:0;url='give_TK.php'");
        }
        elseif(!preg_match($chkmatk,$matk) /*&& !preg_match($chkmk,$mk)*/ && !preg_match($chk,$sdt) && !filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            echo "<script>alert('Kiểm tra lại thông tin nhập')</script>";
            echo header("refresh:0;url=give_TK.php");
        }
        else
        {
            if(isset($_POST['cap']))
            {
                include("../controller/cdki.php");
                $p= new cdki();
                $kq= $p->reTKql();
                $kq1= $p->upTKql();
                if(($kq) && ($kq1))
                {
                echo "<script>alert('Cấp thành công')</script>";
                echo header("refresh:0;url='confirm_func.php'");
                }
                else
                {
                    echo "<script>alert('Lỗi cấp TK')</script>";
                    echo header("refresh:0;url='give_TK.php'");
                }

            }       
        }
    }
}
else
{
    echo "<script>alert('Không có quyền truy cập')</script>";
    echo header("refresh:0;url='index.php'");
}
?>