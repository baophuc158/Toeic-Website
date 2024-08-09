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
    <title>Xem danh sách câu hỏi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <li><a href="gallery.php">Nội dung ôn</a></li>            
                    <li class="active">Xem Danh Sách câu hỏi</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
        </section>
    <!-- End breadcrumb -->
    <div class="container">
        <div class="row">
          <div class="col-2"></div>
          <div class="col-7">
            <div class="tit"><h2>QUESTION AND ANSWER LIST OF PART <?php echo $_GET['Part'];?></h2></div>
            <!--------------------------------------------------->
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
                    include('../controller/cch.php');
                    $p = new cCH();
                    $show = $p->xuatDSCH_QLTL($_GET['Part']);
                    if(mysqli_num_rows($show) > 0)
                    {
                      while($row = mysqli_fetch_assoc($show))
                      {
                         $MaDV = $row['MaDV'];
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
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" id="<?php echo $MaDV; ?>" data-target="#exampleModal_<?php echo $MaDV; ?>"><i class="fa-solid fa-file"></i></button></td>
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
                            <!---------------------------Modal------------------------->
                            <div class="modal fade bd-example-modal-lg" id="exampleModal_<?php echo $MaDV; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Xem đoạn văn</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                <div class="modal-body">
                                <?php
                                    $hien = $p->rettdv($MaDV);
                                    while($hang = mysqli_fetch_assoc($hien))
                                    {
                                ?>
                                            <p><?php echo $hang['NoidungDV']; ?></p>
                                <?php
                                    }
                                ?>
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!---------------------------End modal------------------------->
                        <?php
                      }
                    }
                ?>
              </tbody>
            </table>
          <!----------------------------------------------------->
          </div>
          <div class="col-3"></div>
        </div> 
      </div>
    <!------------------------------------------------------->
<?php
    }
    include('footer.php');
?>
</body>
</html>