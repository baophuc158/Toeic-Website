<?php
include('xacnhan.php');
if($_SESSION['vt']=='QLTL')
{
    if(isset($_REQUEST["up"]))
    {
        $malt=$_REQUEST["malt"];
        $tgian=$_REQUEST["thoigian"];
        $dexuat=$_REQUEST["dexuat"];
        if($malt==''||$tgian==''||$dexuat=='')
        {
            echo "<script>alert('Thiếu thông tin nhập')</script>";
            echo header("refresh:0;url='update-course-detail.php?MaLT=$malt'");
        }
        /*elseif($mk!=$remk)
        {
            echo "<script>alert('Mật khẩu không khớp')</script>";
            echo header("refresh:0;url=../Signup_page.php");
        }*/
        else
        {
            if(isset($_POST['up']))
            {
                include("../controller/clt.php");
                $p= new cLT();
                $kq= $p->reuplt($malt);
                if($kq)
                {
                    echo "<script>alert('Cập nhật thành công')</script>";
                    echo header("refresh:0;url='course-detail.php?MaLT=$malt'");
                }
                else
                {
                    echo "<script>alert('Lỗi cập nhật')</script>";
                    echo header("refresh:0;url='update-course-detail.php?MaLT=$malt'");
                }

            }       
        }
    }
}
elseif($_SESSION['vt']=='HV')
{
    echo '<script>alert("Bạn không được cấp quyền này !")</script>';
    echo '<script>window.location.href="index.php"</script>';
}
else
{
    echo '<script>alert("Bạn không được cấp quyền truy cập !")</script>';
    echo '<script>window.location.href="../Admin/index.php"</script>';
}

?>