<?php
  include('xacnhan.php');
  if($_SESSION['vt']=='QTHT')
  {
    ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ATI | Account</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../Admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="../Admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../Admin/vendors/css/vendor.bundle.base.css">
  <style>
    #chu{
      font-weight: bolder;
    }
    #tde{
      font-size: 40px;
      font-weight: bolder;
      text-align: center;
      font-family: 'Noto Sans', sans-serif;
    }
    .tieude{
      padding-top: 20px;
      padding: 10px;
    }
  </style>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../Admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../Admin/js/select.dataTables.min.css">
  <link rel="stylesheet" href="../assets/css/cap_TK.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../Admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/img/ayaya.ico" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../Admin/index.php"><i class="fa fa-university"></i><span id="chu">ATI</span></a>
        <a class="navbar-brand brand-logo-mini" href="../Admin/index.php"><i class="fa fa-university"></i></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../Admin/images/faces/ayaya.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="user_info.php" class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Information
              </a>
              <a href="logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- nội dung -->
    <div style="background-color: whitesmoke;" class="container-fluid page-body-wrapper">
      <!-- content -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-------------------------------------Điều chỉnh nội dung -------------------------------------->
        

      <!---------------------------------------------------------->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <!---------------------Thống kê------------------------------->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Bảng số liệu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Admin/thongke_solieu.php">Thống kê</a></li>
              </ul>
            </div>
          </li>
          <!--------------------Trang người dùng-------------------------------->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="confirm_func.php"> Quản lý tài khoản </a></li>
                <li class="nav-item"> <a class="nav-link" href="give_TK.php"> Cấp tài khoản </a></li>
              </ul>
            </div>
          </li>       
        </ul>
      </nav>
      <!------------------------------------------------>
      <div class="container">
        <div class="row">
          <div class="col-2"></div>
          <div class="col-7">
            <div class="tieude"><h2 id="tde">Cấp tài khoản QLTL</h2></div>
            <!--------------------------------------------------->
            <div class="">
                <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Form START -->
                    <form action="captk.php" method="POST">
                        <div class="row mb-5 gx-5">
                            <!-- Contact detail -->
                            <div class="col-xxl-8 mb-5 mb-xxl-0">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Username: </label>
                                            <input type="text" name="username" class="form-control" placeholder="(3-10 kí tự gồm chữ và số)" aria-label="username" value="">
                                        </div>
                                        <!-- Last name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Full name: </label>
                                            <input type="text" name="fullname" class="form-control" placeholder="(Không được bỏ trống)" aria-label="fullname" value="">
                                        </div>
                                        <!-- Phone number -->
                                        <div class="col-md-6">
                                            <label class="form-label">Phone number: </label>
                                            <input type="text" name="phone" class="form-control" placeholder="(10 số theo chuẩn Vietnam)" aria-label="phone" value="">
                                        </div>
                                        <!-- Mobile number -->
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email: </label>
                                            <input type="text" name="email" class="form-control" placeholder="(abc@xyz.cvb)" id="inputEmail4" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Password: </label>
                                            <input type="password" name="password" class="form-control" aria-label="password" value="123456" readonly>
                                        </div>
                                    </div> 
                                <!-- Row END -->
                                </div>
                            </div>
                        <!-- button -->
                        <div class="gap-3 d-md-flex justify-content-md-end text-center">
                            <button type="submit" name="cap" class="btn btn-primary btn-lg">Cấp tài khoản</button>
                        </div>
                    </form> <!-- Form END -->
                </div>
            </div>
            </div>
            </div>
          <!----------------------------------------------------->
          </div>
          <div class="col-3"></div>
        </div> 
      </div>
      <!--------------------------------------------------->
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../Admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../Admin/vendors/chart.js/Chart.min.js"></script>
  <script src="../Admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../Admin/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../Admin/js/off-canvas.js"></script>
  <script src="../Admin/js/hoverable-collapse.js"></script>
  <script src="../Admin/js/template.js"></script>
  <script src="../Admin/js/settings.js"></script>
  <script src="../Admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../Admin/js/dashboard.js"></script>
  <script src="../Admin/js/Chart.roundedBarCharts.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <!-- End custom js for this page-->
</body>
<?php
  }
  else
  {
    echo '<script>alert("Bạn không phải QTHT !")</script>';
    echo '<script>window.location.href="index.php"</script>';
  }
?>