<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="email" id="email">
            <input type="submit" name="gui" id="gui" value="Send email">
        </form>
        <?php
        if(isset($_POST['gui']))
        {
            $email= $_POST['email'];
            $to = $email;
        
            $subject = 'Reset your password for ATI';
        
            $message = '<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>';
        
            $message .= '<p>Here is your password reset link</br>';
        
            //$message .= '<a href="' .$url. '">' .$url. '</a></p>';
        
            $headers = "From: ATI <a.toeic.iuh@gmail.com>\r\n";
            $headers .= "Reply-To: a.toeic.iuh@gmail.com\r\n";
            $headers .= "Content-type: text/html\r\n"; 
        
            mail($to, $subject, $message, $headers);
            echo 'check';
        }
        ?>
    </body>
</html>
