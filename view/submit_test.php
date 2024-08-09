<?php
    include("xacnhan.php");
    include('../controller/cTest.php');
    $p=new cTest();
    // if(isset($_POST['donetestL']))
    // {
    //     $MaDe = $_POST['made'];
    //     $diem=0;
    //     //print_r($questionID);
    //     foreach($_POST['questionID'] as $questionID)
    //     {
    //         if($_REQUEST['dapandung_'.$questionID]==$_REQUEST['dapan_'.$questionID])
    //         {
    //             $diem++;
    //         }
    //     }
    //     $diemket = $diem*5;
    //     if($diemket == 0)
    //     {
    //         $diemket = 5;
    //     }
    //     $p->rediemL($_SESSION['ID'], $diemket, $MaDe);
    //     if($diemket==5)
    //     {  
    //         echo '<script>alert("Rất tiếc! Bạn cần cải thiện nhiều hơn!")</script>';
    //         echo '<script>window.location.href="DoTest.php?L='.$diemket.'&test='.$MaDe.'"</script>';
    //     }
    //     else
    //     {
    //         echo '<script>alert("Bạn đã đúng '.$diem.' câu! Điểm Listening là '.$diemket.' điểm!")</script>';
    //         echo '<script>window.location.href="DoTest.php?L='.$diemket.'&test='.$MaDe.'"</script>';
    //     }
    // }
    if(isset($_POST['donetestR']))
    {
        $MaDe = $_POST['made'];
        $diemL = $_POST['diemL'];
        $diem=0;
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
            $diemket = 5;
        }
        $p->rediemR($_SESSION['ID'], $diemket, $diemL, $MaDe);
        if($diemket==5)
        {  
            echo '<script>alert("Rất tiếc! Bạn cần cải thiện nhiều hơn!")</script>';
            echo '<script>window.location.href="404.php"</script>';
        }
        else
        {
            echo '<script>alert("Bạn đã đúng '.$diem.' câu! Điểm Reading là '.$diemket.' điểm!")</script>';
            echo '<script>window.location.href="404.php"</script>';
        }
    }
?>