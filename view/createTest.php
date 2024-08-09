<?php
    include("header.php");
    if($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    elseif($_SESSION['vt']=='HV')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
    else
    {
        include_once('../controller/cTest.php');
        include_once('db.php');
        $p= new cTest();
        $part1 = $p->reL1();
        while($row = mysqli_fetch_assoc($part1)){
          $repart1[] = [
              0 => $row['MaCH'], 
              1 => $row['MaDV']
            ];
        }
        $part2 = $p->reL2();
        while($row = mysqli_fetch_assoc($part2)){
          $repart2[] = [
              0 => $row['MaCH'], 
              1 => $row['MaDV']
            ];
        }
        $part3 = $p->reL3();
        while($row = mysqli_fetch_assoc($part3)){
          $repart3[] = [
              0 => $row['MaCH'], 
              1 => $row['MaDV']
            ];
        }
        $part4 = $p->reL4();
        while($row = mysqli_fetch_assoc($part4)){
          $repart4[] = [
              0 => $row['MaCH'], 
              1 => $row['MaDV']
            ];
        }
        $part5 = $p->reR5();
        while($row = mysqli_fetch_assoc($part5)){
          $repart5[] = [
              0 => $row['MaCH'], 
              1 => $row['MaDV']
            ];
        }
        $part6 = $p->reR6();
        while($row = mysqli_fetch_assoc($part6)){
          $repart6[] = [
              0 => $row['MaCH'], 
              1 => $row['MaDV']
            ];
        }
        $part7 = $p->reR7();
        while($row = mysqli_fetch_assoc($part7)){
          $repart7[] = [
              0 => $row['MaCH'], 
              1 => $row['MaDV']
            ];
        }
        $testP = array_merge($repart1, $repart2, $repart3, $repart4, $repart5, $repart6, $repart7);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>ATI | Tạo bài kiểm tra</title>
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
            <h2>Tạo bài kiểm tra</h2>
            <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>            
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
        <a href="xemDSTest.php"><button class="btn btn-primary">Question list of test code</button></a><hr>
            <!-- Form random test -->
            <form action="" method="post">
                <input type="text" name="testID" id="testID" placeholder="Input ID test" required>
                <?php
                    $count = 0;
                	foreach($testP as $row)
                	{
                	?>
                		<input type="hidden" name='paraID<?php echo $count; ?>' value="<?php echo $row[1]; ?>">
                		<input type="hidden" name='questID<?php echo $count; ?>' value="<?php echo $row[0]; ?>">
                	<?php
                	    $count++;
                	}
                ?>
                <button type="submit" name="gui" id="gui">Create Test</button>
                <?php
                    if(isset($_POST['gui']))
                	{
                	    $testID = $_POST['testID'];
                	    if($testID == ' ')
                	    {
                	        echo '<script>alert("Vui lòng nhập mã đề thi")</script>';
                            echo '<script>window.location.href="404.php"</script>';
                	    }
                	    else
                	    {
                	        $test = $p->reIDTest($testID, $_SESSION['ID']);
                	        if($test)
                	        {
                	            for ($i=0; $i < count($testP) ; $i++) 
                            	{ 
                            		# code...
                            		$paraID = $_REQUEST['paraID'.$i];
                            		$questID = $_REQUEST['questID'.$i];
                            		$sql="INSERT INTO dekiemtra_doanvan_noidungon(MaDe, MaDV, MaCH) VALUES('$testID', '$paraID', '$questID')";
                                    $query=mysqli_query($conn,$sql);
                                }
                    		    echo '<script>alert("Create Test '.$_POST['testID'].' Success !")</script>';
                	        }
                	    }
                	}
                ?>
            </form>
        </div>
        
      </div>
    </div>
  </section>
  <!-- End error section  -->
    <?php
    }
    include("footer.php");
    ?>
  </body>
</html>