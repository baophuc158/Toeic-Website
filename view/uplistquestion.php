<?php

use function Composer\Autoload\includeFile;

    include ('header.php');
    if($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không phải QLTL !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    elseif($_SESSION['vt']=='QLTL')
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATI | Add List Question</title>
    <style>
        body button {
            color: black;
            margin-top: 5px;
        }
        
        h2{
            color:red;
        }
        .khung{
            
        }
        .col-md-8{
            padding: 20px;
            margin: 10px;
            border: 1px solid black;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 1rem 1rem -0.5rem rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>
    <section id="mu-page-breadcrumb">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="mu-page-breadcrumb-area">
                <h2>Thêm câu hỏi</h2>
                <ol class="breadcrumb">
                <li><a href="gallery.php">Nội dung ôn</a></li>            
                <li class="active">Thêm câu hỏi</li>
            </ol>
            </div>
            </div>
        </div>
        </div>
    </section> 
    <div id="khung" class="container">
        <div class="row">
        <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2 style="text-align: center;">Thêm danh sách câu hỏi</h2>
        <h4><b><a href="../assets/file/mau.xlsx" style="color: blue;">VUI LÒNG TẢI FILE MẪU<u> TẠI ĐÂY </u>ĐỂ THAM KHẢO NHẬP DANH SÁCH</a></b></h4><br />
        <b><span class="title" style="color: red;"><u>LƯU Ý:</u> KHÔNG CHỈNH SỬA ĐỊNH DẠNG FILE MẪU ĐỂ TRÁNH GÂY LỖI KHI NHẬP DỮ LIỆU</span></b><br><br>

        <form style="padding-bottom: 10px;" action="up-cauhoi-list.php" method="POST" enctype="multipart/form-data">
            <label for="myfile">Chọn tập tin: </label>
            <input class="bg-info" type="file" name="file" id="file" accept=".xls,.xlsx">
            <button type="submit" id="btngui" name="btngui" class="btn btn-info btn-block">Gửi</button>           
        </form>
    </div>
    <div class="col-md-2"></div>
        </div>
    </div>
    <?php
    }
    else
    {
        echo '<script>alert("Bạn không phải QLTL !")</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
        include('footer.php');
    ?>
</body>
</html>