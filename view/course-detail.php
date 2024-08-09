<?php
  include("header.php");
  if($_SESSION['vt']=='QTHT')
    {
      echo '<script>alert("Bạn không được cấp quyền này !")</script>';
      echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    else
    {
      include('../controller/clt.php');
      $p= new cLT();
      $malt=$p->relt($_GET['MaLT']);
      $c=mysqli_num_rows($malt);
      if($c>0)
      {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>ATI | Lộ trình</title>

  </head>
  <body>
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Lộ trình chi tiết</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Trang chủ</a></li>            
            <li class="active">Course Detail</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <form action="" method="POST">
                <!-- start course content container -->
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <a href="#"><img src="../assets/img/courses/study.jpg" alt="img"></a>
                          <figcaption class="mu-latest-course-imgcaption">
                            <?php
                              while($row=mysqli_fetch_assoc($malt))
                              {
                            ?>
                            <input type="hidden" name="malt" id="malt" value="<?php echo $row['MaLT']; ?>">
                            <a href="#"><?php echo $row['TenLT']; ?></a>
                            <span><i class="fa fa-clock-o"></i><?php echo $row['Thoigian']; ?>Days</span>
                          </figcaption>
                        </figure>
                        <div class="mu-latest-course-single-content">
                          <h2><a href="#">Lộ trình TOEIC dành cho bạn !</a></h2>
                          <h4>Thông tin chung cho tất cả lộ trình</h4>
                          <ul>
                            <li> <span>Đối tượng</span> <span>Everyone</span></li>
                            <li> <span>Thời gian dự đoán</span> <span>1-6 tháng</span></li>
                            <p><br></p>
                                <?php 
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $date_begin = time();
                                ?>
                            <i class="fas fa-arrow-circle-down"></i><h4>Hãy chọn thời gian bắt đầu và kết thúc trước khi nhận lộ trình: </h4>
                            <li><span>Bắt đầu</span>Thời gian tính từ ngày nhận lộ trình <input type="hidden" id="start-time" name="start-time" 
                            value="<?php echo(date("Y-m-d h:m:s",$date_begin)); ?>" readonly></li>
                            <li><span>Kết thúc</span> 
                                <select name="end-time" id="end-time" style="width: 200px; border: 2px solid black; border-radius: 10px;" class="text-center">
                                    <option value="<?php $date_end = strtotime("+1 week", $date_begin);
                                      echo date("Y-m-d h:i:s", $date_end); ?>">7 ngày
                                    </option>
                                    <option value="<?php $date_end = strtotime("+2 week", $date_begin);
                                      echo date("Y-m-d h:i:s", $date_end); ?>">14 ngày
                                    </option>
                                    <option value="<?php $date_end = strtotime("+1 month", $date_begin);
                                      echo date("Y-m-d h:i:s", $date_end); ?>">30 ngày
                                    </option>
                                    <option value="<?php $date_end = strtotime("+2 month", $date_begin);
                                      echo date("Y-m-d h:i:s", $date_end); ?>">60 ngày
                                    </option>
                                    <option value="<?php $date_end = strtotime("+3 month", $date_begin);
                                      echo date("Y-m-d h:i:s", $date_end); ?>">90 ngày
                                    </option>
                                    <option value="<?php $date_end = strtotime("+6 month", $date_begin);
                                      echo date("Y-m-d h:i:s", $date_end); ?>">180 ngày
                                    </option>
                                </select>
                            </li>
                          </ul>
                          <h4>Suggestion</h4>
                          <pre><?php echo $row['Dexuat']; ?></pre>
                          
                        </div>
                      </div> 
                    </div>                                   
                  </div>
                </div>
                            <?php
                              }
                            ?>
                            
                <!-- end course content container -->
                <?php
                  if($_SESSION['vt']=='HV')
                  {
                    ?>
                    <button class="btn btn-primary btn btn-block" name="accept" id="accept" type="submit" onclick="return confirm('Bạn có chắc chắn muốn nhận lộ trình?')">Nhận lộ trình</button>
                    <?php
                    if(isset($_POST['accept']))
                    {
                      date_default_timezone_set('Asia/Ho_Chi_Minh');
                      $malt=$_REQUEST['malt'];
                      $mahv = $_SESSION['ID'];
                      $tenlt = $_GET['MaLT'];
                      $take = $p->rehvlt($mahv);
                      $show = $p->time_lt($mahv,$tenlt);
                      if($show && $take)
                      {
                        echo "<script>alert('Nhận lộ trình thành công')</script>";
                        echo '<script>window.location.href="course_route.php?route=' . $malt . '&user='.$mahv.'"</script>';
                      }
                      else
                      {
                        echo "<script>alert('Lỗi nhận lộ trình')</script>";
                      }
                    }
                  }
                  elseif($_SESSION['vt']=='QLTL')
                  {
                    ?>
                    <a href="update-course-detail.php?MaLT=<?php echo $_GET['MaLT'] ?>"><button class="btn btn-primary btn btn-block" type="button">Cập nhật lộ trình</button></a>
                    <?php
                  }
                ?>
                </form>
              </div>
              <div class="col-md-3">     
                  
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
<?php
      }
      else
      {
        echo 'Không có dữ liệu';
      }
?>

<?php
  }
  include("footer.php");
?>
  </body>
</html>