<?php
  include("header.php");
  if($_SESSION['vt']=='QTHT')
  {
    echo '<script>alert("Bạn không được cấp quyền này!")</script>';
    echo '<script>window.location.href="../Admin/index.php"</script>';
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
    <title>ATI | Nội dung ôn</title>

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
            <h2>Nội dung ôn</h2>
            <ol class="breadcrumb">
            <li><a href="index.php">Trang chủ</a></li>            
            <li class="active">Nội dung ôn</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End breadcrumb -->
  <!-- Start gallery  -->
  <section id="mu-gallery">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-gallery-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>♦ Choose 1 part ♦</h2>
            <p>"Genius is one percent inspiration and ninety-nine percent perspiration! – Thomas Edison"</p>
          </div>
          <!-- end title -->
          <!-- start gallery content -->
          <div class="mu-gallery-content">
            <!-- Start gallery menu -->
            <div class="mu-gallery-top">              
              <ul>
                <li class="filter active" data-filter="all">All</li>
                <li class="filter" data-filter=".listen">Listening</li>
                <li class="filter" data-filter=".read">Reading</li>
              </ul>
            </div>
            <!-- End gallery menu -->
            <div class="mu-gallery-body">
              <ul id="mixit-container" class="row">
                <!-- start single gallery image -->
                <li class="col-md-4 col-sm-6 col-xs-12 mix listen">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="#"><img alt="L1" src="../assets/img/gallery/small/1.jpg"></a>
                      </div>
                      <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4>Listening Part 1</h4>
                          <p>Mô tả tranh</p>
                          <a href="../view/L1.php" class="aa-link"><span class="fa fa-link"></span></a>
                        </div>
                      </div>                  
                    </div>
                  </div>
                </li>
                <!-- start single gallery image -->
                <li class="col-md-4 col-sm-6 col-xs-12 mix listen">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="L1.php"><img alt="img" src="../assets/img/gallery/small/2.jpg"></a>
                      </div>
                        <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4>Listening Part 2</h4>
                          <p>Hỏi - Đáp</p>
                          <a href="L2.php" class="aa-link"><span class="fa fa-link"></span></a>
                        </div>
                      </div> 
                    </div>
                  </div>
                </li>
                <!-- start single gallery image -->
                <li class="col-md-4 col-sm-6 col-xs-12 mix listen">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="#"><img alt="img" src="../assets/img/gallery/small/3.jpg"></a>
                      </div>
                      <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4>Listening Part 3</h4>
                          <p>Đoạn hội thoại</p>
                          <a href="L3.php" class="aa-link"><span class="fa fa-link"></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- start single gallery image -->
                <li class="col-md-4 col-sm-6 col-xs-12 mix listen">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="#"><img alt="img" src="../assets/img/gallery/small/4.jpg"></a>
                      </div>
                        <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4>Listening Part 4</h4>
                          <p>Bài nói ngắn</p>
                          <a href="L4.php" class="aa-link"><span class="fa fa-link"></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- start single gallery image -->
                <li class="col-md-4 col-sm-6 col-xs-12 mix read">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="#"><img alt="img" src="../assets/img/gallery/small/5.jpg"></a>
                      </div>
                      <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4>Reading Part 5</h4>
                          <p>Hoàn thành câu</p>
                          <a href="R5.php" class="aa-link"><span class="fa fa-link"></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- start single gallery image -->
                <li class="col-md-4 col-sm-6 col-xs-12 mix read">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="#"><img alt="img" src="../assets/img/gallery/small/6.jpg"></a>
                      </div>
                        <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4>Reading Part 6</h4>
                          <p>Hoàn thành đoạn văn</p>
                          <a href="R6.php" class="aa-link"><span class="fa fa-link"></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- start single gallery image -->
                <li class="col-md-4 col-sm-6 col-xs-12 mix read">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="#"><img alt="img" src="../assets/img/gallery/small/7.jpg"></a>
                      </div>
                      <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4>Reading Part 7</h4>
                          <p>Đọc hiểu</p>
                          <a href="R7.php" class="aa-link"><span class="fa fa-link"></span></a>
                        </div>
                      </div>             
                    </div>
                  </div> 
                </li>
                  
          <!-- end gallery content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End gallery  -->


  </body>
</html>
<?php    
  }
  include("footer.php");
?>