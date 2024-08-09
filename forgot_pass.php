<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        .form-gap {
            padding-top: 70px;
        }
        *{
            background-color: whitesmoke;
        }
        #bro{
            border: 2px solid black;
            border-radius: 10px;
            box-shadow: 3px 4px 5px ;
        }

    </style>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div id="bro" class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Quên mật khẩu?</h2>
                  <p>Bạn có thể lấy lại mật khẩu tại đây.</p>
                  <div class="panel-body">
    
                    <form action="reset-request.php" id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Nhập email của bạn" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <a href=""><button type="submit" name="reset-request-submit" class="btn btn-lg btn-primary btn-block">Nhận mật khẩu mới bằng email của bạn</button></a>
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
                    <?php
                      if(isset($_GET["reset"]))
                      {
                        if($_GET["reset"] == "success")
                        {
                          echo '<p class="signupsuccess">Kiểm tra email của bạn!</p>';
                        }
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</body>
</html>