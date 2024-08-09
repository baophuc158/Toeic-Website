<?php
include("xacnhan.php");
if($_SESSION['vt']=='HV')
{
    if(isset($_REQUEST["luu"]))
    {
        $username=$_REQUEST["username"];
        $fname=$_REQUEST["fname"];
        $sdt=$_REQUEST["sdt"];
        $khuvuc=$_REQUEST["khuvuc"];
        $chk='/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/';
        //$chk='/^(84|0[3|5|7|8|9])+([0-9]{8})\b$/';
        if($fname==''||$sdt==''||$khuvuc=='none')
        {
            echo "<script>alert('Thiếu thông tin nhập')</script>";
            echo header("refresh:0;url='user_changeinfo.php'");
        }
        elseif(!preg_match($chk,$sdt))
        {
            echo "<script>alert('Số điện thoại không hợp lệ (10 số theo chuẩn Vietnam)')</script>";
            echo header("refresh:0;url=user_changeinfo.php");
        }
        else
        {
            if(isset($_POST['luu']))
            {
                include("../controller/ctt.php");
                $p= new ctt();
                $kq= $p->reluutt();
                if($kq)
                {
                    echo "<script>alert('Cập nhật thành công')</script>";
                    echo header("refresh:0;url='user_info.php'");
                }
                else
                {
                    echo "<script>alert('Cập nhật thất bại')</script>";
                    echo header("refresh:0;url='user_info.php'");
                }
            }       
        }
    }
}
elseif($_SESSION['vt']=='QLTL')
{
    echo "<script>alert('Bạn không phải học viên')</script>";
    echo header("refresh:0;url='index.php'");
}
else
{
    echo "<script>alert('Bạn không phải học viên')</script>";
    echo header("refresh:0;url='../Admin/index.php'");
}

?>