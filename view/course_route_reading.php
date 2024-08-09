<?php
    include('header.php');
    if($_SESSION['vt']=='HV')
    {
?>
    <title>ATI | Reading</title>
    <link rel="stylesheet" href="../assets/css/practice/style.css">
    <link rel="stylesheet" href="../assets/css/practice/dictionary.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>
        .noidung{
            padding-top: 10px;
            margin: 20px;
            border: 3px solid black;
            border-radius: 10px;
            box-shadow: 0px 15px 25px;
            background-color: white;
        }
        .audio-container{
            display: flex;
            justify-content: center;
        }
        .image-container{
            display: flex;
            vertical-align: middle;
            padding-top: 20px;
        }
        .myAnswer{
            display: none;
        }
        .my-button{
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .my-button-dictionary{
            background-color: #34495e;
            color: white;
            border: none;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .dictionary{
            display: flex;
            flex-direction: column;
        }
        .dictionary > #nhap{
            padding: 10px;
            border: none;
            outline: none;
            font-size: 17px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        #search_btn{
            width: 30%;
            height: 30px;
            font-size: 14px;
            background: rgba(201, 138, 138);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: 400ms ease;
        }
        #search_btn:hover{
            background: green;
        }
    </style>
    
<body>
    <main>
        <div class="container">
            <!--------------------------------------->
                <div id="myPopup">
                  <!----<button class="open-button" onclick="openPopup()">Dictionary</button>-->
                  <div class="popup-content">
                    <span class="close-button" onclick="closePopup()">&times;</span>
                    <button class="my-button-dictionary" type="button" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="openPopup()"><i class="fa-solid fa-spell-check fa-beat-fade"></i></button>
                  </div>
                </div>
                <script>
                    // Mở pop-up
                    function openPopup() {
                      document.querySelector(".popup-content").style.display = "block";
                    }
                    
                    // Đóng pop-up
                    function closePopup() {
                      document.querySelector(".popup-content").style.display = "none";
                    }
                </script>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 border">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div style="background-color: #ADD8E6;" class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Dictionary by ATI</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form">
                                    <div class="dictionary">
                                        <input type="text" name="" id="nhap" class="search_input" placeholder="Nhập từ cần tìm kiếm">
                                        <button id="search_btn">Search</button>
                                    </div>
                                    <div class="data-section">
                                        <div class="def">
                                            <span style="font-weight: bolder;">Từ:</span> <b><span style="color: red;" class="vocabulary"></span></b><br>
                                            <span style="font-weight: bolder;">Loại từ:</span><br> <span class="PoS"></span><br>
                                            <span style="font-weight: bolder;">Từ đồng nghĩa:</span><br> <span class="dongnghia"></span><br>
                                            <span style="font-weight: bolder;">Từ trái nghĩa:</span><br> <span class="trainghia"></span><br>
                                            <span style="font-weight: bolder;">Phiên âm:</span> <span class="phonetic"></span><br>
                                            <span style="font-weight: bolder;">Định nghĩa:</span> <br><span class="definition"></span><br>
                                            <span style="font-weight: bolder;">Ví dụ:</span> <span class="example"></span><br>
                                            <span class="not_example"></span><br>
                                            <span style="font-weight: bolder;">Phát âm:</span><div id="audio-uk"></div></br><div id="audio-us"></div <br><span class="audio"></span>
                                            <p></p><hr style="border: 1px solid black;">
                                            <span class="PoS2"></span><br>
                                            <span class="definition2"></span><br>
                                            <span class="dongnghia2"></span><br>
                                            <span class="trainghia2"></span><br>
                                            <span class="example2"></span><br>
                                        </div>
                                        <div class="not_found"></div>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="reset-btn" class="btn btn-danger">Reset</button>
                                <script>
                                  const resetBtn = document.querySelector('#reset-btn');
                                  resetBtn.addEventListener('click', function() {
                                    const vocabulary = document.querySelectorAll('.vocabulary');
                                    const PoS = document.querySelectorAll('.PoS');
                                    const PoS2 = document.querySelectorAll('.PoS2');
                                    const synonyms = document.querySelectorAll('.dongnghia');
                                    const antonyms = document.querySelectorAll('.trainghia');
                                    const synonyms2 = document.querySelectorAll('.dongnghia2');
                                    const antonyms2 = document.querySelectorAll('.trainghia2');
                                    const phonetic = document.querySelectorAll('.phonetic');
                                    const definition = document.querySelectorAll('.definition');
                                    const definition2 = document.querySelectorAll('.definition2');
                                    const example = document.querySelectorAll('.example');
                                    const example2 = document.querySelectorAll('.example2');
                                    const audio = document.querySelectorAll('.audio');
                                    
                                    vocabulary.forEach(voca => {
                                      voca.innerText = ''; // Đặt giá trị của mỗi phần tử về rỗng
                                    });
                                    PoS.forEach(pos => {
                                      pos.innerText = '';
                                    });
                                    PoS2.forEach(pos2 => {
                                      pos2.innerText = ''; 
                                    });
                                    synonyms.forEach(sy => {
                                      sy.innerText = ''; 
                                    });
                                    antonyms.forEach(an => {
                                      an.innerText = ''; 
                                    });
                                    synonyms2.forEach(sy2 => {
                                      sy2.innerText = ''; 
                                    });
                                    antonyms2.forEach(an2 => {
                                      an2.innerText = ''; 
                                    });
                                    phonetic.forEach(pho => {
                                      pho.innerText = ''; 
                                    });
                                    definition.forEach(defi => {
                                      defi.innerText = '';
                                    });
                                    definition2.forEach(defi2 => {
                                      defi2.innerText = '';
                                    });
                                    example.forEach(ex => {
                                      ex.innerText = '';
                                    });
                                    example2.forEach(ex2 => {
                                      ex2.innerText = ''; 
                                    });
                                    audio.forEach(aud => {
                                      aud.innerText = ''; 
                                    });
                                  });
                                </script>
                              </div>
                            </div>
                          </div>
                        </div>
                <?php
                    include('../controller/cRoute.php');
                    $p= new cRoute();
                    $route_name = $_GET['route'];
                    $practice = $_GET['practice'];
                    $show = $p->xem_lotrinh_doc_dv($practice, $route_name);
                    if(mysqli_num_rows($show)>0)
                    {
                        if($practice == 'R6' || $practice == 'R7')
                        {
                            $count = 1;
                            $para = 1;
                            while($row = mysqli_fetch_assoc($show))
                            {
                                $madv = $row['MaDV'];
                                $hien = $p->xem_lotrinh_cauhoi($practice, $madv);
                                ?>
                                    <div class="noidung" >
                                        <?php echo '<h2 style="padding-left: 10px;"><span><i class="fa-solid fa-book-open-reader fa-beat"></i></span> Text ' . $para++ . ':</h2>'; ?> 
                                        <div style="margin: 10px;" class="text-left">
                                            <p style="font-size: 16px; line-height: 1.5; font-weight: normal; font-family: Arial, sans-serif;"><?php echo $row['NoidungDV']; ?></p>
                                        </div>
                                        <p></br></p>
                                        <?php 
                                            while($cot = mysqli_fetch_assoc($hien))
                                            {
                                                ?>
                                            <div class="minz" data-id="<?php echo $cot['MaCH']; ?>">
                                                <div style="padding: 10px;" class="audio-container">
                                                    <b><textarea class="form-control" name="cauhoi" id="cauhoi" cols="90" rows="4" readonly><?php echo $cot['Cauhoi']; ?></textarea></b>
                                                </div>
                                                <i class="fa-solid fa-circle-question fa-bounce"></i> <b><i><?php echo 'Question'.' '.$count++.':'; ?></i></b>
                                                <ul id="answer-list">
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $cot['MaCH']; ?>" class="dapan_<?php echo $cot['MaCH']; ?>" id="dapan_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanA']; ?>"><?php echo $cot['DapanA']; ?>
                                                        <span class="result" id="result_<?php echo $cot['MaCH']; ?>"></span>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $cot['MaCH']; ?>" class="dapan_<?php echo $cot['MaCH']; ?>" id="dapan_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanB']; ?>"><?php echo $cot['DapanB']; ?>
                                                        <span class="result" id="result_<?php echo $cot['MaCH']; ?>"></span>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $cot['MaCH']; ?>" class="dapan_<?php echo $cot['MaCH']; ?>" id="dapan_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanC']; ?>"><?php echo $cot['DapanC']; ?>
                                                        <span class="result" id="result_<?php echo $cot['MaCH']; ?>"></span>
                                                    </li>
                                                    <?php
                                                        if($practice != 'L2')
                                                        {
                                                            ?>
                                                            <li>
                                                                <input type="radio" name="dapan_<?php echo $cot['MaCH']; ?>" class="dapan_<?php echo $cot['MaCH']; ?>" id="dapan_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanD']; ?>"><?php echo $cot['DapanD']; ?>
                                                                <span class="result" id="result_<?php echo $cot['MaCH']; ?>"></span>
                                                            </li>
                                                            <?php
                                                        }
                                                    ?>
                                                    <input type="hidden" name="dapandung_<?php echo $cot['MaCH']; ?>" id="dapandung_<?php echo $cot['MaCH']; ?>" value="<?php echo $cot['DapanDung']; ?>">
                                                    <!------------------------check correct or incorrect----------------------------------->
                                                    <script type="text/javascript">
                                                        var questions = document.querySelectorAll('.minz');
                        
                                                        questions.forEach(question => {
                                                          var answerInputs = question.querySelectorAll('input[type="radio"]');
                                                          var correctAnswer = document.getElementById('dapandung_' + question.dataset.id).value;
                                                          var resultDiv = document.getElementById('result_' + question.dataset.id);
                                                
                                                          answerInputs.forEach(input => {
                                                            input.addEventListener('click', () => {
                                                            const resultDiv = input.parentNode.querySelector('.result');
                                                              // chỉ cho người dùng chọn 1 đáp án và khóa lại không cho sửa
                                                              answerInputs.forEach(otherInput => {
                                                              otherInput.addEventListener('click', () => {
                                                                if (otherInput !== input) {
                                                                      resultDiv.innerHTML = ''; // Xóa biểu tượng sai nếu đã hiển thị trước đó
                                                                      //otherInput.disabled = true;
                                                                    }
                                                                  });
                                                                });
                                                        
                                                              // kiểm tra kết quả
                                                              if (input.value === correctAnswer) {
                                                                resultDiv.innerHTML = '<span style="color:green; font-weight: bold;"><i class="fas fa-check-circle"></i></span>';
                                                                console.log('Correct!');
                                                              } 
                                                              else 
                                                              {
                                                                resultDiv.innerHTML = '<span style="color:red; font-weight: 500;"><i class="fas fa-times-circle"></i></span>';
                                                                console.log('Incorrect!');
                                                              }
                                                            });
                                                          });
                                                        });
                                                    </script>
                                                </ul>
                                            </div>
                                                <?php
                                            }
                                        ?>
                                        <!-- Button trigger modal -->
                                        <button class="my-button-dictionary" type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa-solid fa-spell-check fa-beat-fade"></i></button>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            $route_name = $_GET['route'];
                            $practice = $_GET['practice'];
                            $push = $p->xem_lotrinh_doc_P5($practice,$route_name);
                            $counting = 0;
                            if(mysqli_num_rows($push) > 0)
                            {
                                while($bro = mysqli_fetch_assoc($push))
                                {
                                    $counting++;
                                    ?>
                                    <div class="noidung" data-id="<?php echo $bro['MaCH']; ?>">
                                        <div class="audio-container">
                                            <textarea class="form-control"  name="cauhoi" id="cauhoi" rows="4" cols="90" readonly><?php echo $bro['Cauhoi']; ?></textarea>
                                        </div>
                                        <ul id="answer-list">
                                            <li>
                                                <input type="radio" name="dapan_<?php echo $bro['MaCH']; ?>" class="dapan_<?php echo $bro['MaCH']; ?>" id="dapan_<?php echo $bro['MaCH']; ?>" value="<?php echo $bro['DapanA']; ?>"><?php echo $bro['DapanA']; ?>
                                                <span class="result" id="result_<?php echo $bro['MaCH']; ?>"></span>
                                            </li>
                                            <li>
                                                <input type="radio" name="dapan_<?php echo $bro['MaCH']; ?>" class="dapan_<?php echo $bro['MaCH']; ?>" id="dapan_<?php echo $bro['MaCH']; ?>" value="<?php echo $bro['DapanB']; ?>"><?php echo $bro['DapanB']; ?>
                                                <span class="result" id="result_<?php echo $bro['MaCH']; ?>"></span>
                                            </li>
                                            <li>
                                                <input type="radio" name="dapan_<?php echo $bro['MaCH']; ?>" class="dapan_<?php echo $bro['MaCH']; ?>" id="dapan_<?php echo $bro['MaCH']; ?>" value="<?php echo $bro['DapanC']; ?>"><?php echo $bro['DapanC']; ?>
                                                <span class="result" id="result_<?php echo $bro['MaCH']; ?>"></span>
                                            </li>
                                            <li>
                                                <input type="radio" name="dapan_<?php echo $bro['MaCH']; ?>" class="dapan_<?php echo $bro['MaCH']; ?>" id="dapan_<?php echo $bro['MaCH']; ?>" value="<?php echo $bro['DapanD']; ?>"><?php echo $bro['DapanD']; ?>
                                                <span class="result" id="result_<?php echo $bro['MaCH']; ?>"></span>
                                            </li>
                                        <input type="hidden" name="dapandung_<?php echo $bro['MaCH']; ?>" id="dapandung_<?php echo $bro['MaCH']; ?>" value="<?php echo $bro['DapanDung']; ?>">
                                        
                                        <!------------------------check correct or incorrect----------------------------------->
                                                <script type="text/javascript">
                                                    var questions = document.querySelectorAll('.noidung');
                    
                                                    questions.forEach(question => {
                                                      var answerInputs = question.querySelectorAll('input[type="radio"]');
                                                      var correctAnswer = document.getElementById('dapandung_' + question.dataset.id).value;
                                                      var resultDiv = document.getElementById('result_' + question.dataset.id);
                                            
                                                      answerInputs.forEach(input => {
                                                        input.addEventListener('click', () => {
                                                        const resultDiv = input.parentNode.querySelector('.result');
                                                          // chỉ cho người dùng chọn 1 đáp án và khóa lại không cho sửa
                                                          answerInputs.forEach(otherInput => {
                                                          otherInput.addEventListener('click', () => {
                                                            if (otherInput !== input) {
                                                                  resultDiv.innerHTML = ''; // Xóa biểu tượng sai nếu đã hiển thị trước đó
                                                                  //otherInput.disabled = true;
                                                                }
                                                              });
                                                            });
                                                    
                                                          // kiểm tra kết quả
                                                          if (input.value === correctAnswer) {
                                                            resultDiv.innerHTML = '<span style="color:green; font-weight: bold;"><i class="fas fa-check-circle"></i></span>';
                                                            console.log('Correct!');
                                                          } 
                                                          else 
                                                          {
                                                            resultDiv.innerHTML = '<span style="color:red; font-weight: 500;"><i class="fas fa-times-circle"></i></span>';
                                                            console.log('Incorrect!');
                                                          }
                                                        });
                                                      });
                                                    });
                                                </script>
                                            </ul>
                                            
                                            <!-------------------------hiển thị script R5---------------------------------->
                                            <button id="hien_thi_<?php echo $counting; ?>" class="hien_thi my-button" >Show/Hide Script</button>
                                            <button class="my-button-dictionary" type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa-solid fa-spell-check fa-beat-fade"></i></button>
                                            <div id="myAnswer_<?php echo $counting; ?>" class="myAnswer">
                                              <p><?php echo $bro['script']; ?></p>
                                            </div>
                                            <script>    
                                                // Hàm được gọi khi trang được tải hoàn toàn
                                                window.onload = function() {
                                                    // Lặp qua từng button và div và gán sự kiện click
                                                    var hien_thi = document.getElementsByClassName("hien_thi");
                                                    var myAnswer = document.getElementsByClassName("myAnswer");
                                                    for (var i = 0; i < hien_thi.length; i++) {
                                                        hien_thi[i].addEventListener("click", function(event){
                                                            event.preventDefault(); //chặn chức năng submit form
                                                            var id = this.id.split("_")[2]; // Lấy số thứ tự từ ID button
                                                            var answer = document.getElementById("myAnswer_"+id);
                                                            if (!answer.style.display || answer.style.display === "none") 
                                                            {
                                                                answer.style.display = "block";
                                                            }
                                                            else 
                                                            {
                                                                answer.style.display = "none";
                                                            }
                                                        });
                                                    }
                                                }
                                            </script>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    }
                ?>
                
                </div>
            </div>
            <div style="text-align: center;" class="">
                <a href="course_route.php?route=<?php echo $route_name; ?>&user=<?php echo $_SESSION['ID']; ?>"><button type="button" class="btn btn-primary">Done</button></a>
            </div>
        </div>
    </main>
</body>
<script src="../assets/js/dictionary_api.js"></script>
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