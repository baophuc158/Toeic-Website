<?php
    $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
    //mysqli_set_charset($conn ,'utf8');
    if(isset($_POST["reset-request-submit"]))
    {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "https://ayaya-toeic-iuh.click/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

        $expires = date("U") + 1800;

        $userEmail = $_POST["email"];
        //Check e-mail 
        $sqlchk="SELECT * FROM hocvien WHERE Email='$userEmail'";
        $result=mysqli_query($conn, $sqlchk);
        if(mysqli_num_rows($result)>0)
        {
            //If email exists in database
            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail =?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                echo "Lỗi truy vấn!";
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "s", $userEmail);
                mysqli_stmt_execute($stmt);
            }
    
            $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                echo "Lỗi truy vấn!";
                exit();
            }
            else
            {
                $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
                mysqli_stmt_execute($stmt);
            }
    
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
    
            $to = $userEmail;
            
            $subject = 'Reset your password for ATI';
    
            $message = '<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email :D</p>';
    
            $message .= '<p>Here is your password reset link </br>';
    
            $message .= '<a href="' .$url. '">' .$url. '</a></p>';
    
            $headers = "From: ATI <a.toeic.iuh@gmail.com>\r\n";
            $headers .= "Reply-To: a.toeic.iuh@gmail.com\r\n";
            $headers .= "Content-type: text/html\r\n"; 
    
            mail($to, $subject, $message, $headers);
    
            //echo "<script>alert('Check your mailbox!')</script>";
            header("location: forgot_pass.php?reset=success");
        }
        //Not exist in database
        else
        {
            echo "<script>alert('Bạn chưa đăng kí tài khoản bằng email này!')</script>";
            echo header("refresh:0;url='forgot_pass.php'");
        }
    }
    else
    {
        header("location: index.php");
    }
?>