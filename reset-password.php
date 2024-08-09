<?php
    $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
    if(isset($_POST["reset-password-submit"]))
    {
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat = $_POST["pwd-repeat"];

        if(empty($password) || empty($passwordRepeat))
        {
            header("location: create-new-password.php?newpwd=empty");
            exit();
        }
        else if($password != $passwordRepeat)
        {
            header("Location: create-new-password.php?newpwd=pwdnotsame");
            exit();
        }

        $currentDate = date("U");

        //require("model/ketnoi.php");

        $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "Lỗi truy vấn!";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result))
            {
                echo "Bạn cần xác nhận lại yêu cầu cập nhật mật khẩu.";
                exit();
            }
            else
            {
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

                if($tokenCheck === false)
                {
                    echo "Bạn cần xác nhận lại yêu cầu cập nhật mật khẩu.";
                    exit();
                }
                elseif($tokenCheck === true)
                {
                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT *FROM hocvien WHERE Email = ?;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql))
                    {
                        echo "Lỗi truy vấn!";
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result))
                        {
                            echo "Lỗi truy vấn!";
                            exit();
                        }
                        else
                        {
                            $sql = "UPDATE taikhoan inner join hocvien on taikhoan.MaTK = hocvien.MaHV SET taikhoan.Password=? WHERE hocvien.Email=?";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql))
                            {
                                echo "Lỗi truy vấn!";
                                exit();
                            }
                            else
                            {
                                $newPwdHash = hash('ripemd160',$password);
                                mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail =?";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql))
                                {
                                    echo "Lỗi truy vấn!";
                                    exit();
                                }
                                else
                                {
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: Login_page.php?newpwd=passwordupdated");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    else
    {
        header("location: index.php");
    }
?>