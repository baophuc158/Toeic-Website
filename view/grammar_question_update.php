<?php
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $question = $_POST['cauhoi'];
        $a = $_POST['dapana'];
        $b = $_POST['dapanb'];
        $c = $_POST['dapanc'];
        $d = $_POST['dapand'];
        $correct = $_POST['dapandung'];
        $ex = $_POST['giaithich'];
        include_once('../controller/cGrammar_Q.php');
        $a=new cGrammar();
        $minz = $a->capnhat_cauhoi();
        if($minz)
        {
            echo '<script>alert("Cập nhật thành công !")</script>';
            echo "<script> window.location.href = 'grammar_question_list.php'; </script>";
        }
        else
        {
            echo '<script>alert("Cập nhật không thành công !!!")</script>';
            echo "<script> window.location.href = 'grammar_question_list.php'; </script>";
        }
    }
?>