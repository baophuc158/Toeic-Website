<?php
    session_start();
    $app_id = "1993574384175706";
    $app_secret = "8b2f060c0e19d706ab536f7afd378456";
    $redirect_uri = urlencode("https://ayaya-toeic-iuh.click/loginfacebook/redirect-facebook.php"/*&scope=public_profile"*/);

    $code = $_GET['code'];

    $facebook_access_token_uri = "https://graph.facebook.com/v15.0/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    $aResponse = json_decode($response);
    $access_token = $aResponse->access_token;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$access_token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    $user = json_decode($response);

    $_SESSION['user_login'] = true;
    $_SESSION['user_name'] = $user->name;
    
    require_once('define.php');
 
    /**
     * SET CONNECT
     */
    $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DATABASE);
    if (!$conn) 
    {
        echo "Không kết nối được tới CSDL" . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    $check = "SELECT * FROM `hocvien` WHERE  `TenHV`='".$user->name."'";
    $result = mysqli_query($conn,$check);
    $rowcount=mysqli_num_rows($result);
    if($rowcount>0)
    {
        /**
         * USER EXITS
         */
        header('location: ../view/index.php');
    }
    else
    {
            /* INSERT USER TO DATABASE*/
            $sql = "INSERT into `hocvien` (`MaHV`, `TenHV`, `MaVT`) values ('".rand()."', '".$user->name."', 'HV')";
            $rs = mysqli_query($conn,$sql);
        
            /* AFTER INSERT, YOU CAN HEADER TO HOME */
            header('location: ../view/index.php');
            return $rs;
    }
?>