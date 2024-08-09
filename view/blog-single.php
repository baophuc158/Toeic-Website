<?php
  include("header.php");
  if($_SESSION['vt']=='QTHT')
    {
      echo '<script>alert("Bạn không được cấp quyền này !")</script>';
      echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    else
    {
      include_once('../controller/cBlog.php');
      $p= new CBLOG();
      $show = $p->show_baiviet($_GET['post']);
      $re = $p->show_binhluan($_GET['post']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!----Tiny Cloud---->
    <script src="https://cdn.tiny.cloud/1/igk5mcyc81tqdsoyrj1dlzsyluktbdszeav0m4vpqudchgt1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#binhluan'
      });
    </script>  
    <!----igk5mcyc81tqdsoyrj1dlzsyluktbdszeav0m4vpqudchgt1----> 
       
    <title>Diễn Đàn | Blog Post</title>
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
           <h2>Diễn đàn</h2>
           <ol class="breadcrumb">
            <li><a href="blog-archive.php">Home</a></li>            
            <li class="active">Diễn đàn</li>
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
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">

                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <a href=""><img alt="img" src="../assets/img/thaoluan.jpg"></a>
                          <?php
                            if($show)
                            {
                              if(mysqli_num_rows($show) > 0)
                              {
                                while($row = mysqli_fetch_assoc($show))
                                {
                                  ?>
                                  <figcaption class="mu-blog-caption">
                                    <h3><a href="#"><?php echo $row['TieuDe']; ?></a></h3>
                                  </figcaption>
                                  <div class="mu-blog-meta">
                                    <a href="#"><?php echo $row['MaUser']; ?></a>
                                    <a href="#"><?php echo $row['ngaydang']; ?></a>
                                    <span><i class="fa fa-comments-o"></i></span>
                                  </div>
                                  <div class="mu-blog-description">
                                    <?php echo $row['Baiviet']; ?>
                                  </div>
                                  <!-- start blog post tags -->
                                  <div class="mu-blog-tags">
                                    <ul class="mu-news-single-tagnav">
                                      <li>TAGS :</li>
                                      <li><a href="#"><?php echo $row['chuyenmuc']; ?></a></li>
                                      
                                    </ul>
                                  </div>
                                  <!-- End blog post tags -->
                                  <?php
                                } 
                              }
                              else
                              {
                                echo 'Không có dữ liệu !';
                              }
                            }
                          ?>
                                                
                        </figure>
                      </article>

                    </div>                                   
                  </div>
                </div>
                <!-- end course content container -->
                <!-- start blog comment -->
                <div class="row">
                  <div class="col-md-12"><br>
                  <?php
                    if(isset($_POST['dang']))
                    {
                      $mabv= $_POST['mabv'];
                      $MaUser= $_POST['MaUser'];
                      $vaitro= $_POST['vaitro'];   
                      $binhluan= $_POST['binhluan'];
                      $thoigianbl= $_POST['thoigianbl'];
                      if($mabv ==''|| $MaUser =='' || $vaitro =='' || $binhluan=='' || $thoigianbl =='')
                      {
                        echo 'Vui lòng nhập đủ thông tin !';
                      }
                      else
                      {
                        $kq = $p->cre_binhluan();
                        if($kq)
                        {
                          echo '<script>alert("thêm bình luận thành công !")</script>';
                          //echo '<script>window.location.href="blog-single.php"</script>';
                        }
                        else
                        {
                          echo '<script>alert("thêm bình luận không thành công !")</script>';
                          //echo '<script>window.location.href="blog-single.php"</script>';
                        }
                      }
                    }
                  ?>
                    <div>
                      <form action="" method="post">
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="mabv" id="mabv" value="<?php echo $_GET['post']; ?>">
                          </div>
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="MaUser" id="MaUser" value="<?php echo $_SESSION['ID']; ?>">
                          </div>
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="vaitro" id="vaitro" value="<?php echo $_SESSION['vt']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="binhluan">Viết bình luận: </label>
                            <textarea class="form-control" name="binhluan" id="binhluan" cols="60" rows="5"></textarea>
                          </div>
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="thoigianbl" id="thoigianbl" value="<?php echo date("m/d/y"); ?>">
                          </div>
                          <button type="submit" class="btn btn-primary btn-block" name="dang" id="dang" >Đăng bình luận</button>
                      </form>
                    </div>
                    <div class="mu-comments-area">
                      <h3>Comments</h3>
                      <?php
                        if(mysqli_num_rows($re) > 0)
                        {
                          while($row = mysqli_fetch_assoc($re))
                          {
                            ?>
                              
                              <div class="comments">
                                <ul class="commentlist">
                                  <li>
                                    <div class="media">
                                      <div class="media-left">    
                                        <img alt="img" src="../assets/img/7476-anya-this.png" class="media-object news-img">
                                      </div>
                                      <div class="media-body">
                                      <h4 class="author-name"><?php echo $row['MaUser']; ?></h4>
                                      <span class="comments-date"><?php echo $row['thoigianbl']; ?></span>
                                      <p><?php echo $row['Binhluan']; ?></p>
                                      <a class="reply-btn" href="#">Reply <span class="fa fa-long-arrow-right"></span></a>
                                      </div>
                                    </div>
                                  </li>
                                  
                                </ul>
                                <!-- comments pagination -->
                                
                              </div>
                            <?php
                          }
                        }
                      ?>
                    </div>
                  </div>
                </div>
                <!-- end blog comment -->
                
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Chuyên mục</h3>
                    <ul class="mu-sidebar-catg">
                      <li><a href="#">Thông báo</a></li>
                      <li><a href="">Hỏi - Đáp</a></li>
                      <li><a href="">Thảo luận</a></li>
                      <li><a href="">Hỗ trợ</a></li>
                    </ul>
                  </div>
                  <!-- end single sidebar -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

<?php
  }
  include("footer.php");
?>
  </body>
</html>