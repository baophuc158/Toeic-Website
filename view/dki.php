<?php
session_start();
//if(!$_SESSION['ID'])
//{
    if(isset($_REQUEST["dki"]))
    {
        $matk=$_REQUEST["user"];
        $mk=$_REQUEST["pass"];
        $email=$_REQUEST["email"];
        $remk=$_REQUEST["repass"];
        $tenhv=$_REQUEST["fullname"];
        //$chktenhv='/^[a-zA-Z]*$/';
        $chkmatk='/^[a-zA-Z0-9]{3,10}$/';
        $chkmk='/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z\d\w]).{8,15}$/';
        //$chkemail='^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';
        if($matk==''||$mk==''||$email==''||$tenhv=='')
        {
            echo "<script>alert('Thiếu thông tin nhập')</script>";
            echo header("refresh:0;url='../Signup_page.php'");
        }
        elseif(preg_match($chkmatk,$matk) && preg_match($chkmk,$mk) && filter_var($email,FILTER_VALIDATE_EMAIL) /*&& preg_match($chktenhv,$tenhv)*/)
        {
            if($mk!=$remk)
            {
                echo "<script>alert('Mật khẩu không khớp!')</script>";
                echo header("refresh:0;url=../Signup_page.php");
            }
            else
            {
                if(isset($_POST['dki']))
                {
                    include("../controller/cdki.php");
                    $p= new cdki();
                    $kq= $p->reTK();
                    $kq1= $p->upTK();
                    if(($kq) && ($kq1))
                    {
                    echo "<script>alert('Đăng kí thành công')</script>";
                    echo header("refresh:0;url='../Login_page.php'");
                    }
                    else
                    {
                        echo "<script>alert('Sai cú pháp email hoặc mật khẩu')</script>";
                        echo header("refresh:0;url='../Signup_page.php'");
                    }
                }       
            }
        }
        else
        {
            echo "<script>alert('Kiểm tra lại thông tin nhập!')</script>";
            echo header("refresh:0;url='../Signup_page.php'");
        }
    }
/*}
elseif($_SESSION['vt']=='HV'||$_SESSION['vt']=='QLTL')
{
    echo "<script>alert('Bạn đã đăng nhập')</script>";
    echo header("refresh:0;url='index.php'");
}
elseif($_SESSION['vt']=='QTHT')
{
    echo "<script>alert('Bạn đã đăng nhập')</script>";
    echo header("refresh:0;url='../Admin/index.php'");
}*/

?>