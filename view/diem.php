<?php
    include('xacnhan.php');
    include('../controller/ctt.php');
    $p= new ctt();
    $tt=$p->rediem($_SESSION['ID']);
    $result=mysqli_num_rows($tt);
    if($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    elseif($_SESSION['vt']=='QLTL')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
    else
    {
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
    <title>Student's Test Result</title>
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
        <h4 class="pb-4 border-bottom">Exams Result</h4>
        <div class="d-flex align-items-start py-3 border-bottom">
            <img src="../assets/img/ayaya_student.jpeg" class="img" alt="">
            <div class="pl-sm-4 pl-2" id="img-section">
                <quote><q><i>Live as if you were to die tomorrow. Learn as if you were to live forever.</i></q></quote><br>
                <p style="text-align: right; font-size: 18px;">- Mahatma Ghandi -</p>
            </div>
        </div>
        <div class="py-2">
                        <div class="">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>    
                                        <th scope="col">ID Test</th>
                                        <th scope="col">Listening</th>
                                        <th scope="col">Reading</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($result>0)
                                        {
                                            $dem=0;
                                            while($row=mysqli_fetch_assoc($tt))
                                            {
                                                $dem++;
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $dem;?></td>
                                        <td scope="row"><?php echo $row['MaDe'];?></td>
                                        <td scope="row"><?php echo $row['DiemL'];?>/445</td>
                                        <td scope="row"><?php echo $row['DiemR'];?>/445</td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                        else
                                        {
                                            echo 'Không có dữ liệu!';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
            <div class="py-3 pb-4 ">
            <!-- Nut quay ve trang chu -->
                <a href="index.php"><button type="button" class="btn btn-primary">Về trang chủ</button></a>
            </div> 
        </div>
    </div>
</body>

</html>
<?php
    }
?>