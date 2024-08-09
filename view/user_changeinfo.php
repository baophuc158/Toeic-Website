<?php
    include('xacnhan.php');
    if($_SESSION['vt']=='HV')
    {
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
            <form action="upinfo.php" method="post">
            <?php
                if($result>0)
                {
                    while($row=mysqli_fetch_assoc($tt))
                    {
            ?>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="fname">Full Name</label>
                                <input name="fname" type="text" class="bg-light form-control" value="<?php echo $row['TenUser']; ?>">
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="username">Username</label>
                                <input name="username" type="text" class="bg-light form-control" value="<?php echo $_SESSION['ID']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="sdt">Phone Number</label>
                                <input name="sdt" type="text" class="bg-light form-control" value="<?php echo $row['SĐT']; ?>" >
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="khuvuc">Region</label>
                                <select class="bg-light form-control" name="khuvuc" id="khuvuc">
                                    <option value="none">Choose...</option>
                                    <option value="miennam">Southside</option>
                                    <option value="mientrung">Center</option>
                                    <option value="mienbac">Northside</option>
                                </select>
                            </div>
                        </div>
            <?php
                    }
                }
                else
                {
                    echo 'Không có dữ liệu!';
                }
            ?>   
                <div class="py-3 pb-4 ">
                    <button name="luu" type="submit" class="btn btn-primary mr-3">Lưu thông tin</button></a>
                    <a href="user_info.php"><button type="button" class="btn border button">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
    }
    elseif($_SESSION['vt']=='QTHT')
    {
        echo 'Không có quyền truy cập';
        header('location:../Admin/index.php');
    }
    else
    {
        echo 'Không có quyền truy cập';
        header('location:index.php');
    }
?>