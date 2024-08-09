<?php
    include('header.php');
    if($_SESSION['vt']=='QLTL')
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATI | Thêm câu hỏi Listening 2</title>
    <style>
    #tieude{
        font-family: san-serif;
        text-align: center;

    }
    .cauhoi{
        padding-bottom: 5px;
    }
    label{
        width: 15%;
    }
    input{
        width: 75%;
    }
    select{
        width: 75%;
    }
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 id="tieude">Thêm câu hỏi Listening 2</h1>
                <form action="upload_img.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div style="height: 100%;" class="form-control" >
                            <div style="padding-bottom: 5px; border-bottom: 1px solid grey;" class="">
                                <label for="mapart">Mã Part: </label>
                                <input type="text" name="mapart" id="mapart" value="L2" readonly>
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <p style="font-weight: bold;">Tải File âm thanh:</p> <input type="file" name="audio" id="audio" accept=".mp3">
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="dapana">Đáp án A: </label>
                                <input type="text" name="dapana" id="dapana">
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="dapanb">Đáp án B: </label>
                                <input type="text" name="dapanb" id="dapanb">
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="dapanc">Đáp án C: </label>
                                <input type="text" name="dapanc" id="dapanc">
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="dapand">Đáp án D: </label>
                                <input type="text" name="dapand" id="dapand" value="null" readonly>
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="dapandung">Đáp án đúng: </label>
                                <input type="text" name="dapandung" id="dapandung">
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="malt">Mã lộ trình: </label>
                                <input type="text" name="malt" id="malt">
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="script">Script: </label>
                                <input type="text" name="script" id="script">
                            </div>
                            <!----<div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <p style="font-weight: bold;">Tải File lên:</p> <input type="file" name="image" id="image">
                            </div>---->
                            
                            </div><br>
                            <div style="text-align: center;" class="nut">
                                <button class="btn btn-primary btn-lg btn-block" name="add_audio" id="add_audio" type="submit">Thêm câu hỏi</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--------------------------------->
                
                <!--------------------------------->
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<?php
    }
    elseif($_SESSION['vt']=='QTHT')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    else
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
    include('footer.php');
?>
</body>
</html>