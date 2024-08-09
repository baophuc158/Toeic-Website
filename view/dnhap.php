<?php
	session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $errmsg_arr = array();
        $errflag = false;
        $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
        mysqli_set_charset($conn ,'utf8');
        $user = $_POST['user'];
        $pass = hash('ripemd160',$_POST['pass']);
        $sql="SELECT * FROM taikhoan WHERE MaTK = '$user' AND Password = '$pass'";
        $result=mysqli_query($conn, $sql);
        if($result) 
        {
            if(mysqli_num_rows($result) > 0) 
            {

                //Login Successful
                session_regenerate_id();
                $use = mysqli_fetch_assoc($result);
                
                
                $_SESSION['ID'] = $use['MaTK'];
                $_SESSION['vt'] = $use['MaVT'];
                if($_SESSION['vt'] =='HV' || $_SESSION['vt'] == 'QLTL')
                {
                    header("location: view/index.php");
                    exit();	
                }
                elseif($_SESSION['vt'] == 'QTHT')
                {
                    header("location: Admin/index.php");
                    exit();
                }
            }
            else 
            {
                echo '<br>';
                
                echo "<div style='height:20px; color:red;'><center><h3>" . "Đăng nhập thất bại" . "</h3></center></div>";

                exit();
            }
        }
        else 
        {
            die("Truy vấn thất bại");
        }	
    }
?>