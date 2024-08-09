<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ATI | Reset Password</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/ayaya.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .form-gap {
            padding-top: 70px;
        }
        *{
            background-color: whitesmoke;
        }
        #bro{
            border: 2px solid black;
            border-radius: 10px;
            box-shadow: 3px 4px 5px ;
        }

    </style>
</head>

<body>
    <main>
        <div class="form-gap"></div>
        <div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div id="bro" class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-key fa-4x"></i></h3>
                  <h2 class="text-center">Tạo mật khẩu mới</h2>
                  <p>Hãy nhập mật khẩu mới của bạn.</p>
                  <div class="panel-body">
                    <?php
                        $selector = $_GET["selector"];
                        $validator = $_GET["validator"];
        
                        if(empty($selector) || empty($validator))
                        {
                            echo "<script>alert('Could not validate your request!')</script>";
                            echo '<script>window.location="forgot-password.php"</script>';
                        }
                        else
                        {
                            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false)
                            {
                                ?>
                                    <form action="reset-password.php" id="register-form" role="form" autocomplete="off" class="form" method="post">
                                        <input type="hidden" name="selector" id="selector" value="<?php echo $selector ?>">
                                        <input type="hidden" name="validator" id="validator" value="<?php echo $validator ?>">
                                      <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                          <input id="key" name="pwd" placeholder="Nhập mật khẩu mới" class="form-control"  type="password">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                          <input id="key" name="pwd-repeat" placeholder="Nhập lại mật khẩu mới" class="form-control"  type="password">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" name="reset-password-submit" class="btn btn-lg btn-primary btn-block">Cập nhật mật khẩu</button>
                                      </div>
                                      
                                    </form>
                    <?php
                            }
                        }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
    </main>
    <!-- jQuery library -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- Slick slider -->
    <script type="text/javascript" src="assets/js/slick.js"></script>
    <!-- Counter -->
    <script type="text/javascript" src="assets/js/waypoints.js"></script>
    <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
    <!-- Mixit slider -->
    <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
    <!-- Add fancyBox -->
    <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>


    <!-- Custom js -->
    <script src="assets/js/custom.js"></script>
    </body>
</html>