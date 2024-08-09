<?php
    include('xacnhan.php');
    if($_SESSION['vt']=='QTHT')
    {
        include('../controller/admin_TK_con.php');
        $p= new cTK();
        $hien= $p->xem_chitiet($_GET['chitiet']);
        if(mysqli_num_rows($hien))
        {
            $row = mysqli_fetch_assoc($hien);
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/xemchitiet_admin.css">
    <style>
        #Ei{
            width: 100%;
            height: 50%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>ATI | User Profile</title>
    <link rel="shortcut icon" href="../assets/img/ayaya.ico" type="image/x-icon">
</head>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../assets/img/ayaya_happy.jpeg"><span class="font-weight-bold">Ayaya</span><span class="text-black-50">The security of your information is our responsibility</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">User profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" value="<?php echo $row['MaTK']; ?>" readonly></div>
                    <div class="col-md-6"><label class="labels">Fullname</label><input type="text" class="form-control" value="<?php echo $row['TenUser']; ?>" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" value="<?php echo $row['SĐT']; ?>" readonly></div>
                    <div class="col-md-12"><label class="labels">Email address</label><input type="text" class="form-control" value="<?php echo $row['Email']; ?>" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Vai trò</label><input type="text" class="form-control" value="<?php echo $row['MaVT']; ?>"readonly></div>
                    <div class="col-md-6"><label class="labels">Khu vực</label><input type="text" class="form-control" value="<?php echo $row['Khuvuc']; ?>"readonly></div>
                </div>
                <div class="mt-5 text-center"><a href="../view/confirm_func.php"><button class="btn btn-primary profile-button" type="button">Done !</button></a></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <img id="Ei" src="../assets/img/ayaka_vip.jpg" alt="adu vjp">
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
<?php
    }
    else
    {
        echo 'Không có quyền truy cập';
        header('location: index.php');
    }
?>    