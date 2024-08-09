<?php
  include('header.php');
  include('../controller/cTest.php');
  $p = new cTest();
  if($_SESSION['vt']=='HV')
  {
      $MaDe = $_GET['test'];
      $diemL = $_GET['L'];
      $hien = $p->reParaR($MaDe);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Làm bài kiểm tra</title>
    <script language="javascript">

            var h = 1; // Giờ
            var m = 15; // Phút
            var s = 1; // Giây
            
            var timeout = null; // Timeout
            
            //function start()
            //{
                /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
                timeout = setInterval(function()
                {
                    s--;
                    /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
                    document.getElementById('h').innerText = h.toString();
                    document.getElementById('m').innerText = m.toString();
                    document.getElementById('s').innerText = s.toString();
                    /*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
                    // Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
                    //  - giảm số phút xuống 1 đơn vị
                    //  - thiết lập số giây lại 59
                    if (s === 0)
                    {
                        m -= 1;
                        s = 59;
                    }

                    // Nếu số phút = -1 tức là đã chạy ngược hết số phút, lúc này:
                    //  - giảm số giờ xuống 1 đơn vị
                    //  - thiết lập số phút lại 59
                    if (m === -1)
                    {
                        h -= 1;
                        m = 59;
                    }

                    // Nếu số giờ = -1 tức là đã hết giờ, lúc này:
                    //  - Dừng chương trình
                    if (h == -1)
                    {
                        clearInterval(timeout);
                        alert('Ôi bạn ơi, hết giờ rồi, dậy nộp bài đi!');
                        //document.cookie = "cookieName=cookieValue";
                        document.querySelector('#donetestR').click()
                        //window.location.href="result.php";
                        return false;
                    }
                }, 1000);
            //}    
        </script>
</head>
<link rel="stylesheet" href="../assets/css/DoTest.css">
<link rel="stylesheet" href="../assets/css/img_aud.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    #countdown
    {
        position: fixed;
        top: 100px;
        right: 10px;
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
        border: 2px solid #007bff;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 border">
                <form action="submit_test.php" method="post">
                <input type="hidden" name="made" id="made" value="<?php echo $MaDe; ?>">
                <input type="hidden" name="diemL" id="diemL" value="<?php echo $diemL; ?>">
                <div class="form-control">
                    <?php
                        $count=41;
                        while($cot=mysqli_fetch_assoc($hien))
                        {
                            $re = $p->reReading($cot['MaDV'], $MaDe);
                            if($cot['MaDV']!=0)
                            {
                                /*echo $cot['NoidungDV'];*/
                                ?>
                                    <br><div class="">
                                        <i class="fa-solid fa-book fa-beat-fade"></i><p><?php echo $cot['NoidungDV']; ?></p>
                                    </div>
                                <?php
                            }
                            while ($row=mysqli_fetch_assoc($re))
                            {
                                echo '<b><h3>Sentence ' . $count.'.</b></h3>';
                                $count++;
                                echo "<h3>Part ".$row['MaPart']."</h3>";
                    ?>
                                <input type="hidden" name="questionID[]" value="<?php echo $row['MaCH']; ?>">
                                <textarea class="form-control" name="cauhoi" id="cauhoi" rows="3" readonly><?php echo $row['Cauhoi']; ?></textarea><br>
                                <ul>
                                    <li>
                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanA']; ?>"><?php echo '(A)'.'.'.' '.$row['DapanA']; ?>
                                    </li>
                                    <li>
                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanB']; ?>"><?php echo '(B)'.'.'.' '.$row['DapanB']; ?>
                                    </li>
                                    <li>
                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanC']; ?>"><?php echo '(C)'.'.'.' '.$row['DapanC']; ?>
                                    </li>
                                    <li>
                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanD']; ?>"><?php echo '(D)'.'.'.' '.$row['DapanD']; ?>
                                    </li>
                                </ul>
                                <input type="hidden" name="dapandung_<?php echo $row['MaCH']; ?>" id="dapandung_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanDung']; ?>"><br>
                                <div style="border-bottom: 1px solid;"></div>
                    <?php
                            }
                        }
                    ?>
                    <button type="submit" name="donetestR" id="donetestR" class="btn btn-info btn-block">Done Test!</button><br>
                </div>
                </form>
                <div id="countdown">
                    <div>
                        <span id="h">Giờ</span> :
                        <span id="m">Phút</span> :
                        <span id="s">Giây</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!---
<script type="text/javascript" src="../assets/js/script_DoTest.js"></script>
                -->
</html>
<?php    
  }
  elseif($_SESSION['vt']=='QTHT')
  {
    echo '<script>alert("Bạn không phải học viên !")</script>';
    echo '<script>window.location.href="../Admin/index.php"</script>';
  }
  else
  {
    echo '<script>alert("Bạn không phải học viên !")</script>';
    echo '<script>window.location.href="index.php"</script>';
  }
?>