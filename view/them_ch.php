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
<script src="https://cdn.tiny.cloud/1/igk5mcyc81tqdsoyrj1dlzsyluktbdszeav0m4vpqudchgt1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#noidung'
      });
    </script> 
<title>ATI | Thêm câu hỏi Reading</title>
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
<title>Thêm câu hỏi</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 id="tieude">Thêm câu hỏi Reading</h1>
                <form action="addch.php" method="post">
                    <div class="form-group">
                        <div style="height: 100%;" class="form-control">
                            <div style="padding-bottom: 5px; border-bottom: 1px solid grey;" class="">
                                <label for="mapart">Mã Part: </label>
                                <select name="mapart" id="mapart" style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                    <option value="none">Chọn...</option>
                                    <option value="R5">R5</option>
                                    <option value="R6">R6</option>
                                    <option value="R7">R7</option>
                                </select>
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="ch">Câu hỏi: </label>
                                <input type="text" name="ch" id="ch">
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
                                <input type="text" name="dapand" id="dapand">
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
                            <hr>
                            <h4 style="color:red; text-align: center;">Nếu không thuộc đoạn văn nào vui lòng nhập Mã đoạn văn = 0 <br> Nội dung đoạn văn = Không</h4>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="madv">Mã đoạn văn: </label>
                                <input type="text" name="madv" id="madv">
                            </div>
                            <div style="padding-bottom: 5px; padding-top: 10px; border-bottom: 1px solid grey;" class="">
                                <label for="madv">Nội dung đoạn văn: </label>
                                <textarea name="noidung" id="noidung" cols="30" rows="10"></textarea>
                            </div><br>
                            <div style="text-align: center;" class="nut">
                                <button class="btn btn-primary btn-lg btn-block" name="addch" id="addch" type="submit">Thêm câu hỏi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<?php
    }
    elseif($_SESSION['vt']=='HV')
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
    else
    {
        echo '<script>alert("Bạn không được cấp quyền này !")</script>';
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    include('footer.php');
?>
</body>
</html>