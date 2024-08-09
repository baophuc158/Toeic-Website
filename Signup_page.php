<?php
    session_start();
    if(isset($_SESSION['ID']))
    {
      echo '<script>alert("You are logged!")</script>';
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
    <title>ATI | Đăng kí</title>

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
    <link rel="stylesheet" href="assets/css/Signup_form.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div id="login-box">
  <form action="view/dki.php" method="post">
    <div class="left">
      <h1>Đăng kí</h1>
      <input type="text" name="fullname" id="fullname" placeholder="Họ tên (không để trống)" />
      <input type="text" name="user" id="user" placeholder="Tài khoản (3-10 kí tự chữ, số)" />
      <input type="text" name="email" id="email" placeholder="E-mail (abc@xyz.cde)" />
      <input type="password" name="pass" id="pass" placeholder="Mật khẩu (8-15 a-z,A-Z và 0-9)" />
      <input type="password" name="repass" id="repass" placeholder="Nhập lại mật khẩu" />
      <button type="submit" class="btn btn-success" name="dki" id="dki">Đăng kí</button>
      </div>
    </form>
    
    
    <div class="right">
      <h1><p>Đăng nhập với<br />mạng xã hội</p></h1>
      <!--
      <a href="https://www.facebook.com/dialog/oauth?client_id=1993574384175706&redirect_uri=https://ayaya-toeic-iuh.click/loginfacebook/redirect-facebook.php"><button class="social-signin facebook">Đăng nhập với Facebook</button></a>
      -->
      <a href="logingoogle/redirect-google.php"><button class="social-signin google">Đăng nhập với Google+</button></a>
      <hr>
      <p style="text-align: center; font-size: 20px;">Bạn đã có tài khoản?<a href="Login_page.php"><u>Đăng nhập</u></a></p>
    </div>
    <a href="index.php"><div class="or">OR</div></a>
  </div>
</body>

</html>
<?php
  }
?>