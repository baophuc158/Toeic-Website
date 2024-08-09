<?php
    include_once('header.php');
    if($_SESSION['vt'] == 'QLTL')
    {
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATI | Thêm từ vựng</title>
    <style>
        .my-form {
            border: 1ps solid black !important;
            padding: 20px;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 my-form">
                    <h3 style="text-align: center;">Adding Vocabulary</h3>
                    <form action="upload_img.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="ID_vocabulary">ID: </label>
                            <input type="text" class="form-control" name="ID_vocabulary" id="ID_vocabulary">
                        </div>
                        <div class="form-group">
                            <label for="tu_vung">Từ vựng: </label>
                            <input type="text" class="form-control" name="tu_vung" id="tu_vung">
                        </div>
                        <div class="form-group">
                            <label for="topic">Chủ đề: </label>
                            <select class="form-control" name="topic" id="topic">
                                <option value="">...</option>
                                <?php
                                include_once('../controller/cVocabulary.php');
                                $p=new cVocabulary();
                                $hien= $p->them_tuvung();
                                while($row = mysqli_fetch_assoc($hien)){
                                    ?>
                                <option value="<?php echo $row['ID_topic']; ?>"><?php echo $row['Topic']; ?></option>
                                <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phien_am">Phiên âm: </label>
                            <input type="text" class="form-control" name="phien_am" id="phien_am">
                        </div>
                        <div class="form-group">
                            <label for="mo_ta">Ý nghĩa: </label>
                            <input type="text" class="form-control" name="mota" id="mo_ta">
                        </div>
                        <div class="form-group">
                            <label for="vi_du">Ví dụ: </label>
                            <input type="text" class="form-control" name="vi_du" id="vi_du">
                        </div>
                        <div class="form-group">
                            <label for="am_thanh">Tải file âm thanh: </label>
                            <input type="file" class="form-control" name="am_thanh" id="am_thanh">
                        </div>
                        <div class="form-group">
                            <label for="hinh_anh">Tải file hình ảnh: </label>
                            <input type="file" class="form-control" name="hinh_anh" id="hinh_anh">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" name="add_vocab" id="add_vocab" type="submit">Thêm từ vựng</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php
    }
    elseif($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    else
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
    include_once('footer.php');
?>
</body>
</html>