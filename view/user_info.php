<?php
    include('xacnhan.php');
    include('../controller/ctt.php');
    $p= new ctt();
    $tt=$p->rehientt($_SESSION['ID']);
    $result=mysqli_num_rows($tt);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/ayaya.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css//user_info.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>User Information</title>
    <style>
        body{
            background-color: azure;
        }
    </style>
</head>

<body>
    <!-- Page breadcrumb -->
        
    <!-- End breadcrumb -->
    <div id="baoquat" class="wrapper bg-white mt-sm-5">
        <h4 class="pb-4 border-bottom">Account settings</h4>
        <div class="d-flex align-items-start py-3 border-bottom">
            <img src="../assets/img/ayaya_student.jpeg" class="img" alt="">
            <div class="pl-sm-4 pl-2" id="img-section">
                <p>Roses are red</p>
                <p>Violets are blue</p>
                <p>I don't sleep at night</p>
                <p>Cause I'm thinking of you</p>
            </div>
        </div>
        <div class="py-2">
            <?php
                if($result>0)
                {
                    while($row=mysqli_fetch_assoc($tt))
                    {
            ?>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="firstname">Username</label>
                                <input type="text" class="bg-light form-control" value="<?php echo $_SESSION['ID']; ?>" readonly>
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="lastname">Full Name</label>
                                <input type="text" class="bg-light form-control" value="<?php echo $row['TenUser']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="email">Email Address</label>
                                <input type="text" class="bg-light form-control" value="<?php echo $row['Email']; ?>" readonly>
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="bg-light form-control" value="<?php echo $row['SĐT']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="role">Role</label>
                                <input type="text" class="bg-light form-control" value="<?php echo $row['MaVT']; ?>" readonly>
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3" id="lang">
                                <label for="khuvuc">Region</label>
                                <input type="text" class="bg-light form-control" value="<?php echo $row['Khuvuc']; ?>" readonly>
                            </div>
                        </div>
                        <div class="py-3 pb-4 ">
                            <?php
                            
                                //Nut cap nhat thong tin
                                if($row['MaVT']=='HV')
                                {
                            ?>      
                                    <label for="khuvuc">Lộ trình đã chọn</label>
                                    <input type="text" class="bg-light form-control" value="<?php echo $row['MaLT']; ?>" readonly><br>
                                    <a href="user_changeinfo.php"><button type="button" class="btn btn-primary mr-3">Cập nhật thông tin</button></a>
                            <?php
                                }

                                // Nut quay ve trang chu
                                if($row['MaVT']=='QTHT')
                                {
                            ?>
                                    <a href="../Admin/index.php"><button type="button" class="btn border button">Về trang chủ</button></a>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <a href="index.php"><button type="button" class="btn border button">Về trang chủ</button></a>        
                            <?php
                                }
                            ?>
            <?php
                    }
                }
                else
                {
                    echo 'Không có dữ liệu!';
                }
            ?>
                        </div>   
        </div>
    </div>
</body>

</html>