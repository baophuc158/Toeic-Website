<?php
    include('header.php');
    if($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    elseif($_SESSION['vt']=='QLTL')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
    else
    {
        include('../controller/cch.php');
        $p=new cCH();
        $hien=$p->loadl1();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATI | Test Listening 1</title>
    <link rel="stylesheet" href="../assets/css/practice/dictionary.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>
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
</head>
<body>
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
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
                <form action="" method="post">
                    <h2 style="text-align: center; margin: 10px;">PART 1: PHOTOS</h2>
                    <?php
                    $count = 0;
                        if(mysqli_num_rows($hien)>0)
                        {
                            while($row=mysqli_fetch_assoc($hien))
                            {
                                $count++;
                    ?>      <div style="height: 100%; background-color: azure;" class="form-control">
                                <input type="hidden" name="questionID[]" value="<?php echo $row['MaCH']; ?>">
                                <div style="text-align: center;" id="audximg">
                                    <audio controls src="../assets/audio/<?php echo $row['Cauhoi']; ?>" type="audio/mp3"></audio><br><br> 
                                    <img src="../assets/img/L1/<?php echo $row['Hinh']; ?>" alt="">
                                </div><br>
                                <ol type="A">
                                    <li>
                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanA']; ?>">
                                    </li>
                                    <li>
                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanB']; ?>">
                                    </li>
                                    <li>
                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanC']; ?>">
                                    </li>
                                    <li>
                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanD']; ?>">
                                    </li>
                                </ol>
                                <input type="hidden" name="dapandung_<?php echo $row['MaCH']; ?>" id="dapandung_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanDung']; ?>">
                                <?php 
                                    $umbala = [1,2,3,4,5,6];
                                ?>
                                <button id="hien_thi_<?php echo $count; ?>" class="hien_thi my-button" >Show/Hide Script</button>
                                <div id="myAnswer_<?php echo $count; ?>" class="myAnswer">
                                  <p><?php echo $row['script']; ?></p>
                                </div>
                                
                            </div><br>
                    <?php
                                
                            }
                        }
                        else
                        {
                            echo 'Không có dữ liệu';
                        }
                    ?>
                    <button class="my-button-dictionary" type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa-solid fa-spell-check fa-beat-fade"></i></button>
                    <script>    
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
                    </script>
                    <button type="submit" name="gui" id="gui" class="btn btn-info btn-block">Nộp bài</button><br>
                    <?php
                        if(isset($_POST['gui']))
                        {
                            $diem==0;
                            //print_r($_POST['questionID']);
                            foreach($_POST['questionID'] as $questionID)
                            {
                                if($_REQUEST['dapandung_'.$questionID]==$_REQUEST['dapan_'.$questionID])
                                {
                                    $diem++;
                                }
                            }
                            if($diem==0)
                            {  
                                echo '<script>alert("Bạn có thật lòng học Tiếng Anh không ?")</script>';
                                echo '<script>window.location.href="L1.php"</script>';
                            }
                            else
                            {
                                echo '<script>alert("Bạn đã đúng '.$diem.' câu !")</script>';
                                echo '<script>window.location.href="L1.php"</script>';
                            }
                        }
                    ?>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
<?php
    }
    include('footer.php');
?>
</body>
<script src="../assets/js/dictionary_api.js"></script>
</html>

