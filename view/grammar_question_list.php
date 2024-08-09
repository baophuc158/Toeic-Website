<?php
    include('header.php');
?>

<title>ATI | Question list</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .icon-group {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .icon-group button {
      margin: 0 5px;
    }

</style>
<body>
    <main>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 border">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="tense">Select Tense: </label>
                        <select class="form-control" name="tense" id="tense">
                            <option selected>Select one</option>
                            <?php
                                include_once('../controller/cGrammar_Q.php');
                                $a=new cGrammar();
                                $hien = $a->view_list();
                                while($hang = mysqli_fetch_assoc($hien))
                                {
                                    $selected = isset($_GET['tense']) && $_GET['tense'] == $hang['ID'] ? 'selected' : '';
                                    ?>
                                        <option value="<?php echo $hang['ID']; ?>" <?php echo $selected; ?>><?php echo $hang['tense_name']; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="search" class="btn btn-search">Tìm kiếm</button>
                </form>
                    <?php
                        {
                            if(isset($_POST['search']))
                            {
                                $take = $a->xem_tense_question();
                                if($take)
                                {
                    ?>
                                    <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th scope="col">Tense</th>
                                          <th scope="col">Questions</th>
                                          <th scope="col">A</th>
                                          <th scope="col">B</th>
                                          <th scope="col">C</th>
                                          <th scope="col">D</th>
                                          <th scope="col">Correct</th>
                                          <th scope="col">Explanation</th>
                                          <th scope="col">Options</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                            while($bro = mysqli_fetch_assoc($take))
                                            {
                                                $idBtn = $bro['id'];
                                        ?>
                                                    <tr>
                                                      <th scope="row"><?php echo $bro['tense_name']; ?></th>
                                                      <td><?php echo $bro['Grammar_question']; ?></td>
                                                      <td><?php echo $bro['AnswerA']; ?></td>
                                                      <td><?php echo $bro['AnswerB']; ?></td>
                                                      <td><?php echo $bro['AnswerC']; ?></td>
                                                      <td><?php echo $bro['AnswerD']; ?></td>
                                                      <td><?php echo $bro['Correct_Answer']; ?></td>
                                                      <td><?php echo $bro['Explanation']; ?></td>
                                                      <td>
                                                          <span class="icon-group">
                                                            <button type="button"><i class="fa-solid fa-trash"></i></button>
                                                            <button type="button" data-toggle="modal" name="open" id="<?php echo $idBtn; ?>" data-target="#exampleModal_<?php echo $idBtn; ?>"><i class="fa-solid fa-pen-nib"></i></button>
                                                          </span>
                                                      </td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal_<?php echo $idBtn; ?>" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="editModal">Edit Question Form</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                        <form action="grammar_question_update.php" method="post">
                                                          <div class="modal-body">
                                                            <?php
                                                                $took = $a->chon_cauhoi($idBtn);
                                                                while($xuat = mysqli_fetch_assoc($took))
                                                                {
                                                                    //echo $idBtn;
                                                            ?>
                                                                            <div class="form-group">
                                                                                <label for="id">ID: </label>
                                                                                <input type="text" class="form-control" name="id" id="id" placeholder="Hãy nhập nội dung câu hỏi" value="<?php echo $xuat['id']; ?>" readonly>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="question">Câu hỏi: </label>
                                                                                <input type="text" class="form-control" name="cauhoi" id="cauhoi" placeholder="Hãy nhập nội dung câu hỏi" value="<?php echo $xuat['Grammar_question']; ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                              <label for="dapana">Đáp án A: </label>
                                                                              <input type="text" class="form-control" name="dapana" id="dapana" placeholder="Nhập đáp án A" value="<?php echo $xuat['AnswerA']; ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                              <label for="dapanb">Đáp án B: </label>
                                                                              <input type="text" class="form-control" name="dapanb" id="dapanb" placeholder="Nhập đáp án B" value="<?php echo $xuat['AnswerB']; ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                              <label for="dapanc">Đáp án C: </label>
                                                                              <input type="text" class="form-control" name="dapanc" id="dapanc" placeholder="Nhập đáp án C" value="<?php echo $xuat['AnswerC']; ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                              <label for="dapand">Đáp án D: </label>
                                                                              <input type="text" class="form-control" name="dapand" id="dapand" placeholder="Nhập đáp án D" value="<?php echo $xuat['AnswerD']; ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                              <label for="dapandung">Đáp án đúng: </label>
                                                                              <input type="text" class="form-control" name="dapandung" id="dapandung" placeholder="Nhập đáp án đúng" value="<?php echo $xuat['Correct_Answer']; ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                              <label for="giaithich">Giải thích: </label>
                                                                              <textarea class="form-control" name="giaithich" id="giaithich" rows="3" placeholder="Giải thích lí do chọn" value=""><?php echo $xuat['Explanation']; ?></textarea>
                                                                            </div>
                                                            <?php
                                                                }
                                                            ?>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                          </div>
                                                        </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-------end modal---->
                                        <?php
                                            }
                                        ?>
                                      </tbody>
                                    </table>
                    <?php
                                }
                            }
                        }
                    ?>
                <p><br></p>
                <button id="toggle-table" class="btn btn-success">Summary List</button>
                <div style="display: none;" class="tab">
                    <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Tense</th>
                      <th scope="col">Questions</th>
                      <th scope="col">A</th>
                      <th scope="col">B</th>
                      <th scope="col">C</th>
                      <th scope="col">D</th>
                      <th scope="col">Correct</th>
                      <th scope="col">Explanation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $show = $a->show_grammar_question_list();
                        if(mysqli_num_rows($show) > 0)
                        {
                            while($row = mysqli_fetch_assoc($show))
                            {
                    ?>
                                    <tr>
                                      <th scope="row"><?php echo $row['tense_name']; ?></th>
                                      <td><?php echo $row['Grammar_question']; ?></td>
                                      <td><?php echo $row['AnswerA']; ?></td>
                                      <td><?php echo $row['AnswerB']; ?></td>
                                      <td><?php echo $row['AnswerC']; ?></td>
                                      <td><?php echo $row['AnswerD']; ?></td>
                                      <td><?php echo $row['Correct_Answer']; ?></td>
                                      <td><?php echo $row['Explanation']; ?></td>
                                    </tr>
                    <?php
                            }
                        }
                    ?>
                  </tbody>
            </table>
                </div>
                <script>
                  const toggleButton = document.getElementById('toggle-table');
                  const table = document.querySelector('.tab');
                
                  toggleButton.addEventListener('click', function(){
                    if (table.style.display === 'none') {
                      table.style.display = 'block';
                    }
                    else
                    {
                      table.style.display = 'none';
                    }
                  });
                </script>
            </div>
        </div>
    </main>
</body>

<?php
    include('footer.php');
?>