<?php
  include("header.php");
  if($_SESSION['vt']=='QTHT')
    {
      echo '<script>alert("Bạn không được cấp quyền này !")</script>';
      echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    else
    {
        if($_SESSION['vt']=='HV')
        {
           $check=$p->rediem($_SESSION['ID']);
           include('../controller/cLT_user.php');
           $minz= new cLT_user();
           $show = $minz->lotrinh_nguoidung($_SESSION['ID']);
           while($puiz = mysqli_fetch_assoc($show))
           {
               if($puiz['user'] == $_SESSION['ID'] && $puiz['route_status'] == 'studying')
               {
                   echo '<script>window.location.href="course_route.php?route='.$puiz['route_name'].'&user='.$puiz['user'].'"</script>';
               }
           }
            if(mysqli_num_rows($check)>0)
            {
            ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">   
    <title>ATI | Lộ trình</title>

  </head>
  <body>
  <!--START SCROLL TOP BUTTON -->
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
           <h2>Lộ trình</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Trang chủ</a></li>            
            <li class="active">Lộ trình</li>
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
                <!-- start course content container -->
                <div class="mu-course-container">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=400"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=400">Toeic 400+</a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=400">Lộ trình TOEIC 400+</a></h4>
                        <p><i class="fa-solid fa-book"></i><strong> Lộ trình cho những người đã từng làm quen hoặc mới bắt đầu với TOEIC.</strong></p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=400">Details</a>
                          
                        </div>
                      </div>
                    </div> 
                  </div>                  
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=500"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=500">Toeic 500+ </a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=500">Lộ trình TOEIC 500+</a></h4>
                        <p><i class="fa-solid fa-book-medical"></i><strong> Lộ trình cho những người đã đạt trình độ sơ cấp với TOEIC.</strong></p>                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=500">Details</a>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=600"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=600">Toeic 600+</a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=600">Lộ trình TOEIC 600+</a></h4>
                        <p><i class="fa-solid fa-book-open"></i><strong> Lộ trình cho những người đã đạt trình độ trung cấp với TOEIC.</strong></p>                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=600">Details</a>
                          
                        </div>
                      </div>
                    </div> 
                  </div>                  
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=700"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=700">Toeic 700+ </a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=700">Lộ trình TOEIC 700+</a></h4>
                        <p><i class="fa-sharp fa-solid fa-book-tanakh"></i><strong> Lộ trình cho những người đã đạt trình độ cao cấp với TOEIC.</strong></p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=700">Details</a>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=800"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=800">Toeic 800+</a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=800">Lộ trình TOEIC 800+</a></h4>
                        <p><i class="fa-sharp fa-solid fa-book-quran"></i><strong> Lộ trình cho những người đã đạt trình độ siêu cấp trở lên với TOEIC.</strong></p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=800">Details</a>
                          
                        </div>
                      </div>
                    </div> 
                  </div>                  
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=900"><img src="../assets/img/study.jpg" alt="img" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=900">Toeic 900+ </a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=900">Lộ trình TOEIC 900+</a></h4>
                        <p><i class="fa-sharp fa-solid fa-book-bible"></i><strong> Thank God you're here ! .</strong></p><br>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=900">Details</a>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
                <!-- end course content container -->
                
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Quotes: </h3>
                    <!--------------------------------->
                    <div>
                      <blockquote><i>Genius is one percent inspiration and ninety-nine percent perspiration!</i><hr></blockquote><p style="float: right;">Thomas Edison</p>
                    </div>
                    <!--------------------------------->
                  </div>
                  <!-- end single sidebar -->

                </aside>
                <!-- / end sidebar -->
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
                echo '<script>alert("Vui lòng làm kiểm tra đầu vào trước khi chọn lộ trình !")</script>';
                echo '<script>window.location.href="404.php"</script>';
            } 
        }
        else
        {
                        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">   
    <title>ATI | Lộ trình</title>

  </head>
  <body>
  <!--START SCROLL TOP BUTTON -->
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
           <h2>Lộ trình</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Trang chủ</a></li>            
            <li class="active">Lộ trình</li>
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
                <!-- start course content container -->
                <div class="mu-course-container">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=400"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=400">Toeic 400+</a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=400">Lộ trình TOEIC 400+</a></h4>
                        <p><i class="fa-solid fa-book"></i><strong> Lộ trình cho những người đã từng làm quen hoặc mới bắt đầu với TOEIC.</strong></p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=400">Details</a>
                          
                        </div>
                      </div>
                    </div> 
                  </div>                  
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=500"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=500">Toeic 500+ </a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=500">Lộ trình TOEIC 500+</a></h4>
                        <p><i class="fa-solid fa-book-medical"></i><strong> Lộ trình cho những người đã đạt trình độ sơ cấp với TOEIC.</strong></p>                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=500">Details</a>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=600"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=600">Toeic 600+</a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=600">Lộ trình TOEIC 600+</a></h4>
                        <p><i class="fa-solid fa-book-open"></i><strong> Lộ trình cho những người đã đạt trình độ trung cấp với TOEIC.</strong></p>                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=600">Details</a>
                          
                        </div>
                      </div>
                    </div> 
                  </div>                  
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=700"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=700">Toeic 700+ </a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=700">Lộ trình TOEIC 700+</a></h4>
                        <p><i class="fa-sharp fa-solid fa-book-tanakh"></i><strong> Lộ trình cho những người đã đạt trình độ cao cấp với TOEIC.</strong></p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=700">Details</a>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=800"><img src="../assets/img/study.jpg" alt="img" width="750" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=800">Toeic 800+</a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=800">Lộ trình TOEIC 800+</a></h4>
                        <p><i class="fa-sharp fa-solid fa-book-quran"></i><strong> Lộ trình cho những người đã đạt trình độ siêu cấp trở lên với TOEIC.</strong></p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=800">Details</a>
                          
                        </div>
                      </div>
                    </div> 
                  </div>                  
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="course-detail.php?MaLT=900"><img src="../assets/img/study.jpg" alt="img" height="300"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="course-detail.php?MaLT=900">Toeic 900+ </a>
                          <span><i class="fa fa-clock-o"></i>Có thể nhận từ 7-180 ngày</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="course-detail.php?MaLT=900">Lộ trình TOEIC 900+</a></h4>
                        <p><i class="fa-sharp fa-solid fa-book-bible"></i><strong> Thank God you're here ! .</strong></p><br>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-details" href="course-detail.php?MaLT=900">Details</a>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
                <!-- end course content container -->
                
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Quotes: </h3>
                    <!--------------------------------->
                    <div>
                      <blockquote><i>Genius is one percent inspiration and ninety-nine percent perspiration!</i><hr></blockquote><p style="float: right;">Thomas Edison</p>
                    </div>
                    <!--------------------------------->
                  </div>
                  <!-- end single sidebar -->

                </aside>
                <!-- / end sidebar -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <?php
        }
  }
  include("footer.php");
?>
  </body>
</html>