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
    table {
      border-collapse: collapse;
      width: 100%;
      margin: 20px 0;
    }
    
    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    th {
      background-color: #f2f2f2;
      font-weight: bold;
      color: #444;
    }
    
    tr:hover {
      background-color: #f5f5f5;
    }
    </style>
    <script src="https://cdn.tiny.cloud/1/igk5mcyc81tqdsoyrj1dlzsyluktbdszeav0m4vpqudchgt1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <div id="khung" class="container">
        <div class="row">
            <h2 style="text-align: center;">LUYỆN NGỮ PHÁP TOEIC</h1>
                <div class="col-md-2"></div>
                <p><br></p>
                <!-- Button trigger modal -->
                
                <?php
                    if($_SESSION['vt'] == 'QLTL')
                    {
                ?>
                        <div class="options">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtense">Add tense</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add question</button>
                            <a href="grammar_question_list.php"><button type="button" class="btn btn-info">Questions List</button></a>
                        </div>
                <?php
                    }
                ?>
                <div id="grammar-select" class="col-md-8">
                    <?php 
                        include_once('../controller/cPractice.php');
                        $p=new cPractice();
                        $hien = $p->view_grammar();
                        while($row = mysqli_fetch_assoc($hien)){
                            ?>
                    <div id="left" class="col-lg-4 col-md-6 col-sm-12">
                        <div class="grammar_item"><a href="practice_grammar.php?type=<?php echo $row['tense_name']; ?>&id=<?php echo $row['ID']; ?>">
                                <p><?php echo $row['tense_name']; ?></p>
                            </a></div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                        <!-----------------------------------Modal thêm các thì--------------------------------------------------------------------------->
                        <!-- Button trigger modal -->
                        <!----<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtense">Add tense</button>-->
                        <div class="modal fade" id="addtense" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Tense</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="Tense">Tense name: </label>
                                        <input type="text" class="form-control" name="Tense" id="Tense" aria-describedby="tenseHelp" placeholder="Type name of tense">
                                        <small style="color: red;" id="tenseHelp" class="form-text text-muted">UPPERCASE and use ENGLISH</small>
                                    </div>
                                    <div class="form-group">
                                      <label for="mota">Description: </label>
                                      <textarea class="form-control" name="mota" id="mota" rows="3"></textarea>
                                    </div>
                                    <script>
                                      tinymce.init({
                                        selector: '#mota'
                                      });
                                    </script>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="add_Tense" id="add_Tense" class="btn btn-primary">Add</button>
                                <?php
                                    include_once('../controller/cGrammar_Q.php');
                                    $x=new cGrammar();
                                    $take = $x->add_grammar_tense();
                                    if(isset($_POST['add_Tense']))
                                    {
                                        if($take)
                                        {
                                            echo '<script>alert("Thêm thì thành công !")</script>';
                                            echo "<script> window.location.href = 'choose_grammar.php'; </script>";
                                        }
                                        else
                                        {
                                            echo '<script>alert("Something went wrong !!!")</script>';
                                            echo "<script> window.location.href = 'choose_grammar.php'; </script>";
                                        }
                                    }
                                ?>
                              </div>
                                </form>
                            </div>
                          </div>
                        </div>
                        <!-----------------------------------Modal thêm câu hỏi--------------------------------------------------------------------------->
                        <!----<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add question</button>-->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding question to Tense</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="tense">Thì ngữ pháp: </label>
                                        <select class="form-control" name="tense" id="tense">
                                            <option selected>chọn</option>
                                            <?php
                                                include_once('../controller/cGrammar_Q.php');
                                                $p=new cGrammar();
                                                $show = $p->show_grammar_tense();
                                                while($cot = mysqli_fetch_assoc($show))
                                                {
                                                    ?>
                                                        <option value="<?php echo $cot['ID']; ?>"><?php echo $cot['tense_name']; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="question">Câu hỏi: </label>
                                        <input type="text" class="form-control" name="cauhoi" id="cauhoi" placeholder="Hãy nhập nội dung câu hỏi">
                                    </div>
                                    <div class="form-group">
                                      <label for="dapana">Đáp án A: </label>
                                      <input type="text" class="form-control" name="dapana" id="dapana" placeholder="Nhập đáp án A">
                                    </div>
                                    <div class="form-group">
                                      <label for="dapanb">Đáp án B: </label>
                                      <input type="text" class="form-control" name="dapanb" id="dapanb" placeholder="Nhập đáp án B">
                                    </div>
                                    <div class="form-group">
                                      <label for="dapanc">Đáp án C: </label>
                                      <input type="text" class="form-control" name="dapanc" id="dapanc" placeholder="Nhập đáp án C">
                                    </div>
                                    <div class="form-group">
                                      <label for="dapand">Đáp án D: </label>
                                      <input type="text" class="form-control" name="dapand" id="dapand" placeholder="Nhập đáp án D">
                                    </div>
                                    <div class="form-group">
                                      <label for="dapandung">Đáp án đúng: </label>
                                      <input type="text" class="form-control" name="dapandung" id="dapandung" placeholder="Nhập đáp án đúng">
                                    </div>
                                    <div class="form-group">
                                      <label for="giaithich">Giải thích: </label>
                                      <textarea class="form-control" name="giaithich" id="giaithich" rows="3" placeholder="Giải thích lí do chọn"></textarea>
                                    </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="add_GQ" class="btn btn-primary">Add</button>
                                </form>
                                <?php
                                    include_once('../controller/cGrammar_Q.php');
                                    $z=new cGrammar();
                                    $hien = $z->add_grammar_tense_question();
                                    if(isset($_POST['add_GQ']))
                                    {
                                        if($hien)
                                        {
                                            echo '<script>alert("Thêm câu hỏi thành công !")</script>';
                                            echo "<script> window.location.href = 'choose_grammar.php'; </script>";
                                        }
                                        else
                                        {
                                            echo '<script>alert("Lỗi khi thêm câu hỏi !")</script>';
                                            echo "<script> window.location.href = 'choose_grammar.php'; </script>";
                                        }
                                    }
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!---------------------------------------kết thúc modal---------------------------------->
                <div class="col-2"></div>
        </div>
    </div>
</body>
<?php
include('footer.php')
?>

</html>