<?php
    include('header.php')
?>
<title>ATI | Vocabulary Practice</title>
<style>
.noidung {
    padding-top: 10px;
    margin: 20px;
    border: 3px solid black;
    border-radius: 10px;
    box-shadow: 0px 15px 25px;
    background-color: white;
}
.noidung1 {
    margin: 0 auto;
    padding: 0 auto;
}

.am_thanh {
    display: inline-block;
    position: relative;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #fff;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    cursor: pointer;
    margin-right: 10px;
    left: 10px;
    padding: 10px
}

.am_thanh>button {
    background-color: #fff;
    border: 1px solid white;
    top: 50%;
    left: 50%;
    width: 30px;
    height: 30px;
}

#loa {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 24px;
    color: #555;
}

.flip-box {
    padding-top: 35px;
    background-color: transparent;
    perspective: 1000px;
}

.flip-box-inner {
    position: relative;
    /*display: inline-block;*/
    text-align: center;
    transition: transform 1s;
    transform-style: preserve-3d;
}

.flip-box:hover .flip-box-inner {
    transform: rotateY(180deg);
}

.flip-box-front {
    position: relative;
    width: 100%;
    height: auto;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.flip-box-back {
    position: absolute;
    width: 100%;
    /*height: 280px*/
    bottom: 30px;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.flip-box-front {
    background-color: white;
    color: black;
}

.flip-box-back {
    background-color: white;
    width: 100%;
    height: 70%;
    color: black;
    transform: rotateY(180deg);
}

.flip-box-back>h3 {
    font-weight: 600;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding-top: 20px;
}

</style>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    <?php
                        include_once('../controller/cVocabulary.php');
                        $p=new cVocabulary();
                        $id=$_GET['id']; 
                        $topic = $_GET['topic'];
                        $hien = $p->xem_tuvung($id,$topic);
                        //$load = $p->load_tuvung($topic);
                        //echo json_decode($load);
                        if(mysqli_num_rows($hien) > 0)
                        {
                            ?>
                                <h2 style="text-align: center;"><?php echo 'Topic talk about'.' '.$topic ?> </h2>
                                
                                
                            <?php
                            while($row = mysqli_fetch_assoc($hien)){
                            ?>
                    <div class="noidung">
                        <div class="stt" style="display: none;"><?php echo $id; ?></div>
                        <div class="am_thanh">
                            <?php
                                        $audio_path = "../assets/audio/aud_vocabulary/{$row['am_thanh']}";
                                        echo "<button onclick=\"document.getElementById('audio_{$row['ID_vocabulary']}').play()\"><i id='loa' class='fa fa-volume-up'></i></button>";
                                        echo "<audio id=\"audio_{$row['ID_vocabulary']}\" src=\"{$audio_path}\"
                                            type=\"audio/mp3\"></audio>"; 
                                    ?>
                        </div>
                        <div class="text-center">
                            <div class="flip-box">
                                <div class="flip-box-inner">
                                    <div class="flip-box-front ">
                                        <img style="width: 280px; height: 280px;"
                                            src="../assets/img/img_vocabulary/<?php echo $row['hinh_anh']; ?>"
                                            alt="<?php echo 'image'.'_'. $row['Topic']; ?>"><br>
                                    </div>
                                    <div class="flip-box-back">
                                        <h3><?php echo $row['mota']; ?></h3><br>
                                        <i><u>Example:</u></i>
                                        <p><?php echo $row['vi_du']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tuvung">
                                <h3 style="font-weight: bolder;"><?php echo $row['tu_vung']; ?></h3>
                            </div>
                            <div class="phien_am">
                                <h4><?php echo $row['phien_am']; ?></h4>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                        }
                        else{
                             echo '<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                                <script>alert("xin lỗi bạn nhưng chủ đề này chưa có từ nào hiccc :(((( ");
                                    window.location.href = "../view/choose_vocabulary.php";
                                </script>
                            </div>';
                        }
                    ?>
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 text-center">
                        <a href="choose_vocabulary.php"><button type="button" class="btn btn-secondary">Trở lại</button></a>
                        <a href="review_vocabulary.php?topic=<?php echo $topic; ?>"><button type="button" class="btn btn-primary">Bài tập</button></a>
                    </div><br><p><br></p>
                </div>
            </div>
        </div>
    </main>
</body>

<?php
    include('footer.php')
?>

</html>