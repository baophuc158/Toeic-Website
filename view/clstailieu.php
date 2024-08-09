<?php
    $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
	mysqli_set_charset($conn ,'utf8');
    if(isset($_POST['upload']))
    {
        $matl = $_REQUEST['stt'];
        $motatl = $_REQUEST['des_doc'];
        $acc_qltl = $_REQUEST['acc_qltl'];
        if($matl == '' || $motatl == '' || $acc_qltl == '')
        {
            echo '<script>alert("Vui lòng nhập đầy đủ thông tin !")</script>';
            echo header("refresh:0;url='tailieu.php'");
        }
        else
        {
            /*quy định file*/ 
            $ten_tl = $_FILES['tailieu']['name'];
            $ten_tam = $_FILES['tailieu']['tmp_name'];
            $kich_co = $_FILES['tailieu']['size'];
            $loai_file = $_FILES['tailieu']['type'];

            $allowed_tailieu = ['pdf','docx','ppt','rar','zip','excel'];
            $tailieu_extension = explode('.', $ten_tl);
            $tailieu_extension = strtolower(end($tailieu_extension));
            if(!in_array($tailieu_extension, $allowed_tailieu))
            {
                echo '<script>alert("Định dạng tài liệu không hợp lệ hoặc chưa chọn tài liệu !")</script>';
                echo header("refresh:0;url='tailieu.php'");
            }
            elseif($kich_co > 20000000 ) // kích cỡ 20MB
            {
                echo '<script>alert("Kích cỡ tài liệu không quá 20MB !")</script>';
                echo header("refresh:0;url='tailieu.php'");
            }
            else
            {
                $timestamp = time();
                $new_document_name = "Toeic_".date("m-d-y", $timestamp)."_". basename($_FILES['tailieu']['name']);//random_int(1,256);
                //$new_document_name .= '.' . $tailieu_extension;

                move_uploaded_file($ten_tam, '../assets/document/'.$new_document_name);
                $query = "insert into tailieu (MaTL, NDTL, upTL, MaQLTL) values ('$matl', '$motatl', '$new_document_name', '$acc_qltl')";
                mysqli_query($conn, $query);
                echo '<script>alert("Thêm tài liệu thành công !")</script>';
                echo header("refresh:0;url='tailieu.php'");
            }
        }
        
    }
?>  