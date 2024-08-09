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
      $re= $p->show_title();
      if(isset($_POST['posts']))
      {
        $mabv= $_POST['mabv'];
        $TieuDe= $_POST['TieuDe'];
        $Mota= $_POST['Mota'];   
        $noidung= $_POST['noidung']; 
        $chuyenmuc= $_POST['chuyenmuc'];
        $MaUser= $_POST['mand'];
        $ngaydang= $_POST['ngaydang'];
        if($mabv ==''|| $TieuDe =='' || $Mota =='' || $noidung=='' || $chuyenmuc =='' || $MaUser =='' || $ngaydang =='')
        {
          
          echo '<script>alert("Vui lòng nhập đủ thông tin !")</script>';
        }
        else
        {
          $kq = $p->cre_post();
          if($kq)
          {
            echo '<script>alert("thêm bài viết thành công !")</script>';
            echo '<script>window.location.href="blog-archive.php"</script>';
          }
          else
          {
            echo '<script>alert("Thêm bài viết không thành công !")</script>';
            echo '<script>window.location.href="blog-archive.php"</script>';
          }
        }
      }
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
        selector: '#noidung'
      });
    </script>  
    <!----igk5mcyc81tqdsoyrj1dlzsyluktbdszeav0m4vpqudchgt1---->
    <title>ATI | Diễn đàn</title>
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
            <li><a href="index.php">Trang chủ</a></li>            
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
                <div class="mu-course-container mu-blog-archive">
                
                  <div class="row">
                  <?php
                    if(mysqli_num_rows($re) > 0)
                    {
                      while($row = mysqli_fetch_assoc($re))
                      {
                        ?>
                        <div class="col-md-6 col-sm-6">
                          <article class="mu-blog-single-item">
                            <figure class="mu-blog-single-img">
                              <a href="blog-single.php?post=<?php echo $row['MaBV']; ?>"><img src="../assets/img/blogg.png" alt="img"></a>
                              <figcaption class="mu-blog-caption">
                                <h3><a href="blog-single.php?post=<?php echo $row['MaBV']; ?>"><?php echo $row['TieuDe']; ?></a></h3>
                              </figcaption>                      
                            </figure>
                            <div class="mu-blog-meta">
                              <a href="blog-single.php?post=<?php echo $row['MaBV']; ?>">By <?php echo $row['MaUser']; ?></a>
                              <a href="blog-single.php?post=<?php echo $row['MaBV']; ?>">Ngày đăng: <?php echo $row['ngaydang']; ?></a>
                              <span><i class="fa fa-comments-o"></i></span>
                            </div>
                            <div class="mu-blog-description">
                              <p><?php echo $row['Mota']; ?></p>
                              <a class="mu-read-more-btn" href="blog-single.php?post=<?php echo $row['MaBV']; ?>">Read More</a>
                            </div>
                          </article> 
                        </div> 
                        <?php 
                      }
                    }
                    else
                    {
                      echo 'Chưa có bài viết nào !';
                    }
                  ?>
                    
                  </div>
                  
                </div>
                <!-- end course content container -->
                <!-- start course pagination -->
                <div class="mu-pagination">
                  <nav>
                    <ul class="pagination">
                      <li>
                        <a href="#" aria-label="Previous">
                          <span class="fa fa-angle-left"></span> Prev 
                        </a>
                      </li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li>
                        <a href="#" aria-label="Next">
                         Next <span class="fa fa-angle-right"></span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <!-- end course pagination -->
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Bạn có vấn đề thắc mắc?</h3>
                    <p>Hãy tạo chủ đề thảo luận ngay !</p>
                    
                    <!----------Modal thảo luận------------>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#blog">
                      Tạo chủ đề thảo luận
                    </button>
                  <form action="" method="post">
                    <!-- Modal -->
                    <div class="modal fade" id="blog" tabindex="-1" role="dialog" aria-labelledby="blogTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 style="text-align: center; font-weight: bold; font-family: ubuntu, san-serif;" class="modal-title" id="exampleModalLongTitle">Tạo chủ đề thảo luận</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            
                              <div class="form-group">
                                <label for="mabv">Mã bài viết: </label>
                                <input type="text" class="form-control" name="mabv" id="mabv">
                              </div>
                              <div class="form-group">
                                <label for="TieuDe">Tiêu đề: </label>
                                <input type="text" class="form-control" name="TieuDe" id="TieuDe">
                              </div>
                              <div class="form-group">
                                <label for="Mota">Mô tả ngắn: </label>
                                <input type="text" class="form-control" name="Mota" id="Mota">
                              </div>
                              <div class="form-group">
                                <label for="chuyenmuc">Chuyên mục: </label>
                                  <select class="form-control" name="chuyenmuc" id="chuyenmuc">
                                    <option value="chon">...</option>
                                    <option value="thongbao">Thông báo</option>
                                    <option value="hoidap">Hỏi - Đáp</option>
                                    <option value="thaoluan">Thảo luận</option>
                                    <option value="hotro">Hỗ trợ</option>
                                  </select>
                              </div>
                                <input type="hidden" class="form-control" name="mand" id="mand" value="<?php echo $_SESSION['ID']; ?>">
                                <input type="hidden" name="ngaydang" id="ngaydang" value="<?php echo date("m/d/y"); ?>">
                              <div class="form-group">
                                <label for="noidung">Nội dung bài viết: </label>
                                <textarea class="form-control" name="noidung" id="noidung" cols="30" rows="50"></textarea>
                              </div>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" name="posts" id="posts" class="btn btn-primary">Đăng bài viết</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!------------------------------------->
                  </form>
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
  include("footer.php");
?>
  </body>
</html>