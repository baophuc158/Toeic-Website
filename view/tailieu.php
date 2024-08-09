<?php
    include('header.php');
    if($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    else
    {
        include('../controller/cTaiLieu.php');
        $p= new cTaiLieu();
        $hien = $p->xem_TL();
        
        if(mysqli_num_rows($hien) > 0)
        {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATI | Document</title>
    <style>
        #add_documentLabel{
            text-align: center;
            font-family: 'ubuntu', 'san-serif';
            font-weight: bold;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <!-- Page breadcrumb -->
    <section id="mu-page-breadcrumb">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="mu-page-breadcrumb-area">
                <h2>Tài liệu</h2>
                <ol class="breadcrumb">
                <li><a href="index.php">Trang chủ</a></li>            
                <li class="active">Tài liệu</li>
            </ol>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End breadcrumb -->
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
            <table class="table">
                    <caption><h2 style="text-align: center;">Tài liệu TOEIC</h2></caption>
                        <thead>
                            <tr>
                                <th>Mã tài liệu</th>
                                <th>Mô tả tài liệu</th>
                                <th>Tệp</th>
                                <th>Người đăng</th>
                                <th colspan=2>Tùy chọn</th>
                            </tr>
                        </thead>
                <form action="" method="post">
                    <?php
                            while($row=mysqli_fetch_assoc($hien))
                            {
                    ?>
                                <tbody>
                                    <tr>
                                    <?php
                                        if($_SESSION['vt']=='HV')
                                        {
                                    ?>
                                            <td><?php echo $row['MaTL']; ?></a></td>
                                            <td><?php echo $row['NDTL']; ?></a></td>
                                            <td><?php echo $row['upTL']; ?></a></td>
                                            <td><?php echo $row['TenUser']; ?></a></td>
                                            <td><a href="../assets/document/<?php echo $row['upTL']; ?>" target="_blank"><button class="btn btn-success" type="button">Tải về</button></a></td>
                                    <?php
                                        }
                                        elseif($_SESSION['vt']=='QLTL')
                                        {
                                    ?>
                                            <td><a href="tailieu.php?MaTL=<?php echo $row['MaTL']; ?>"><?php echo $row['MaTL']; ?></a></td>
                                            <td><a href="tailieu.php?MaTL=<?php echo $row['MaTL']; ?>"><?php echo $row['NDTL']; ?></a></td>
                                            <td><a href="tailieu.php?MaTL=<?php echo $row['MaTL']; ?>"><?php echo $row['upTL']; ?></a></td>
                                            <td><a href="tailieu.php?MaTL=<?php echo $row['MaTL']; ?>"><?php echo $row['TenUser']; ?></a></td>
                                            <td><a href="../assets/document/<?php echo $row['upTL']; ?>" target="_blank"><button class="btn btn-success" type="button">Tải về</button></a></td>
                                            <td><button class="btn btn-danger" name="xoa" id="xoa" type="submit">Xóa</button></td>
                                    <?php

                                        }
                                    ?>
                                    </tr>
                                </tbody> 
                    <?php
                            }
                            if(isset($_POST['xoa']))
                            {
                                $stt = $_GET['MaTL'];
                                if($stt!='')
                                {
                                    $xoa = $p->xoa_TL($stt);
                                    if($xoa)
                                    {
                                        echo '<script>alert("Xóa thành công !")</script>';
                                        echo '<script>window.location.href="tailieu.php"</script>';
                                    }
                                    else
                                    {
                                        echo '<script>alert("Xóa không thành công !")</script>';
                                        echo '<script>window.location.href="tailieu.php"</script>';
                                    }
                                }
                                else
                                {
                                    echo '<script>alert("Vui lòng click vào tên file sau đó bấm xóa!")</script>';
                                    echo '<script>window.location.href="tailieu.php"</script>';
                                }
                            }
                    ?>
                </form>
                
            </table>
                <!------------------------Modal thêm tài liệu--------------------------------------->
                <!-- Button trigger modal -->
                <?php  
                    } 
                    else
                    {
                        echo 'Không có dữ liệu';
                    }
                    if($_SESSION['vt']=='QLTL')
                    {   ?>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_document">
                            Thêm tài liệu
                            </button>
                        <?php
                    }
                ?>

                <form action="clstailieu.php" method="post" enctype="multipart/form-data">
                    <!-- Modal -->
                <div class="modal fade" id="add_document" tabindex="-1" role="dialog" aria-labelledby="add_documentLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="add_documentLabel">Thêm tài liệu Toeic</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="clstailieu.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="stt">Mã tài liệu: </label>
                                    <input type="text" class="form-control" name="stt" id="stt">
                                </div>
                                <div class="form-group">
                                    <label for="des_doc">Mô tả tài liệu: </label>
                                    <input type="text" class="form-control" name="des_doc" id="des_doc">
                                </div>
                                <div class="form-group">
                                    <label for="acc_qltl">Upload tài liệu: </label>
                                    <input type="file" class="form-control" name="tailieu" id="tailieu">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="acc_qltl" id="acc_qltl" value="<?php echo $_SESSION['ID']; ?>" readonly>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" id="upload" name="upload">Lưu những thay đổi</button>
                        </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-------------------------end modal------------------------------------------------->
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
<?php
    }
    include('footer.php');
?>
</body>
</html>