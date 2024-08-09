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
    <title>Ôn TOEIC Part 1</title>
</head>
<body>
    <!-- Page breadcrumb -->
        <section id="mu-page-breadcrumb">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                <h2>Listening Part 1</h2>
                <ol class="breadcrumb">
                    <li><a href="gallery.php">Nội dung ôn</a></li>            
                    <li class="active">Listening Part 1</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
        </section>
    <!-- End breadcrumb -->
    <div class="tit"><h2>LUYỆN NGHE TOEIC PART 1</h2></div>
    <div id="khung" class="trai">
        <div id="nen_trai" class="row">
                <div class="practice-name">PART 1: PHOTOS
                <?php
                    if($_SESSION['vt']=='QLTL')
                    {
                ?>
                        <a style="padding:10px;float:right;" href="them_ch_L1.php"><button class="btn btn-primary">Thêm câu hỏi</button></a>
                        <a style="padding:10px;float:right;" href="xemDSCH.php?Part=L1"><button class="btn btn-primary">Xem DS câu hỏi</button></a>
                <?php
                    }
                ?>
                </div>
            <div class="trai">
                <div class="form-control">
                    <div class="ds">
                        <div class="ten_test"><a href="Test1_L1.php">Test 1</a></div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="ds">
                        <div class="ten_test"><a href="Test1_L1.php">Test 2</a></div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="ds">
                        <div class="ten_test"><a href="Test1_L1.php">Test 3</a></div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="ds">
                        <div class="ten_test"><a href="Test1_L1.php">Test 4</a></div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="ds">
                        <div class="ten_test"><a href="Test1_L1.php">Test 5</a></div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="ds">
                        <div class="ten_test"><a href="Test1_L1.php">Test 6</a></div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="ds">
                        <div class="ten_test"><a href="Test1_L1.php">Test 7</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="nen_phai" class="row phai">
        <div class="diff">OTHER PRACTICES</div>
            <div class="other">
                <div class="form-control">
                    <a href="L1.php">Part 1: Photos</a>
                </div>
                <div class="form-control">
                    <a href="L2.php">Part 2: Question Response</a>
                </div>
                <div class="form-control">
                    <a href="L3.php">Part 3: Conversations</a>
                </div>
                <div class="form-control">
                    <a href="L4.php">Part 4: Short Talks</a>
                </div>
                <div class="form-control">
                    <a href="R5.php">Part 5: Incompletes Sentences</a>
                </div>
                <div class="form-control">
                    <a href="R6.php">Part 6: Text Completion</a>
                </div>
                <div class="form-control">
                    <a href="R7.php">Part 7: Passages</a>
                </div>
            </div>
    </div>
    <!------------------------------------------------------->
<?php
    }
    include('footer.php');
?>
</body>
</html>