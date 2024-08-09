<?php
    include('header.php');
    if($_SESSION['vt']=='HV')
    {
?>

<title>ATI | REVIEW</title>
<style>
    .noidung{
        padding-top: 10px;
        margin: 20px;
        border: 3px solid black;
        border-radius: 10px;
        box-shadow: 0px 15px 25px;
        background-color: white;
    }
    .audio-container{
        display: flex;
        justify-content: center;
    }
    .image-container{
        vertical-align: middle;
    }
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
<script language="javascript">
    var h = 1; // Giờ
    var m = 59; // Phút
    var s = 59; // Giây
    
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
                alert('Bạn đã hết giờ rồi !');
                //document.cookie = "cookieName=cookieValue";
                document.querySelector('#done_review').click()
                //window.location.href="DoTest.php";
                return false;
            }
        }, 1000);
    //}    
</script>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 border">
                    <div class="noidung">
                        <form action="submit_review.php" method="POST">
                        <?php
                            include('../controller/cLT_review.php');
                            $p = new cLT_review();
                            $route_level = $_GET['route'];
                            ?>
                                <input type ="hidden" name="malt" id="malt" value="<?php echo $route_level; ?>"
                            <?php
                            $user = $_SESSION['ID'];
                            $hien = $p->hien_doanvan_lotrinh($route_level);
                            if(mysqli_num_rows($hien) > 0)
                            {
                                while($xuat = mysqli_fetch_assoc($hien))
                                {
                                    $madv = $xuat['MaDV'];
                                    $show = $p->hien_cauhoi_lotrinh($route_level, $madv);
                                    if($xuat['MaPartDV'] == 'L3' || $xuat['MaPartDV'] == 'L4')
                                    {
                                        echo '<div style="border-bottom: 1px solid;"></div>
                                            <br><div class="audio-container">
                                                <audio controls src="../assets/audio/'.$xuat['NoidungDV'].'" type="audio/mp3"></audio><br><br>
                                            </div><br>';
                                            if($xuat['hinhanh'] != '')
                                            {
                                                echo '<div class="image-container">
                                                        <img style="width: 280px; height: 280px;" src="../assets/img/L1/'.$xuat['hinhanh'].'" alt="">
                                                    </div>';
                                            }
                                    }
                                    
                                    if($xuat['MaPartDV'] == 'R6' || $xuat['MaPartDV'] == 'R7')
                                    {
                                        ?>
                                        <div style="border-bottom: 1px solid;"></div>
                                        <div style="margin: 10px;" class="text-left">
                                            <p style="font-size: 16px; line-height: 1.5; font-weight: normal; font-family: Arial, sans-serif;"><?php echo $xuat['NoidungDV']; ?></p>
                                        </div>
                                        <p></br></p>
                                        <?php
                                    }
                                    
                                    while($row = mysqli_fetch_assoc($show))
                                    {
                                     ?>
                                        <input type="hidden" name="questionID[]" value="<?php echo $row['MaCH']; ?>">
                                     <?php   
                                        if($row['MaPart'] == 'L1')
                                        {
                                            echo '<div class="audio-container">
                                                <audio controls src="../assets/audio/'.$row['Cauhoi'].'" type="audio/mp3"></audio><br><br>
                                            </div><br>
                                            <div style="text-align: center;" class="image-container">
                                                <img style="width: 280px; height: 280px;" src="../assets/img/L1/'.$row['Hinh'].'" alt="">
                                            </div>';
                                            ?>
                                                <ul id="">
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanA']; ?>"><?php echo $row['DapanA']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanB']; ?>"><?php echo $row['DapanB']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanC']; ?>"><?php echo $row['DapanC']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanD']; ?>"><?php echo $row['DapanD']; ?>
                                                    </li>
                                                    <input type="hidden" name="dapandung_<?php echo $row['MaCH']; ?>" id="dapandung_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanDung']; ?>">
                                                </ul>
                                                <p><br></p>
                                                <div style="border-bottom: 1px solid;"></div>
                                            <?php
                                        }
                                        else if($row['MaPart'] == 'L2')
                                        {
                                            ?>
                                                <div style="display: none;" class=""><?php echo $row['MaPart']; ?></div><br>
                                                <div class="audio-container">
                                                    <audio controls src="../assets/audio/<?php echo $row['Cauhoi']; ?>" type="audio/mp3"></audio><br><br>
                                                </div><br>
                                                <ul id="">
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanA']; ?>"><?php echo $row['DapanA']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanB']; ?>"><?php echo $row['DapanB']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanC']; ?>"><?php echo $row['DapanC']; ?>
                                                    </li>
                                                    <input type="hidden" name="dapandung_<?php echo $row['MaCH']; ?>" id="dapandung_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanDung']; ?>">
                                                </ul>
                                                <p><br></p>
                                                <div style="border-bottom: 1px solid;"></div>
                                            <?php
                                        }
                                        else if($row['MaPart'] == 'L3')
                                        {
                                            ?>
                                            <div style="display: none;" class=""><?php echo $row['MaPart']; ?></div>
                                            <b><input class="form-control" type="text" name="cauhoi" id="cauhoi" value="<?php echo $row['Cauhoi']; ?>" readonly></b>
                                                <ul id="">
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanA']; ?>"><?php echo $row['DapanA']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanB']; ?>"><?php echo $row['DapanB']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanC']; ?>"><?php echo $row['DapanC']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanD']; ?>"><?php echo $row['DapanD']; ?>
                                                    </li>
                                                    <input type="hidden" name="dapandung_<?php echo $row['MaCH']; ?>" id="dapandung_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanDung']; ?>">
                                                </ul>
                                                <p><br></p>
                                            <?php
                                        }
                                        else if($row['MaPart'] == 'L4')
                                        {
                                            ?>
                                            <div style="display: none;" class=""><?php echo $row['MaPart']; ?></div>
                                                <b><input class="form-control" type="text" name="cauhoi" id="cauhoi" value="<?php echo $row['Cauhoi']; ?>" readonly></b>
                                                <ul id="">
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanA']; ?>"><?php echo $row['DapanA']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanB']; ?>"><?php echo $row['DapanB']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanC']; ?>"><?php echo $row['DapanC']; ?>
                                                    </li>
                                                    <input type="hidden" name="dapandung_<?php echo $row['MaCH']; ?>" id="dapandung_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanDung']; ?>">
                                                </ul>
                                                <p><br></p>
                                            <?php
                                        }
                                        else if($row['MaPart'] == 'R5')
                                        {
                                            ?>
                                            <div style="display: none;" class=""><?php echo $row['MaPart']; ?></div><br>
                                                <div class="audio-container">
                                                    <textarea class="form-control"  name="cauhoi" id="cauhoi" rows="4" cols="90" readonly><?php echo $row['Cauhoi']; ?></textarea>
                                                </div>
                                                <ul id="">
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanA']; ?>"><?php echo $row['DapanA']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanB']; ?>"><?php echo $row['DapanB']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanC']; ?>"><?php echo $row['DapanC']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanD']; ?>"><?php echo $row['DapanD']; ?>
                                                    </li>
                                                    <input type="hidden" name="dapandung_<?php echo $row['MaCH']; ?>" id="dapandung_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanDung']; ?>">
                                                </ul>
                                                <p><br></p>
                                            <?php
                                        }
                                        else if($row['MaPart'] == 'R6')
                                        {
                                            ?>
                                                <div style="display: none;" class=""><?php echo $row['MaPart']; ?></div>
                                                <div style="padding: 10px;" class="audio-container">
                                                    <b><textarea class="form-control" name="cauhoi" id="cauhoi" cols="90" rows="4" readonly><?php echo $row['Cauhoi']; ?></textarea></b>
                                                </div>
                                                <ul id="">
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanA']; ?>"><?php echo $row['DapanA']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanB']; ?>"><?php echo $row['DapanB']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanC']; ?>"><?php echo $row['DapanC']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanD']; ?>"><?php echo $row['DapanD']; ?>
                                                    </li>
                                                    <input type="hidden" name="dapandung_<?php echo $row['MaCH']; ?>" id="dapandung_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanDung']; ?>">
                                                </ul>
                                                <p><br></p>
                                            <?php
                                        }
                                        else if($row['MaPart'] == 'R7')
                                        {
                                            ?>
                                                <div style="display: none;" class=""><?php echo $row['MaPart']; ?></div>
                                                <div style="padding: 10px;" class="audio-container">
                                                    <b><textarea class="form-control" name="cauhoi" id="cauhoi" cols="90" rows="4" readonly><?php echo $row['Cauhoi']; ?></textarea></b>
                                                </div>
                                                <ul id="">
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanA']; ?>"><?php echo $row['DapanA']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanB']; ?>"><?php echo $row['DapanB']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanC']; ?>"><?php echo $row['DapanC']; ?>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="dapan_<?php echo $row['MaCH']; ?>" class="dapan_<?php echo $row['MaCH']; ?>" id="dapan_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanD']; ?>"><?php echo $row['DapanD']; ?>
                                                    </li>
                                                    <input type="hidden" name="dapandung_<?php echo $row['MaCH']; ?>" id="dapandung_<?php echo $row['MaCH']; ?>" value="<?php echo $row['DapanDung']; ?>">
                                                </ul>
                                            <?php
                                        }
                                    }
                                }
                            }
                        ?>
                        <p><br></p>
                        <button type="submit" name="done_review" id="done_review" class="btn btn-success btn-block">Done!</button>
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
        </div>
    </main>
</body>

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
    include('footer.php');
?>