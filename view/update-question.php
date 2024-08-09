<?php
    include('header.php');
    if($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
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
    <link rel="stylesheet" href="../assets/css/noidungon.css">
    <title>Cập nhật câu hỏi</title>
</head>
<body>
    <!-- Page breadcrumb -->
        <section id="mu-page-breadcrumb">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                <h2>Q&A List</h2>
                <ol class="breadcrumb">
                    <li><a href="gallery.php">Nội dung ôn</a></li>            
                    <li class="active">Cập nhật câu hỏi</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
        </section>
    <!-- End breadcrumb -->
    <div class="container">
        <div class="row">
          <div class="col-2"></div>
          <div class="col-7">
            <div class="tit">
                <h2>UPDATE QUESTION AND ANSWER</h2>
                <span style="color: red;">Muốn cập nhật file âm thanh, hình ảnh vui lòng liên hệ qua email quản trị viên!</span>
            </div>
            <form action="updatech.php" method="POST">
            <?php
                include('../controller/cch.php');
                $p = new cCH();
                $show = $p->rettq($_GET['id']);
                if(mysqli_num_rows($show) > 0)
                {
                  while($cot = mysqli_fetch_assoc($show))
                  {
                    ?>
                      <div class="form-group">
                        <label for="mach">Mã Câu hỏi:</label>
                        <input type="text" class="form-control" name="mach" id="mach" value="<?php echo $cot['MaCH']; ?>" readonly><hr>
                        <label for="mapart">Mã Part:</label>
                        <input type="text" class="form-control" name="mapart" id="mapart" value="<?php echo $cot['MaPart']; ?>" readonly><hr>
                        <label for="cauhoi">Câu hỏi:</label>
                        <?php
                            if($cot['MaPart'] != 'L1' && $cot['MaPart'] != 'L2')
                            {
                        ?>
                                <textarea id="cauhoi" name="cauhoi" class="form-control"><?php echo $cot['Cauhoi']; ?></textarea><hr>
                        <?php
                            }
                            else
                            {
                        ?>
                                <input type="text" class="form-control" name="cauhoi" id="cauhoi" value="<?php echo $cot['Cauhoi']; ?>" readonly><hr>
                        <?php
                            }
                        ?>
                        <label for="dapana">Đáp án A:</label>
                        <input type="text" class="form-control" name="dapana" id="dapana" value="<?php echo $cot['DapanA']; ?>"><hr>
                        <label for="dapanb">Đáp án B:</label>
                        <input type="text" class="form-control" name="dapanb" id="dapanb" value="<?php echo $cot['DapanB']; ?>"><hr>
                        <label for="dapanc">Đáp án C:</label>
                        <input type="text" class="form-control" name="dapanc" id="dapanc" value="<?php echo $cot['DapanC']; ?>"><hr>
                        <?php
                            if($cot['MaPart'] != 'L2')
                            {
                        ?>
                                <label for="dapand">Đáp án D:</label>
                                <input type="text" class="form-control" name="dapand" id="dapand" value="<?php echo $cot['DapanD']; ?>"><hr>
                        <?php
                            }
                            else
                            {
                        ?>
                                <input type="hidden" class="form-control" name="dapand" id="dapand" value="<?php echo $cot['DapanD']; ?>">
                        <?php
                            }
                        ?>
                        <label for="dapandung">Đáp án đúng:</label>
                        <input type="text" class="form-control" name="dapandung" id="dapandung" value="<?php echo $cot['DapanDung']; ?>">
                        <label for="script">Script:</label>
                        <input type="text" class="form-control" name="script" id="script" value="<?php echo $cot['script']; ?>">
                        <label for="malt">Mã lộ trình:</label>
                        <input type="text" class="form-control" name="malt" id="malt" value="<?php echo $cot['route_level']; ?>"><hr>
                        <label for="madv">Mã đoạn văn:</label>
                        <input type="text" class="form-control" name="madv" id="madv" value="<?php echo $cot['MaDV']; ?>" readonly><hr>
                        <label for="hinhanh">Hình ảnh:</label>
                        <?php
                            if($cot['Hinh'] == '' || $cot['Hinh'] == 'null')
                            {
                                echo '<br>Trống<br>';
                            }
                            else
                            {
                        ?>
                                <input type="text" class="form-control" name="hinhanh" id="hinhanh" value="<?php echo $cot['Hinh']; ?>" readonly>
                        <?php
                            }
                        ?>
                      </div>
            <?php
                  }
                }
            ?>
            <button type="submit" class="btn btn-primary btn-block" name="updatech">Cập nhật câu hỏi</button>
            </form>
        </div>
          <!----------------------------------------------------->
          <div class="col-3"></div>
        </div> 
      </div>
    <!------------------------------------------------------->
<?php
    }
    include('footer.php');
?>
</body>
</html>