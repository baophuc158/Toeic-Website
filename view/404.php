<?php
    include("header.php");
    if($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    elseif($_SESSION['vt']=='HV')
    {
        include ('../controller/cTest.php');
        $p= new cTest();
        $made = $p->reRandomT();
        while($row = mysqli_fetch_assoc($made))
        {
            $testcode = $row['MaDe'];
        }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>ATI | Làm bài kiểm tra</title>
    <style>
      #ktra{
        border: 1px solid;
        border-radius: 15px;
        margin-top: 20px;
        margin-bottom: 20px;
        background-color: hsl(206, 92%, 94%);
        box-shadow: 2px 2px 3px;
      }
    </style>
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
           <h2>Làm bài kiểm tra</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Trang chủ</a></li>            
            <li class="active">Test</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

  <!-- Start error section  -->
  <section id="doTest">
    <div class="container">
      <div class="row">
       
        <div id ="ktra" style="text-align: center; padding: 50px;" class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
          <p>Thời gian làm bài: 120 phút</p>
          <p>Số lượng câu hỏi: 70</p>
          <p>Số lượng part: 7</p>
            <div class="pic">
                <img src="#" alt="">
            </div>
              <a href="TestL.php?test=<?php echo $testcode; ?>"><button type="submit" class="btn btn-primary">Take Test !</button></a>
        </div>
        
      </div>
    </div>
  </section>
 <!-- End error section  -->
<?php
    }
    else
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
    include("footer.php");
?>
  </body>
</html>