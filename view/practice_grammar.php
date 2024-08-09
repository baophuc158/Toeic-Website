<?php
include('header.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATI | Grammar Practice</title>
    <link rel="stylesheet" href="../assets/css/practice/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="container-fluid">
                    <?php
                    require_once('../controller/cPractice.php');
                    $p = new cPractice();
                    $type = $_GET['type'];
                    $hien = $p->thongtin_grammar($type);
                    foreach ($hien as $row) {
                        echo '<h3 style="text-align: center;">'.$row['tense_name'].'</h3>';
                        echo '<div id="theory">
                                <div id="inner">
                                    <p>' . $row['Description'] . '</p>
                                </div>
                            </div>';                              
                    }
            ?>
                </div>
                <div class="container-fluid">
                    <div class="practice">
                        <form action="" method="post">
                            <?php
                    include_once('../controller/cGrammar_Q.php');
                    $p= new cGrammar();
                    $tense_ID = $_GET['id'];
                    $xuat = $p->show_grammar_question($tense_ID);
                    while($hang = mysqli_fetch_assoc($xuat)){
                        ?>
                        <div class="noidung" data-id="<?php echo $hang['ID']; ?>">
                            <p id="quest">Question <?php echo $hang['ID']; ?>:</p>
                            <p><?php echo $hang['Grammar_question']; ?></p>
                            <div class="do-it">
                                <input type="hidden" name="questionID[]" value="<?php echo $hang['ID']; ?>">
                                <ul id="answer-list">
                                    <li>
                                        <input type="radio" name="A_<?php echo $hang['ID']; ?>" id="<?php echo $hang['ID']; ?>"
                                            value="<?php echo $hang['AnswerA']; ?>"> (A)<?php echo $hang['AnswerA']; ?>
                                        <span class="result" id="result_<?php echo $hang['ID']; ?>"></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="A_<?php echo $hang['ID']; ?>" id="<?php echo $hang['ID']; ?>"
                                            value="<?php echo $hang['AnswerB']; ?>"> (B)<?php echo $hang['AnswerB']; ?>
                                        <span class="result" id="result_<?php echo $hang['ID']; ?>"></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="A_<?php echo $hang['ID']; ?>" id="<?php echo $hang['ID']; ?>"
                                            value="<?php echo $hang['AnswerC']; ?>"> (C)<?php echo $hang['AnswerC']; ?>
                                        <span class="result" id="result_<?php echo $hang['ID']; ?>"></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="A_<?php echo $hang['ID']; ?>" id="<?php echo $hang['ID']; ?>"
                                            value="<?php echo $hang['AnswerD']; ?>"> (D)<?php echo $hang['AnswerD']; ?>
                                        <span class="result" id="result_<?php echo $hang['ID']; ?>"></span>
                                    </li>
                                </ul>
                                <input type="hidden" name="dapandung_<?php echo $hang['ID']; ?>" id="dapandung_<?php echo $hang['ID']; ?>"
                                    value="<?php echo $hang['Correct_Answer']; ?>">
                            </div><br>
                        </div>
                        <?php
                    }                   
                    ?>
                            <!------------------------check correct or incorrect----------------------------------->
                                <script type="text/javascript">
                                    var questions = document.querySelectorAll('.noidung');
                                    var totalCorrect = 0;
                                    var totalIncorrect = 0;
                                    
                                    questions.forEach(question => {
                                        var answerInputs = question.querySelectorAll('input[type="radio"]');
                                        var correctAnswer = document.getElementById('dapandung_' + question.dataset.id).value;
                                        var resultDiv = document.getElementById('result_' + question.dataset.id);
                                        var incorrect = 0;
                                        var correct = 0;
                                        
                                    answerInputs.forEach(input => {
                                        input.addEventListener('click', () => {
                                        const resultDiv = input.parentNode.querySelector('.result');
                                          // chỉ cho người dùng chọn 1 đáp án và khóa lại không cho sửa
                                          /*answerInputs.forEach(otherInput => {
                                            if (otherInput !== input) {
                                              otherInput.disabled = true;
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
                                            correct++;
                                            totalCorrect++;
                                            resultDiv.innerHTML = '<span style="color:green; font-weight: bold;"><i class="fas fa-check-circle"></i></span>';
                                            console.log('Correct!');
                                            //console.log('Total Correct Answers: ' + totalCorrect);
                                          } 
                                          else 
                                          {
                                            incorrect++;
                                            totalIncorrect++;
                                            resultDiv.innerHTML = '<span style="color:red; font-weight: 500;"><i class="fas fa-times-circle"></i></span>';
                                            console.log('Incorrect!');
                                            //console.log('Total Correct Answers: ' + totalIncorrect);
                                          }
                                        });
                                      });
                                    });
                                </script>
                            </ul>
                            <div style="text-align: center; width: 50%" id="nut">
                                <a href="choose_grammar.php"><button type="button" class="btn btn-success">Trở lại</button></a>
                                <script>
                                    /*var resultBtn = document.getElementById('gui')
                                    resultBtn.addEventListener('click', () => {
                                      const show = document.getElementById('summary');
                                      show.innerHTML = `<span>Tổng số câu đúng: ${totalCorrect}</span><br><span>Tổng số câu sai: ${totalIncorrect}</span>`;
                                  });*/
                                </script>
                            </div><br>
                            <div style="display: none;" id="summary"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
<script src="../assets/js/practice.js"></script>
<?php
include('footer.php')
?>

</html>