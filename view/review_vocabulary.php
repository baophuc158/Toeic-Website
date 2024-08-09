<?php
    include('header.php')
?>
<title>ATI | Review Vocabulary</title>
<style>
.noidung {
    padding-top: 10px;
    margin: 20px;
    border: 3px solid black;
    border-radius: 10px;
    box-shadow: 0px 15px 25px;
    background-color: white;
}
.hinh_anh{
    text-align: center;
    vertical-align: middle;
}
h2{
    text-align: center;
    font-size: 32px;
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    margin-bottom: 20px;
}
</style>
    <link rel="stylesheet" href="../assets/css/practice/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<body>
    <main>
    <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    <form action="" method="post">
                    <?php
                        include_once('../controller/cVocabulary.php');
                        $p = new cVocabulary();
                        $topic = $_GET['topic'];
                        $sad = $p->duyet_tuvung($topic);
                        ?>
                            <h2><?php echo 'Review on the topic'.' '. $topic; ?></h2>
                        <?php
                        while ($row = mysqli_fetch_assoc($sad)) {
                            $correct = $row['tu_vung'];
                        ?>
                            <div class="noidung" data-id="<?php echo $row['ID_vocabulary']; ?>">
                                <div class="hinh_anh">
                                    <img id="hinh_anh_<?php echo $row['ID_vocabulary']; ?>" style="width: 280px; height: 280px;" src="../assets/img/img_vocabulary/<?php echo $row['hinh_anh']; ?>" alt="<?php echo 'image' . '_' . $row['Topic']; ?>"><br>  
                                </div>
                            <?php
                                $z = new cVocabulary();
                                $boiz = $z->ngaunhien_tuvung($correct);
                                $options = array();
                                while ($hang = mysqli_fetch_array($boiz)) 
                                {
                                    array_push($options, $hang['tu_vung']);
                                }
                                array_push($options, $correct);
                                shuffle($options);
                            ?>
                                <?php
                                    $letters = array('A', 'B', 'C', 'D');
                                    foreach ($options as $key => $option) 
                                    {
                                        ?>
                                        
                                            <ul id="answer-list">
                                                <li>
                                                    <input type="radio" name="correct_answer_<?php echo $row['ID_vocabulary']; ?>" id="answer_<?php echo $row['ID_vocabulary']; ?>" value="<?php echo $option ?>"> <?php echo $letters[$key] . '. ' . $option; ?>
                                                    <span class="result" id="result_<?php echo $row['ID_vocabulary']; ?>"></span>
                                                </li>
                                            </ul>
                                        <?php
                                    }
                                    ?>
                                    <input type="hidden" id="correct_answer_<?php echo $row['ID_vocabulary']; ?>" name="correct_answer_<?php echo $row['ID_vocabulary']; ?>" value="<?php echo $row['tu_vung']; ?>">
                                    <?php
                                ?>
                                
                            </div>
                            <script type="text/javascript">
                                var questions = document.querySelectorAll('.noidung');

                                questions.forEach(question => {
                                  var answerInputs = question.querySelectorAll('input[type="radio"]');
                                  var correctAnswer = document.getElementById('correct_answer_' + question.dataset.id).value;
                                  var resultDiv = document.getElementById('result_' + question.dataset.id);
                        
                                  answerInputs.forEach(input => {
                                    input.addEventListener('click', () => {
                                    const resultDiv = input.parentNode.querySelector('.result');
                                      // chỉ cho người dùng chọn 1 đáp án và khóa lại không cho sửa
                                      /*answerInputs.forEach(otherInput => {
                                        if (otherInput !== input) {
                                          //otherInput.disabled = true;
                                        }
                                      });*/
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
                            
                        <?php
                        }
                    ?>
                        
                        <div style="text-align: center; width: 50%" id="nut">
                            <a href="choose_vocabulary.php"><button type="button" class="btn btn-success">Done</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

<?php
    include('footer.php')
?>

</html>