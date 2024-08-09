<?php
    include("xacnhan.php");
    include('../controller/cLT_review.php');
    $p=new cLT_review();
    if(isset($_POST['done_review']))
    {
        $MaLT = $_POST['malt'];
        $diem=0;
        //print_r($questionID);
        foreach($_POST['questionID'] as $questionID)
        {
            if($_REQUEST['dapandung_'.$questionID]==$_REQUEST['dapan_'.$questionID])
            {
                $diem++;
            }
        }
        $diemket = $diem*5;
        if($diemket == 0)
        {
            $diemket = 10;
        }
        $p->re_diem_review($_SESSION['ID'], $diemket, $MaLT);
        if($diemket==10)
        {  
            echo '<script>alert("Rất tiếc! Bạn cần cải thiện nhiều hơn!")</script>';
            //echo '<script>window.location.href="course_route.php"</script>';
            echo '<script>window.location.href="course_route.php?route='.$MaLT.'&user='.$_SESSION['ID'].'"</script>';
        }
        else
        {
            echo '<script>alert("Bạn đã đúng '.$diem.' câu! Tổng điểm là '.$diemket.' điểm!")</script>';
            //echo '<script>window.location.href="course_route.php"</script>';
            echo '<script>window.location.href="course_route.php?route='.$MaLT.'&user='.$_SESSION['ID'].'"</script>';
        }
    }
?>