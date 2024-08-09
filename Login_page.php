<?php
    //session_start();
    if(isset($_SESSION['ID']))
    {
      echo '<script language="javascript">alert("You are logged!")</script>';
      echo '<script>window.location="view/index.php"</script>';
    }
    else
    {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ATI | Đăng nhập</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/ayaya.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>

    <!-- Login -->
    <link rel="stylesheet" href="assets/css/login_form.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="parent clearfix">
    <div class="bg-illustration">
      <img src="https://i.ibb.co/Pcg0Pk1/logo.png" alt="logo">

      <div class="burger-btn">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
    
    <div class="login">
      <div class="container">
        <h1>Đăng nhập để truy cập vào tài khoản của bạn</h1>
    
        <div class="login-form">
          <form action="" method="POST">
            <input type="text" name="user" id="user" placeholder="Nhập tài khoản">
            <input type="password" name="pass" id="pass" placeholder="Nhập mật khẩu">

            <div class="remember-form">
              <input type="checkbox">
              <span>Ghi nhớ đăng nhập</span>
            </div>
            <div class="forget-pass">
              <a href="forgot_pass.php">Quên mật khẩu ?</a>
            </div>
            <div class="create_acc">
              <p style="text-align: center; font-size: 20px;">Chưa có tài khoản ?  <a style="color : blue;" href="Signup_page.php">Đăng kí tại đây!</a> </p>
            </div>
            <?php
                if(isset($_GET["newpwd"]))
                {
                  if($_GET["newpwd"] == "passwordupdated")
                  {
                    echo '<p style="color: red;" class="signupsuccess">Mật khẩu của bạn đã được cập nhật!</p>';
                  }
                }
            ?>
            <button type="submit" name="Dnhap" id="Dnhap">ĐĂNG NHẬP</button>
            
          </form>
          <?php
            include("view/dnhap.php");
          ?>
        </div>
      </div>
      </div>
  </div>

</body>

</html>
<?php
  }
?>