<?php
    session_start();
    require_once('define.php');
 
    /**
     * SET CONNECT
     */
    $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DATABASE);
    mysqli_set_charset($conn ,'utf8');
    if (!$conn) 
    {
        echo "Không kết nối được tới CSDL" . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
     
 
    /**
     * CALL GOOGLE API
     */
    require_once 'vendor/autoload.php';
    $client = new Google_Client();
    $client->setClientId(GOOGLE_APP_ID);
    $client->setClientSecret(GOOGLE_APP_SECRET);
    $client->setRedirectUri(GOOGLE_APP_CALLBACK_URL);
    $client->addScope("email");
    $client->addScope("profile");
    
    if (isset($_GET['code'])) 
    {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
       // print_r($token);
        $client->setAccessToken($token['access_token']);
 
        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $name =  $google_account_info->name;
        $sdt =  $google_account_info->phone;
       // print_r($google_account_info);
       /**
        * CHECK EMAIL AND NAME IN DATABASE
        */
        $check = "SELECT * FROM `hocvien` WHERE `Email`='".$email."'";
        $result = mysqli_query($conn,$check);
        $rowcount=mysqli_num_rows($result);
        if($rowcount>0)
        {
            /**
             * USER EXITS
             */
            $re = mysqli_fetch_assoc($result);
                
            session_regenerate_id();    
            $_SESSION['Email'] = $re['Email'];
            $_SESSION['ID'] = $re['MaHV'];
            $_SESSION['vt'] = $re['MaVT'];
            header('location: ../view/index.php');
            //exit();
        }
        else
        {
            /* INSERT USER TO DATABASE*/
            $mahv='HV_'.rand(00001,99999);
            $pass=hash('ripemd160',rand(1,999999));
            $sql1 = "INSERT into `taikhoan` (`MaTK`, `Password`, `MaVT`) values ('".$mahv."', '".$pass."', 'HV')";
            $rs1 = mysqli_query($conn,$sql1);
            $sql = "INSERT into `hocvien` (`MaHV`, `Email`, `TenUser`, `MaVT`) values ('".$mahv."', '".$email."', '".$name."', 'HV')";
            $rs = mysqli_query($conn,$sql);
            
            /* AFTER INSERT, YOU CAN HEADER TO HOME */
            $re = mysqli_fetch_assoc($result);
                
            session_regenerate_id();    
            $_SESSION['Email'] = $re1['Email'];
            $_SESSION['ID'] = $re1['MaHV'];
            $_SESSION['vt'] = $re['MaVT'];
            header('location: ggsuccess.php');
            //return $rs;
            //exit();
        }
        
    } 
    else 
    {
        /**
         * IF YOU DON'T LOGIN GOOGLE
         * YOU CAN SEEN AGAIN GOOGLE_APP_ID, GOOGLE_APP_SECRET, GOOGLE_APP_CALLBACK_URL
         */
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="refresh" content="0.1;url=<?php echo $client->createAuthUrl();?>">
        </head>
        <?php
        //echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
    }
?>