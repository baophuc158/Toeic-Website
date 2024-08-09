<?php
include('../view/xacnhan.php');
if($_SESSION['vt']=='QTHT')
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ATI | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./css/calendar.css">
  <style>
    #chu{
      font-weight: bolder;
    }
  </style>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/img/ayaya.ico" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <script src="../assets/js/jquery.min.js"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><i class="fa fa-university"></i><span id="chu">ATI</span></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><i class="fa fa-university"></i></a>
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
              <img src="images/faces/ayaya.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="../view/user_info.php" class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Information
              </a>
              <a href="../view/logout.php" class="dropdown-item">
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
                <li class="nav-item"> <a class="nav-link" href="../view/confirm_func.php"> Quản lý tài khoản </a></li>
                <li class="nav-item"> <a class="nav-link" href="../view/give_TK.php"> Cấp tài khoản </a></li>
              </ul>
            </div>
          </li>       
        </ul>
      </nav>
      <!------------------------------------------------>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Biểu đồ tròn</h4>
                            <canvas id="graph"></canvas>
                        </div>
                        <script>
                            $(document).ready(function () {
                                showGraph();
                            });
                            function showGraph(){
                                    $.post("data.php",
                                    function (data){
                                        var labels = [];
                                        var result = [];
                                        for (var i in data) {
                                            labels.push(data[i].Khuvuc);
                                            result.push(data[i].number_HV);
                                        }
                                        var pie = $("#graph");
                                        var myChart = new Chart(pie, {
                                            type: 'pie',
                                            data: {
                                                labels: labels,
                                                datasets: [
                                                    {
                                                        data: result,
                                                        borderColor: ["rgba(217, 83, 79,1)","rgba(240, 173, 78, 1)","rgba(92, 184, 92, 1)"],
                                                        backgroundColor: ["rgba(217, 83, 79,0.2)","rgba(240, 173, 78, 0.2)","rgba(92, 184, 92, 0.2)"],
                                                    }
                                                ]
                                            },
                                            options: {
                                                title: {
                                                    display: true,
                                                    text: "Thống kê học viên theo vùng miền"
                                                }
                                            }
                                        });
                                    });
                            }
                        </script>
                    </div>                    
                </div>
                <div class="col-lg-6 right grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Biểu đồ cột</h4>
                            <canvas id="nutChart"></canvas>
                        </div>
                        <script>
                            $(document).ready(function () {
                                showNut();
                            });

                            function showNut(){
                            
                                $.post("data_QLTL.php",
                                    function (data){
                                        console.log(data);
                                        var formStatusVar = [];
                                        var total = []; 

                                        for (var i in data) {
                                            formStatusVar.push(data[i].Khuvuc);
                                            total.push(data[i].number_QLTL);
                                        }

                                        var options = {
                                            legend: {
                                                display: false
                                            },
                                            scales: {
                                                xAxes: [{
                                                    display: true
                                                }],
                                            yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }   
                                            
                                        };

                                        var myChart = {
                                            labels: formStatusVar,
                                            datasets: [
                                                {
                                                    label: 'Tổng số thành viên QLTL',
                                                    backgroundColor: '#17cbd1',
                                                    borderColor: '#46d5f1',
                                                    hoverBackgroundColor: '#0ec2b6',
                                                    hoverBorderColor: '#42f5ef',
                                                    data: total
                                                }
                                            ]
                                        };

                                        var bar = $("#nutChart"); 
                                        var barGraph = new Chart(bar, {
                                            type: 'bar',
                                            data: myChart,
                                            options: options
                                        });
                                    });
                            }
                        </script>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 right grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Biểu đồ Đường</h4>
                            <canvas id="lineChart"></canvas>
                        </div>
                        <script>
                            $(document).ready(function () {
                                showLine();
                            });
                            function showLine(){
                                    $.post("data_taikhoan.php",
                                    function (data){
                                        var labels = [];
                                        var result = [];
                                        for (var i in data) {
                                            labels.push(data[i].MaVT);
                                            result.push(data[i].amount_TK);
                                        }
                                        var line = $("#lineChart");
                                        var myChart = new Chart(line, {
                                            type: 'line',
                                            data: {
                                                labels: labels,
                                                datasets: [
                                                    {
                                                        data: result,
                                                        borderColor: ["rgba(217, 83, 79,1)","rgba(240, 173, 78, 1)","rgba(92, 184, 92, 1)"],
                                                        backgroundColor: ["rgba(217, 83, 79,0.2)","rgba(240, 173, 78, 0.2)","rgba(92, 184, 92, 0.2)"],
                                                    }
                                                ]
                                            },
                                            options: {
                                                title: {
                                                    display: true,
                                                    text: "Thống kê số lượng tài khoản theo vai trò"
                                                }
                                            }
                                        });
                                    });
                            }
                        </script>
                    </div>                    
                </div>
                <div class="col-lg-6 right grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Biểu đồ cột</h4>
                            <canvas id="bChart"></canvas>
                        </div>
                        <script>
                            $(document).ready(function () {
                                showbChart();
                            });
                            function showbChart(){
                                    $.post("data_part.php",
                                    function (data){
                                        var labels = [];
                                        var result = [];
                                        for (var i in data) {
                                            labels.push(data[i].MaPart);
                                            result.push(data[i].amount_Question);
                                        }
                                        var bar = $("#bChart");
                                        var myChart = new Chart(bar, {
                                            type: 'bar',
                                            data: {
                                                labels: labels,
                                                datasets: [
                                                    {
                                                        data: result,
                                                        borderColor: ["rgba(255,99,132,1)","rgba(54, 162, 235, 1)","rgba(255, 206, 86, 1)","rgba(75, 192, 192, 1)","rgba(153, 102, 255, 1)","rgba(255, 159, 64, 1)"],
                                                        backgroundColor: ["rgba(217, 83, 79,0.2)","rgba(153, 102, 255, 0.5)","rgba(92, 184, 92, 0.2)","rgba(255, 99, 132, 0.5)","rgba(54, 162, 235, 0.5)","rgba(255, 206, 86, 0.5)","rgba(75, 192, 192, 0.5)"],
                                                    }
                                                ]
                                            },
                                            options: {
                                                title: {
                                                    display: true,
                                                    text: "Thống kê số lượng câu hỏi hiện có theo từng Part"
                                                }
                                            }
                                        });
                                    });
                            }
                        </script>
                    </div>                    
                </div>
            </div>
        </div>   
      </div>
      <!--------------------------------------------------->
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="./vendors/chart.js/Chart.min.js"></script>
  <script src="./vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="./vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="./js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <!-- End custom js for this page-->
</body>

</html>
<?php
  }
  else
  {
    echo 'Không có quyền truy cập';
    header('location: ../view/index.php');
  }
?>

