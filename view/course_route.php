<?php
    include('header.php');
    if($_SESSION['vt']=='HV')
    {
?>
    <title>ATI | Route</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>
        #route li{
            border: 1px solid black;
            border-radius: 10px;
            background-color: aliceblue;
            padding: 20px;
            margin-bottom: 20px;
            font-size: 17px;
            margin-top: 20px;
            cursor: pointer;
        }
        #route li:hover{
            background-color: whitesmoke;
        }
        #nen{
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            border-radius: 5px;    
        }
        #countdown{
            text-align: center;
            border: 2px solid black;
            border-radius: 20px;
            font-size: 24px;
            font-weight: bolder;
            background-color: #f0f0f0;
            padding: 10px;
            color: red;
        }
        #huy{
            text-align: center;
            padding-bottom: 15px;
        }
        #cancel{
            font-size: 16px;
            font-weight: bolder;
        }
    </style>

<body>
    <main>
        <div class="row">
            <div id="nen" class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 border" style="border-width: 2px; border-style: solid; background-color: hsla; border-radius: 10px;">
                    <h2 style="text-align: center; padding: 10px;">LỘ TRÌNH ĐANG HỌC <?php echo $_GET['route'] ?></h2>
                <form action="" method="POST">
                    <div style="text-align: center;" id="countdown">Bạn chưa đăng ký lộ trình nào !!!</div><br>
                    <?php
                        include('../controller/clt.php');
                        $p= new cLT();
                        $hien = $p->time_hienthi($_GET['user']);
                        while($row = mysqli_fetch_assoc($hien))
                        {
                            if($_GET['user'] == $_SESSION['ID'])
                            {
                                // Lấy ngày kết thúc từ CSDL
                                $dateEnd = $row['date_end'];
                                
                                // Tính thời gian còn lại
                                //$now = time(); // timestamp của thời điểm hiện tại
                                ////$diff = strtotime($dateEnd) - $now; // tính số giây còn lại
                                //$days = floor($diff / (60 * 60 * 24)); // chuyển đổi số giây thành số ngày và làm tròn xuống
                                //$hours = floor(($diff - $days * 60 * 60 * 24) / (60 * 60)); // tính số giờ còn lại sau khi đã tính được số ngày
                                //$minutes = floor(($diff - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60); // tính số phút còn lại sau khi đã tính được số ngày và số giờ
                                
                                // Hiển thị thời gian còn lại
                                echo '<span style="text-align: center;"><b>Ngày bắt đầu</b></span>'. ' ' .$row['date_begin'];
                                echo '</br>';
                                echo '<span style="text-align: center;"><b>Ngày kết thúc</b></span>'. ' ' .$dateEnd;
                                echo '</br>';
                                $goal = $row['route_name'];
                                if($row['result'])
                                {
                                    if($row['route_name'] == '900')
                                    {
                                        ?>
                                            <div class="goal">
                                                <span style="color: red;"><b>Mục tiêu cần đạt</b></span>: <?php echo $goal; ?> TOEIC
                                            </div>
                                            <div class="result_review">
                                                <span style="color: blue;"><b>Kết quả bài REVIEW Test gần nhất:</b></span> <span><b><?php echo $row['result']; ?></b></span>/<span><b style="color: red"><?php echo $goal; ?></b></span>
                                            </div>
                                        <?php
                                    }
                                    else if($row['route_name'] == '800')
                                    {
                                        ?>
                                            <div class="goal">
                                                <span style="color: red;"><b>Mục tiêu cần đạt</b></span>: <?php echo $goal; ?> TOEIC
                                            </div>
                                            <div class="result_review">
                                                <span style="color: blue;"><b>Kết quả bài REVIEW Test gần nhất:</b></span> <span><b><?php echo $row['result']; ?></b></span>/<span><b style="color: red"><?php echo $goal; ?></b></span>
                                            </div>
                                        <?php
                                    }
                                    else if($row['route_name'] == '700')
                                    {
                                        ?>
                                            <div class="goal">
                                                <span style="color: red;"><b>Mục tiêu cần đạt</b></span>: <?php echo $goal; ?> TOEIC
                                            </div>
                                            <div class="result_review">
                                                <span style="color: blue;"><b>Kết quả bài REVIEW Test gần nhất:</b></span> <span><b><?php echo $row['result']; ?></b></span>/<span><b style="color: red"><?php echo $goal; ?></b></span>
                                            </div>
                                        <?php
                                    }
                                    else if($row['route_name'] == '600')
                                    {
                                        ?>
                                            <div class="goal">
                                                <span style="color: red;"><b>Mục tiêu cần đạt</b></span>: <?php echo $goal; ?> TOEIC
                                            </div>
                                            <div class="result_review">
                                                <span style="color: blue;"><b>Kết quả bài REVIEW Test gần nhất:</b></span> <span><b><?php echo $row['result']; ?></b></span>/<span><b style="color: red"><?php echo $goal; ?></b></span>
                                            </div>
                                        <?php
                                    }
                                    else if($row['route_name'] == '500')
                                    {
                                        ?>
                                            <div class="goal">
                                                <span style="color: red;"><b>Mục tiêu cần đạt</b></span>: <?php echo $goal; ?> TOEIC
                                            </div>
                                            <div class="result_review">
                                                <span style="color: blue;"><b>Kết quả bài REVIEW Test gần nhất:</b></span> <span><b><?php echo $row['result']; ?></b></span>/<span><b style="color: red"><?php echo $goal; ?></b></span>
                                            </div>
                                        <?php
                                    }
                                    else if($row['route_name'] == '400')
                                    {
                                        ?>
                                            <div class="goal">
                                                <span style="color: red;"><b>Mục tiêu cần đạt</b></span>: <?php echo $goal; ?> TOEIC
                                            </div>
                                            <div class="result_review">
                                                <span style="color: blue;"><b>Kết quả bài REVIEW Test gần nhất:</b></span> <span><b><?php echo $row['result']; ?></b></span>/<span><b style="color: red"><?php echo $goal; ?></b></span>
                                            </div>
                                        <?php
                                    }
                                    $result = $row['result'];
                                }
                                else
                                {
                                    $result = 0;
                                }
                                //echo '<span style="text-align: center;"><b>Thời gian còn lại</b></span>'. ' ' .$days.' ngày '.$hours.' giờ '.$minutes.' phút';
                                ?>
                                    <script>
                                        // Lấy thời gian hiện tại và thời gian kết thúc
                                        var now = new Date();
                                        var end = new Date("<?php echo $row['date_end']; ?>");
                                        
                                        // Tính khoảng thời gian còn lại
                                        var diff = end.getTime() - now.getTime();
                                        
                                        // Tính số ngày, giờ, phút và giây còn lại
                                        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
                                        var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((diff % (1000 * 60)) / 1000);
                                        //var AM_PM = "AM";
                                        
                                        // Hiển thị đồng hồ đếm ngược
                                        var countdownElement = document.getElementById("countdown");
                                        /*if(hours > 12)
                                        {
                                            hours = hours - 12;
                                            AM_PM = "PM";
                                        }
                                        if(hours == 0)
                                        {
                                            hours = 12;
                                            AM_PM = "AM";
                                        }*/
                                        countdownElement.innerHTML = '<i class="fa-solid fa-clock fa-beat-fade"></i> ' + days + ' ngày ' + hours + ' giờ ' + minutes + ' phút ' + seconds + ' giây';
                                        
                                        // Cập nhật đồng hồ đếm ngược mỗi giây
                                        var countdownInterval = setInterval(function() {
                                          // Lấy thời gian hiện tại và tính lại khoảng thời gian còn lại
                                          var now = new Date();
                                          var diff = end.getTime() - now.getTime();
                                        
                                          // Nếu đã hết thời gian, dừng đồng hồ đếm ngược
                                          if (diff <= 0) {
                                            clearInterval(countdownInterval);
                                            countdownElement.innerHTML = "Đã hết thời gian!";
                                            document.querySelector('#ending').click();
                                            return;
                                          }
                                        
                                          // Tính lại số ngày, giờ, phút và giây còn lại
                                          var days = Math.floor(diff / (1000 * 60 * 60 * 24));
                                          var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                          var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                                          var seconds = Math.floor((diff % (1000 * 60)) / 1000);
                                        
                                          // Hiển thị lại đồng hồ đếm ngược
                                        countdownElement.innerHTML = '<i class="fa-solid fa-clock fa-beat-fade"></i> ' + days + ' ngày ' + hours + ' giờ ' + minutes + ' phút ' + seconds + ' giây';
                                        }, 1000);
                                    </script>
                                <?php
                            }
                        }
                    ?>
                    <?php                      
                        $route_name = $_GET['route'];
                    ?>
                    <div class="row">
                        <div style="font-weight: bolder;" class="col-xs-12 col-md-6 border text-center">
                            <ul id="route">
                                <li><a href="course_route_practice.php?route=<?php echo $route_name;  ?>&practice=L1">PART 1</a></li>
                                <li><a href="course_route_practice.php?route=<?php echo $route_name;  ?>&practice=L3">PART 3</a></li>
                                <li><a href="course_route_reading.php?route=<?php echo $route_name;  ?>&practice=R5">PART 5</a></li>
                                <li><a href="course_route_reading.php?route=<?php echo $route_name;  ?>&practice=R7">PART 7</a></li>
                            </ul>
                        </div>
                        <div style="font-weight: bolder;" class="col-xs-12 col-md-6 border text-center">
                            <ul id="route">
                                <li><a href="course_route_practice.php?route=<?php echo $route_name;  ?>&practice=L2">PART 2</a></li>
                                <li><a href="course_route_practice.php?route=<?php echo $route_name;  ?>&practice=L4">PART 4</a></li>
                                <li><a href="course_route_reading.php?route=<?php echo $route_name;  ?>&practice=R6">PART 6</a></li>
                                <li><a href="course_route_review.php?route=<?php echo $route_name;  ?>&practice=REVIEW">REVIEW</a></li>
                            </ul>
                    </div>
                    <div id="huy">
                        <button id="cancel" name="cancel" type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn kết thúc lộ trình?')">Kết thúc lộ trình</button>
                        <button style="display: none;" id="ending" name="ending" type="submit" class="btn btn-block">end</button>
                    </div>
                    <?php
                        if(isset($_POST['cancel']) || isset($_POST['ending']))
                        {
                            include_once('../controller/cLT_user.php');
                            $pointer = new cLT_user();
                            $minz = $pointer->capnhat_LT_nguoidung_user_info($_SESSION['ID']);
                            $mahv = $_SESSION['ID'];
                            $malt = $_GET['route'];
                            $got = $p->capnhat_lotrinh_user($malt, $mahv, $goal, $result);
                            if($got && $minz)
                            {
                                echo "<script>alert('Đã kết thúc lộ trình')</script>";
                                echo '<script>window.location.href="course.php"</script>';
                            }
                            else
                            {
                                echo "<script>alert('Lỗi kết thúc lộ trình')</script>";
                            }
                        }
                    ?>
                </div>
                </form>
            </div>
        </div>
        <p><br></p>
    </main>
</body>

<?php
  }
  elseif($_SESSION['vt']=='QTHT')
  {
    echo '<script>alert("Bạn không phải học viên !")</script>';
    echo '<script>window.location.href="../Admin/index.php"</script>';
  }
  else
  {
    echo '<script>alert("Bạn không phải học viên !")</script>';
    echo '<script>window.location.href="index.php"</script>';
  }
    include('footer.php');
?>