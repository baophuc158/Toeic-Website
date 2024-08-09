<?php
    include("xacnhan.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/ayaya.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="../assets/css/jquery.fancybox.css" type="text/css" media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="../assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="../assets/css/style.css" rel="stylesheet">


    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>

    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- END SCROLL TOP BUTTON -->

    <!-- Start header  -->
    <header id="mu-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="mu-header-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="mu-header-top-left">
                                    <div class="mu-top-email">
                                        <i class="fa fa-envelope"></i>
                                        <span>a.toeic.iuh@gmail.com</span>
                                    </div>
                                    <div class="mu-top-phone">
                                        <i class="fa fa-phone"></i>
                                        <span>0589884957</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="mu-header-top-right">
                                    <nav>
                                    <ul class="nav navbar-right top-nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                                            <?php 
                                                include("../controller/ctt.php");
                                                $p=new ctt();
                                                $ten=$p->rett($_SESSION['ID']);
                                                $r=mysqli_fetch_assoc($ten);
                                                echo $r['TenUser'];
                                            ?>
                                            <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="user_info.php"><i class="fa fa-fw fa-pencil"></i>Thông tin cá nhân</a>
                                                </li>
                                                <?php
                                                    if($_SESSION['vt'] == 'HV')
                                                    {
                                                ?>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="diem.php"><i class="fa fa-fw fa-table"></i> Kết quả kiểm tra</a>
                                                        </li>
                                                <?php
                                                    }
                                                ?>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                                </li>
                                            </ul> 
                                        </li>
                                    </ul>                           
                                    </nav>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End header  -->
    <!-- Start menu -->
    <section id="mu-menu">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <!-- LOGO -->
                    <!-- TEXT BASED LOGO -->
                    <a class="navbar-brand" href="index.php"><i class="fa fa-university"></i><span>ATI</span></a>
                    <!-- IMG BASED LOGO  -->
                    <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                        <li class="nav_menu"><a href="index.php">Trang chủ</a></li>
                        <li class="nav_menu">
                            <a href="course.php">Lộ trình </a>
                        </li>
                        <li><a href="gallery.php">Nội dung ôn</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Luyện tập
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="choose_vocabulary.php">Từ vựng</a></li>
                                <li><a href="choose_grammar.php">Ngữ pháp</a></li>
                            </ul>
                        </li>
                        <li class="nav_menu">
                            <a href="blog-archive.php">Diễn đàn </a>
                        </li>
                        <li>
                            <?php
                                if($_SESSION['vt'] == 'QLTL')
                                {
                                    echo '<a href="createTest.php">Test</a>';
                                }
                                else
                                {
                                    echo '<a href="404.php">Test</a>';
                                }
                            ?>
                        </li>
                        <li><a href="tailieu.php">Tài liệu</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
    </section>
    <!-- End menu -->
    

    

    <!-- jQuery library -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.js"></script>
    <!-- Slick slider -->
    <script type="text/javascript" src="../assets/js/slick.js"></script>
    <!-- Counter -->
    <script type="text/javascript" src="../assets/js/waypoints.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.counterup.js"></script>
    <!-- Mixit slider -->
    <script type="text/javascript" src="../assets/js/jquery.mixitup.js"></script>
    <!-- Add fancyBox -->
    <script type="text/javascript" src="../assets/js/jquery.fancybox.pack.js"></script>


    <!-- Custom js -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>