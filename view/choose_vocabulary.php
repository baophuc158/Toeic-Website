<?php
include('header.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATI | Ngữ pháp</title>
    <link rel="stylesheet" href="../assets/css/practice/choose.css">
    <style type="text/css">

    </style>
</head>

<body>
    <div id="" class="container">
        <div class="row">
            <h2 style="text-align: center;">HỌC TỪ VỰNG</h2>
            <div class="col-md-2"></div>
            <div id="grammar-select" class="col-md-8">
                <?php 
                    include('../controller/cTopic.php');
                    $p=new cTopic();
                    $hien = $p->xem_chude();
                    while($row = mysqli_fetch_assoc($hien)){                   
                ?>
                <div id="left" class="col-lg-4 col-md-6 col-sm-12">
                    <div class="grammar_item"><a
                            href="practice_vocabulary.php?id=<?php echo $row['ID_topic']; ?>&topic=<?php echo $row['Topic']; ?>">
                            <p><?php echo $row['Topic']; ?></p>
                        </a></div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php
                if($_SESSION['vt'] == 'QLTL')
                {
            ?>
                    <a style="padding:10px;float:right;" href="them_tu_vung.php"><button class="btn btn-primary">Thêm câu hỏi</button></a>
            <?php
                }
            ?>
            <div class="col-2"></div>
        </div>
    </div>
</body>
<?php
include('footer.php')
?>

</html>