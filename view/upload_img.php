<?php
    include_once('db.php');
    if(isset($_POST['addch']))
    {
        $script = $_REQUEST['script'];
        $mapart = $_REQUEST['mapart'];
        $dapana = $_REQUEST['dapana'];
        $dapanb = $_REQUEST['dapanb'];
        $dapanc = $_REQUEST['dapanc'];
        $dapand = $_REQUEST['dapand'];
        $dapandung = $_REQUEST['dapandung'];
        $malt   = $_REQUEST['malt'];

        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];

        $audio = $_FILES['audio']['name'];
        $bo_dem = $_FILES['audio']['tmp_name'];
        $kichco = $_FILES['audio']['size'];
        $loai = $_FILES['audio']['type'];

        $allowed_audio = ['mp3'];
        $audioExtension = explode('.', $audio);
        $audioExtension = strtolower(end($audioExtension));

        $allowed = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $name);
        $imageExtension = strtolower(end($imageExtension));
        if($mapart == ''|| $dapana == ''|| $dapanb == ''|| $dapanc == ''|| $dapand == ''|| $dapandung == '')
        {
            echo "<script>alert('Thiếu dữ liệu nhập!')</script>";
            echo header("refresh:0;url='them_ch_L1.php'");
            exit();
        }
        if(!in_array($audioExtension, $allowed_audio))
        {
            echo '<script>alert("Định dạng audio không hợp lệ !")</script>';
            echo header("refresh:0;url='them_ch_L1.php'");
        }
        elseif($kichco > 10000000)
        {
            echo '<script>alert("Kích cỡ âm thanh không quá 10MB !")</script>';
            echo header("refresh:0;url='them_ch_L1.php'");
            exit();
        }
        elseif(!in_array($imageExtension, $allowed))
        {
            echo '<script>alert("Định dạng ảnh không hợp lệ !")</script>';
            echo header("refresh:0;url='them_ch_L1.php'");
            exit();
        }
        elseif($size > 2000000)
        {
            echo '<script>alert("Kích cỡ ảnh không quá 2MB !")</script>';
            echo header("refresh:0;url='them_ch_L1.php'");
            exit();
        }
        else
        {
            $new_audio_name = random_int(1,256);
            $new_audio_name .= '.' . $audioExtension;
            $new_img_name = random_int(1,256);
            $new_img_name .= '.' . $imageExtension;

            move_uploaded_file($tmp_name, '../assets/img/L1/'. $new_img_name);
            move_uploaded_file($bo_dem, '../assets/audio/'. $new_audio_name);
            $query = "insert into noidungon (MaCH, MaPart, Cauhoi, DapanA, DapanB, DapanC, DapanD, DapanDung, MaDV, Hinh, script, route_level) values ('', '$mapart', '$new_audio_name', '$dapana', '$dapanb', '$dapanc', '$dapand', '$dapandung', '0', '$new_img_name', '$script', '$malt')";
            mysqli_query($conn, $query);
            echo '<script>alert("Thêm câu hỏi thành công !")</script>';
            echo header("refresh:0;url='them_ch_L1.php'");
            exit();
        }
        /*--------------------------------------------------*/ 
    }

    /*------------------------------add Audio L2---------------------------------------------------*/
    if(isset($_POST['add_audio']))
    {
        $script = $_REQUEST['script'];
        $mapart = $_REQUEST['mapart'];
        $dapana = $_REQUEST['dapana'];
        $dapanb = $_REQUEST['dapanb'];
        $dapanc = $_REQUEST['dapanc'];
        $dapand = $_REQUEST['dapand'];
        $dapandung = $_REQUEST['dapandung'];
        $malt = $_REQUEST['malt'];

        $audio = $_FILES['audio']['name'];
        $bo_dem = $_FILES['audio']['tmp_name'];
        $kichco = $_FILES['audio']['size'];
        $loai = $_FILES['audio']['type'];

        $allowed_audio= ['mp3'];
        $audioExtension = explode('.', $audio);
        $audioExtension = strtolower(end($audioExtension));

        if($mapart == ''|| $dapana == ''|| $dapanb == ''|| $dapanc == ''|| $dapand == ''|| $dapandung == '')
        {
            echo "<script>alert('Thiếu dữ liệu nhập!')</script>";
            echo header("refresh:0;url='them_ch_L2.php'");
            exit();
        }
        
        if(!in_array($audioExtension, $allowed_audio))
        {
            echo '<script>alert("Định dạng audio không hợp lệ !")</script>';
            echo header("refresh:0;url='them_ch_L2.php'");
            exit();
        }
        elseif($kichco > 20000000)
        {
            echo '<script>alert("Kích cỡ âm thanh không quá 20MB !")</script>';
            echo header("refresh:0;url='them_ch_L2.php'");
            exit();
        }
        else
        {
            $new_audio_name = 'L2'.'_'.random_int(1,256);
            $new_audio_name .= '.' . $audioExtension;
            move_uploaded_file($bo_dem, '../assets/audio/'. $new_audio_name);
            $query = "insert into noidungon (MaCH, MaPart, Cauhoi, DapanA, DapanB, DapanC, DapanD, DapanDung, MaDV, script, route_level) values ('', '$mapart', '$new_audio_name', '$dapana', '$dapanb', '$dapanc', '$dapand', '$dapandung', '0', '$script', '$malt')";
            mysqli_query($conn, $query);
            echo '<script>alert("Thêm câu hỏi L2 thành công !")</script>';
            echo header("refresh:0;url='them_ch_L2.php'");
            exit();
        }
    }
    /*------------------------------add Audio + Image L3---------------------------------------------------*/
    if(isset($_POST['add_L3']))
    {
        $script = $_REQUEST['script'];
        $mapart = $_REQUEST['mapart'];
        $dapana = $_REQUEST['dapana'];
        $dapanb = $_REQUEST['dapanb'];
        $dapanc = $_REQUEST['dapanc'];
        $dapand = $_REQUEST['dapand'];
        $dapandung = $_REQUEST['dapandung'];
        $madv = $_REQUEST['madv'];
        $cauhoi = $_REQUEST['cauhoi'];
        $malt = $_REQUEST['malt'];

        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];

        $audio = $_FILES['audio']['name'];
        $bo_dem = $_FILES['audio']['tmp_name'];
        $kichco = $_FILES['audio']['size'];
        $loai = $_FILES['audio']['type'];

        $allowed_audio = ['mp3'];
        $audioExtension = explode('.', $audio);
        $audioExtension = strtolower(end($audioExtension));

        $allowed = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $name);
        $imageExtension = strtolower(end($imageExtension));

        if($mapart == ''|| $dapana == ''|| $dapanb == ''|| $dapanc == ''|| $dapand == ''|| $dapandung == ''|| $madv == ''|| $cauhoi == '')
        {
            echo "<script>alert('Thiếu dữ liệu nhập!')</script>";
            echo header("refresh:0;url='them_ch_L3.php'");
        }

        if(!in_array($audioExtension, $allowed_audio))
        {
            echo '<script>alert("Định dạng audio không hợp lệ !")</script>';
            echo header("refresh:0;url='them_ch_L3.php'");
            exit();
        }
        elseif($kichco > 20000000)
        {
            echo '<script>alert("Kích cỡ âm thanh không quá 20MB !")</script>';
            echo header("refresh:0;url='them_ch_L3.php'");
            exit();
        }
        elseif($size > 5000000)
        {
            echo '<script>alert("Kích cỡ ảnh không quá 5MB !")</script>';
            echo header("refresh:0;url='them_ch_L3.php'");
            exit();
        }
        elseif($imageExtension == '')
        {
            $new_audio_name = 'L3-aud'.'_'.random_int(1,256);
            $new_audio_name .= '.' . $audioExtension;

            if($madv!=0)
            {
                $check="select * from doanvan where MaDV='$madv'";
                $recheck=mysqli_query($conn,$check);
                if(mysqli_num_rows($recheck)>0)
                {
                    echo "<script>alert('Đã tồn tại mã đoạn văn $madv!')</script>";
                }
                else
                {
                    $query1 = "insert into doanvan (MaDV, MaPart, NoidungDV) values ('$madv', '$mapart', '$new_audio_name')";
                    mysqli_query($conn, $query1);
                }
            }
            $query = "insert into noidungon (MaCH, MaPart, Cauhoi, DapanA, DapanB, DapanC, DapanD, DapanDung, MaDV, script, route_level) values ('', '$mapart', '$cauhoi', '$dapana', '$dapanb', '$dapanc', '$dapand', '$dapandung', '$madv', '$script', '$malt')";
            mysqli_query($conn, $query);
            move_uploaded_file($bo_dem, '../assets/audio/'. $new_audio_name);
            echo '<script>alert("Thêm câu hỏi thành công !")</script>';
            echo header("refresh:0;url='them_ch_L3.php'");
            exit();
        }
        elseif(!in_array($imageExtension, $allowed))
        {
            echo '<script>alert("Định dạng ảnh không hợp lệ !")</script>';
            echo header("refresh:0;url='them_ch_L3.php'");
            exit();
        }
        else
        {
            $new_audio_name = 'L3-aud'.'_'.random_int(1,256);
            $new_audio_name .= '.' . $audioExtension;
            $new_img_name = 'L3-img'.'_'.random_int(1,256);
            $new_img_name .= '.' . $imageExtension;
            if($madv!=0)
            {
                $check="select * from doanvan where MaDV='$madv'";
                $recheck=mysqli_query($conn,$check);
                if(mysqli_num_rows($recheck)>0)
                {
                    echo "<script>alert('Đã tồn tại mã đoạn văn $madv!')</script>";
                }
                else
                {
                    $query1 = "insert into doanvan (MaDV, MaPart, NoidungDV, hinhanh) values ('$madv', '$mapart', '$new_audio_name','$new_img_name',)";
                    mysqli_query($conn, $query1);
                }
            }
            $query = "insert into noidungon (MaCH, MaPart, Cauhoi, DapanA, DapanB, DapanC, DapanD, DapanDung, MaDV, script) values ('', '$mapart', '$cauhoi', '$dapana', '$dapanb', '$dapanc', '$dapand', '$dapandung', '$madv', '$script')";
            mysqli_query($conn, $query);
            move_uploaded_file($tmp_name, '../assets/img/L1/'. $new_img_name);
            move_uploaded_file($bo_dem, '../assets/audio/'. $new_audio_name);
            echo '<script>alert("Thêm câu hỏi thành công !")</script>';
            echo header("refresh:0;url='them_ch_L3.php'");
            exit();
        }
    }
        /*--------------------------------------------------*/
        /*--------------------Thêm hình ảnh và âm thanh cho từ vựng----------------*/
    if(isset($_POST['add_vocab']))
    {
        $ID_vocabulary = $_REQUEST['ID_vocabulary'];
        $tu_vung = $_REQUEST['tu_vung'];
        $topic = $_REQUEST['topic'];
        $phien_am = $_REQUEST['phien_am'];
        $mo_ta = $_REQUEST['mota'];
        $vi_du = $_REQUEST['vi_du'];

        $name = $_FILES['hinh_anh']['name'];
        $tmp_name = $_FILES['hinh_anh']['tmp_name'];
        $size = $_FILES['hinh_anh']['size'];
        $type = $_FILES['hinh_anh']['type'];

        $audio = $_FILES['am_thanh']['name'];
        $bo_dem = $_FILES['am_thanh']['tmp_name'];
        $kichco = $_FILES['am_thanh']['size'];
        $loai = $_FILES['am_thanh']['type'];

        $allowed_audio = ['mp3','mp4'];
        $audioExtension = explode('.', $audio);
        $audioExtension = strtolower(end($audioExtension));

        $allowed = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $name);
        $imageExtension = strtolower(end($imageExtension));
        $checkvoca="select * from question_v where ID_vocabulary='$ID_vocabulary'";
        $recheckvoca=mysqli_query($conn,$checkvoca);
        if($ID_vocabulary == '' || $tu_vung == ''|| $topic == ''|| $phien_am == ''|| $mo_ta == ''|| $vi_du == '')
        {
            echo "<script>alert('Thiếu dữ liệu nhập!')</script>";
            echo header("refresh:0;url='them_tu_vung.php'");
            exit();
        }
        
        if(mysqli_num_rows($recheckvoca)>0)
        {
            echo "<script>alert('Đã tồn tại mã từ vựng $ID_vocabulary!')</script>";
            echo header("refresh:0;url='them_tu_vung.php'");
            exit();
        }
        
        if(!in_array($audioExtension, $allowed_audio))
        {
            echo '<script>alert("Định dạng audio không hợp lệ !")</script>';
            echo header("refresh:0;url='them_tu_vung.php'");
            exit();
        }
        elseif($kichco > 10000000)
        {
            echo '<script>alert("Kích cỡ âm thanh không quá 10MB !")</script>';
            echo header("refresh:0;url='them_tu_vung.php'");
            exit();
        }
        elseif(!in_array($imageExtension, $allowed))
        {
            echo '<script>alert("Định dạng ảnh không hợp lệ !")</script>';
            echo header("refresh:0;url='them_tu_vung.php'");
            exit();
        }
        elseif($size > 2000000)
        {
            echo '<script>alert("Kích cỡ ảnh không quá 2MB !")</script>';
            echo header("refresh:0;url='them_tu_vung.php'");
            exit();
        }
        else
        {
            $anh = random_int(1,256);
            $hinh = $anh;
            $new_audio_name = 'voca-aud'.'_'.$anh;
            $new_audio_name .= '.' . $audioExtension;
            $new_img_name = 'voca-img'.'_'.$hinh;
            $new_img_name .= '.' . $imageExtension;

            move_uploaded_file($tmp_name, '../assets/img/img_vocabulary/'. $new_img_name);
            move_uploaded_file($bo_dem, '../assets/audio/aud_vocabulary/'. $new_audio_name);
            $query = "insert into question_v (ID_vocabulary, tu_vung, phien_am, mota, vi_du, am_thanh, hinh_anh) values ('$ID_vocabulary', '$tu_vung', '$phien_am', '$mo_ta', '$vi_du', '$new_audio_name', '$new_img_name')";
            mysqli_query($conn, $query);
            $query1 = "insert into topic_vocabulary_info (id, ID_vocabulary, ID_topic) values ('', '$ID_vocabulary', '$topic')";
            mysqli_query($conn, $query1);
            echo '<script>alert("Thêm từ vựng thành công !")</script>';
            echo header("refresh:0;url='them_tu_vung.php'");
            exit();
        }
        /*--------------------------------------------------*/ 
    }
?>