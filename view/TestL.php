<?php
  include('header.php');
  include('../controller/cTest.php');
  $p=new cTest();
  if($_SESSION['vt']=='HV')
  {
    $MaDe = $_GET['test'];
    $paraL = $p->reParaL($MaDe);
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $questionsPerPage = 1; // Số câu hỏi trên mỗi trang
    $totalPages = ceil(count($paraL) / $questionsPerPage);
    
    // Lấy câu hỏi cho trang hiện tại
    $startIndex = ($page - 1) * $questionsPerPage;
    $questions = array_slice($paraL, $startIndex, $questionsPerPage);
    // Thiết lập thời gian bắt đầu nếu chưa được thiết lập
    if (!isset($_SESSION['start_time'])) {
        $_SESSION['start_time'] = time(); // Lưu thời gian bắt đầu
        $_SESSION['duration'] = 45*60; // Đặt thời gian kiểm tra là 45 phút (2700 giây)
        $_SESSION['end_time'] = $_SESSION['start_time'] + $_SESSION['duration']; // Thời gian kết thúc
    }
    // Kiểm tra thời gian đã hết hay chưa
    if (time() >= $_SESSION['end_time']) {
        unset($_SESSION['start_time']);
        unset($_SESSION['duration']);
        unset($_SESSION['end_time']);
        // Thời gian kiểm tra đã hết, tự động nộp bài
        echo "<script>alert('Hết giờ rồi, qua phần đọc thôi!');
                    document.querySelector('#donetestL').click()
            </script>";
        exit();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/DoTest.css">
    <title>Làm bài kiểm tra</title>
</head>
<link rel="stylesheet" href="../assets/css/DoTest.css">
<link rel="stylesheet" href="../assets/css/img_aud.css">
<style>
    #countdown
    {
        position: fixed;
        top: 100px;
        right: 10px;
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
        border: 2px solid #007bff;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
    }
    #myAudiodv {
        display: none;
    }
    #audioch {
        display: none;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 border">
                <div id="countdown"></div>
                <script language="javascript">
                    // Hàm cập nhật thời gian
                    function updateTimer() {
                        // Lấy phần tử HTML hiển thị thời gian
                        var timerElement = document.getElementById("countdown");
                    
                        // Lấy thời gian hiện tại
                        var currentTime = new Date().getTime();
                    
                        // Lấy thời gian kết thúc từ PHP và chuyển đổi sang dạng timestamp
                        var endTime = <?php echo $_SESSION['end_time'] * 1000; ?>;
                    
                        // Tính thời gian còn lại
                        var remainingTime = Math.max(0, endTime - currentTime);
                    
                        // Chuyển đổi thời gian còn lại thành phút và giây
                        var minutes = Math.floor(remainingTime / 60000);
                        var seconds = Math.floor((remainingTime % 60000) / 1000);
                    
                        // Hiển thị thời gian còn lại
                        timerElement.innerHTML = "Time left: " + minutes + " minutes " + seconds + " seconds";
                    
                        // Kiểm tra nếu hết giờ thì tự động nộp bài
                        if (remainingTime <= 0) {
                            clearInterval(timerInterval); // Dừng cập nhật thời gian
                            alert("Thời gian kiểm tra đã hết!");
                            // Thực hiện xử lý nộp bài
                            document.querySelector("#donetestL").click();
                        }
                    }
                    
                    // Gọi hàm cập nhật thời gian ban đầu
                    updateTimer();
                    
                    // Cập nhật thời gian mỗi giây
                    var timerInterval = setInterval(updateTimer, 1000);
                </script>
                <div class="form-control">
                    <form method="POST" action="">
                        <?php
                            foreach ($questions as $index => $question) : 
                        ?>
                            <?php
                                $re = $p->reListening($question['MaDV'], $question['MaCH']);
                                if($question['MaDV']!=0)
                                {
                            ?>
                                    <audio controls autoplay src="../assets/audio/<?php echo $question['NoidungDV']; ?>" type="audio/mp3" id="myAudiodv"></audio><br>
                                    <script>
                                      var audiodv = document.getElementById("myAudiodv");
                                    
                                      audiodv.addEventListener("ended", function() {
                                        audiodv.pause();
                                        audiodv.currentTime = 0;
                                        audiodv.removeAttribute("autoplay");
                                      });
                                    </script>
                            <?php
                                }
                                
                                if($question['hinhanh']!='')
                                {
                            ?>
                                    <img src="../assets/img/L1/<?php echo $question['hinhanh']; ?>" alt="">
                            <?php            
                                }
                                while($cot=mysqli_fetch_assoc($re))
                                {
                            ?>
                                    <input type="hidden" name="questionID[]" value="<?php echo $cot['MaCH']; ?>">
                                    <?php
                                        echo '<b><h3>Sentence ' . $page.'.</b></h3>';
                                        echo '<h3>Part ' . $cot['MaPart'] . '</h3>';
                                        if($cot['MaPart']=='L1' || $cot['MaPart']=='L2')
                                        {
                                    ?>
                                            <audio controls autoplay src="../assets/audio/<?php echo $cot['Cauhoi']; ?>" type="audio/mp3" id="audioch"></audio><br>
                                            <script>
                                              var audioch = document.getElementById("audioch");
                                            
                                              audioch.addEventListener("ended", function() {
                                                audioch.pause();
                                                audioch.currentTime = 0;
                                                audioch.removeAttribute("autoplay");
                                              });
                                            </script>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                            <b><input class="form-control" type="text" name="cauhoi" id="cauhoi" value="<?php echo $cot['Cauhoi']; ?>" readonly></b>
                                    <?php        
                                        }
                                        
                                        if($cot['MaPart']=='L1')
                                        {
                                    ?>
                                            <img src="../assets/img/L1/<?php echo $cot['Hinh']; ?>" alt="">
                                    <?php
                                        }
                                        
                                    ?>  
                                    <ol type="A">
                                        <li>
                                            <input type="radio" name="dapan_<?php echo $cot['MaCH']; ?>" id="dapan_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanA']; ?>">
                                            <label for="dapan_<?php echo $cot['MaCH']; ?>"><?php echo $cot['DapanA']; ?></label>
                                        </li>
                                        <li>
                                            <input type="radio" name="dapan_<?php echo $cot['MaCH']; ?>" id="dapan_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanB']; ?>">
                                            <label for="dapan_<?php echo $cot['MaCH']; ?>"><?php echo $cot['DapanB']; ?></label>
                                        </li>
                                        <li>
                                            <input type="radio" name="dapan_<?php echo $cot['MaCH']; ?>" id="dapan_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanC']; ?>">
                                            <label for="dapan_<?php echo $cot['MaCH']; ?>"><?php echo $cot['DapanC']; ?></label>
                                        </li>
                                    <?php
                                        if($cot['MaPart']!='L2')
                                        {
                                    ?>
                                        <li>
                                            <input type="radio" name="dapan_<?php echo $cot['MaCH']; ?>" id="dapan_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanD']; ?>">
                                            <label for="dapan_<?php echo $cot['MaCH']; ?>"><?php echo $cot['DapanD']; ?></label>
                                        </li>
                                    <?php        
                                        }
                                        
                                    ?>
                                    </ol>
                                    <input type="hidden" name="dapandung_<?php echo $cot['MaCH']; ?>" id="dapandung_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanDung']; ?>">
                                    <div style="border-bottom: 1px solid;"></div>
                            <?php
                                } 
                            ?>
                                    <br>
                        <?php endforeach; ?>
                        <?php if ($page < $totalPages) : ?>
                            <input type="hidden" name="page" value="<?php echo $page + 1; ?>">
                            <button type="submit" name="next" class="btn btn-primary">Next</button>
                            <button type="submit" style="display: none;" name="donetestL" id="donetestL" class="btn btn-success">Submit</button>
                        <?php else: ?>
                            <button type="submit" name="donetestL" id="donetestL" class="btn btn-success">Submit</button>
                        <?php endif; ?>
                    </form>
                        <br>
                        <?php
                        /*
                        <div>
                            <?php if ($page > 1) : ?>
                                <a href="?test=<?php echo $MaDe; ?>&page=<?php echo $page - 1; ?>">Previous</a>
                            <?php endif; ?>
                            <?php if ($page < $totalPages) : ?>
                                <a href="?test=<?php echo $MaDe; ?>&page=<?php echo $page + 1; ?>">Next</a>
                            <?php endif; ?>
                        </div>
                        */
                        ?>
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $questionIds = $_POST['questionID'];
                            // Kiểm tra nếu mảng `$answers` chưa tồn tại trong session, tạo mới nó
                            if (!isset($_SESSION['answers'])) {
                                $_SESSION['answers'] = array();
                            }
                            // Lưu trữ câu trả lời vào mảng kết hợp
                            foreach ($questionIds as $questionId) {
                                $answer = $_POST['dapan_' . $questionId];
                                $correct = $_POST['dapandung_'. $questionId];
                                $_SESSION['answers'] = [
                                    $questionId => $answer,
                                    'correct_'.$questionId => $correct
                                ];
                            }
                        
                            if (isset($_POST['next'])) {
                                // Chuyển hướng đến trang kế tiếp
                                $nextPage = $page + 1;
                                echo '<script>window.location.href="?test=' . $MaDe . '&page=' . $nextPage . '"</script>';
                                exit;
                            } elseif (isset($_POST['donetestL'])) {
                                // Tính điểm
                                $totalCorrectAnswers = 0;
                                if (isset($_SESSION['answers'])) {
                                    // Truy cập và sử dụng mảng `$answers`
                                    $answers = $_SESSION['answers'];
                                    foreach ($answers as $questionId => $userAnswer) {
                                        // Lấy câu trả lời đúng từ mảng $questions (hoặc từ nguồn dữ liệu khác)
                                        $correctAnswer = $answers['correct_'.$questionId];
                            
                                        // Kiểm tra câu trả lời đúng và tăng số câu trả lời đúng
                                        if ($userAnswer == $correctAnswer) {
                                            $totalCorrectAnswers++;
                                        }
                                    }
                            
                                    $diemket = $totalCorrectAnswers*5;
                                    if($diemket == 0)
                                    {
                                        $diemket = 5;
                                    }
                                    $p->rediemL($_SESSION['ID'], $diemket, $MaDe);
                                    if($diemket==5)
                                    {  
                                        echo '<script>alert("Rất tiếc! Bạn cần cải thiện nhiều hơn!")</script>';
                                        echo '<script>window.location.href="DoTest.php?L='.$diemket.'&test='.$MaDe.'"</script>';
                                    }
                                    else
                                    {
                                        echo '<script>alert("Bạn đã đúng '.$diem.' câu! Điểm Listening là '.$diemket.' điểm!")</script>';
                                        echo '<script>window.location.href="DoTest.php?L='.$diemket.'&test='.$MaDe.'"</script>';
                                    }
                                }
                                unset($_SESSION['answers']);
                                exit;
                            }
                        }
                    ?>

                </div>
                <!-- Hiển thị thời gian -->
                <!--<div class="" style="" id="countdown">-->
                <!--    <div>-->
                <!--        <span id="h">Giờ</span> :-->
                <!--        <span id="m">Phút</span> :-->
                <!--        <span id="s">Giây</span>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</body>
</html>
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
?>