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
    <title>Xem danh sách câu hỏi theo mã đề</title>
</head>
<body>
    <!-- Page breadcrumb -->
        <section id="mu-page-breadcrumb">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                <h2>Q&A List</h2>
                <ol class="breadcrumb">
                    <li><a href="404.php">Test</a></li>            
                    <li class="active">Xem danh sách câu hỏi theo mã đề</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
        </section>
    <!-- End breadcrumb -->
    <div class="container">
        <div class="row">
          <div class=""></div>
          <div class="">
            <div class="tit"><h2>QUESTION AND ANSWER LIST OF TEST</h2></div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="made">Mã đề: </label>
                    <select class="form-control" name="made" id="made" onchange="showQuestions()">
                        <option>Select one</option>
                        <?php
                            include('../controller/cTest.php');
                            $p = new cTest();
                            $code = $p->reTestCode();
                            while($hang = mysqli_fetch_assoc($code))
                            {
                                ?>
                                    <option value="<?php echo $hang['MaDe']; ?>"><?php echo $hang['MaDe']; ?></option>
                                    <script>
                                        var macode = document.getElementById('made');
                                        macode.addEventListener('change', function() {
                                            var selectedValue = macode.value;
                                            console.log(selectedValue);
                                        });
                                    </script>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </form>
            <div id="question_list"></div>
            <!--------------------------------------------------->
            <!-------------<button id="toggle-table" class="btn btn-success btn-block">Questions List</button>
            <div style="display: none;" class="tab">
                <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Mã CH</th>
                  <th scope="col">Mã Part</th>
                  <th scope="col">Câu hỏi </th>
                  <th scope="col">Đáp án A</th>
                  <th scope="col">Đáp án B</th>
                  <th scope="col">Đáp án C</th>
                  <th scope="col">Đáp án D</th>
                  <th scope="col">Đáp án đúng</th>
                  <th scope="col">Mã Đoạn văn</th>
                  <th scope="col">ND Đoạn văn</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Tùy chọn</th>
                </tr>
              </thead>
              <tbody>
                <?php
                
                    $show = $p->reQuestion('test2');//mã đề theo filter
                    if(mysqli_num_rows($show) > 0)
                    {
                      while($row = mysqli_fetch_assoc($show))
                      {
                        ?>
                            <tr>
                                <td><?php echo $row['MaCH']; ?></td>
                                <td><?php echo $row['MaPart']; ?></td>
                                <td><?php echo $row['Cauhoi']; ?></td>
                                <td><?php echo $row['DapanA']; ?></td>
                                <td><?php echo $row['DapanB']; ?></td>
                                <td><?php echo $row['DapanC']; ?></td>
                                <td>
                                    <?php
                                    if($row['DapanD'] == '' || $row['DapanD'] == 'null')
                                    {
                                        echo '(trống)';
                                    }
                                    else
                                    {
                                        echo $row['DapanD']; 
                                    }
                                    ?>
                                </td>
                                <td><?php echo $row['DapanDung']; ?></td>
                                <td><?php echo $row['MaDV']; ?></td>
                                <?php
                                    if($row['MaDV']!=0)
                                    {
                                ?>
                                        <td><?php echo $row['NoidungDV']; ?></td>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                        <td>(trống)</td>
                                <?php
                                    }
                                ?>
                                <td>
                                    <?php 
                                    if($row['Hinh'] == '')
                                    {
                                        echo '(trống)';
                                    }
                                    else
                                    {
                                        echo $row['Hinh'];
                                    }
                                    ?>
                                </td>
                                <td><a href="update-question.php?id=<?php echo $row['MaCH']; ?>"><button type="button" class="btn btn-primary">Update</button></a></td>
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
            </script>--->
          <!----------------------------------------------------->
          </div>
          <div class=""></div>
        </div> 
      </div>
    <!------------------------------------------------------->
<?php
    }
    include('footer.php');
?>
</body>
<script>
    function showQuestions() 
    {
        var made = $('#made').val();
        $.ajax({
            url: '../model/ajax_Test_code.php',
            type: 'POST',
            data: {made: made},
            dataType: 'json',
            success: function(data) {
                var output = '';
                output += '<table class="table table-striped table-bordered">';
                output += '<thead><tr><th>Mã Part</th><th>Mã câu hỏi</th><th>Câu hỏi</th><th>Đáp án A</th><th>Đáp án B</th><th>Đáp án C</th><th>Đáp án D</th><th>Đáp án đúng</th><th>Mã ĐV</th><th>Hình</th></tr></thead><tbody>';
                for(var i = 0; i < data.length; i++) {
                    output += '<tr>';
                    output += '<td>' + data[i].MaPart + '</td>';
                    output += '<td>' + data[i].MaCH + '</td>';
                    output += '<td>' + data[i].Cauhoi + '</td>';
                    output += '<td>' + data[i].DapanA + '</td>';
                    output += '<td>' + data[i].DapanB + '</td>';
                    output += '<td>' + data[i].DapanC + '</td>';
                    output += '<td>' + data[i].DapanD + '</td>';
                    output += '<td>' + data[i].DapanDung + '</td>';
                    output += '<td>' + data[i].MaDV + '</td>';
                    output += '<td>' + data[i].Hinh + '</td>';
                    //output += '<td>' + data[i].NoidungDV + '</td>';
                    output += '</tr>';
                }
                output += '</tbody></table>';
                $('#question_list').html(output);
            }
        });
    }
</script>
</html>