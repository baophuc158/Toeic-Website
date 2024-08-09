<?php
    include("header.php");
    if($_SESSION['vt']=='QLTL')
    {
        include('../controller/clt.php');
        $p= new cLT();
        $malt=$p->relt($_GET['MaLT']);
        $c=mysqli_num_rows($malt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/igk5mcyc81tqdsoyrj1dlzsyluktbdszeav0m4vpqudchgt1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#dexuat'
      });
    </script>
    <title>ATI | Cập nhật lộ trình</title>
</head>
<body>
    <section id="mu-page-breadcrumb">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="mu-page-breadcrumb-area">
                <h2>Cập nhật lộ trình</h2>
                <ol class="breadcrumb">
                <li><a href="course.php">Lộ trình</a></li>            
                <li class="active">Cập nhật lộ trình</li>
            </ol>
            </div>
            </div>
        </div>
        </div>
    </section> 
    <form action="uplt.php" method="POST">
        <div class="container form-group">
            <?php
                if($c>0)
                {
                    while($row=mysqli_fetch_assoc($malt))
                    {
            ?>
            <div class="form-group col-md-6">
                <label for="malt">Mã lộ trình: </label>
                <input type="text" class="form-control" name="malt" id="malt" value="<?php echo $_GET['MaLT']; ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="tenlt">Tên lộ trình: </label>
                <input type="text" class="form-control" name="tenlt" id="tenlt" value="<?php echo $row['TenLT']; ?>" readonly>
            </div>
            
            
            <div class="form-group col-md-12">
                <label for="">Thời gian: </label>
                <select name="thoigian" id="thoigian" class="form-control">
                    <option value="none">Chọn...</option>
                    <option value="30">1 tháng</option>
                    <option value="60">2 tháng</option>
                    <option value="90">3 tháng</option>
                    <option value="120">4 tháng</option>
                    <option value="150">5 tháng</option>
                    <option value="180">6 tháng</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                Đề xuất: <textarea class="form-control" id="dexuat" name="dexuat" rows="10" cols="50"><?php echo $row['Dexuat']; ?></textarea><br>
                <?php        
                    }
                }
            ?>
                <button type="submit" name="up" id="up" class="btn btn-primary btn-block">Cập nhật</button>
            </div>
        </div>
    </form>
<?php
    }
    elseif($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    elseif($_SESSION['vt']=='HV')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
    include("footer.php");
?>
</body>
</html>