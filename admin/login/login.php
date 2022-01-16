<?php
    session_start();
    include "../system/setting.php";
    include "../functions/routing.php";
    include "../system/tools.php";
    if(!empty($_SESSION["username"])){
        go("../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!--<script src="../assets/js/toaster.js"></script>-->
</head>
<body>
    <?php
        if(isset($_POST["submit"])){
            $username = strip_tags($_POST["username"]);
            $userpassword = strip_tags(trim($_POST["password"]));
            if(!empty($username) && !empty($userpassword)){
               $ok =  checkData($username, md5($userpassword));
               if($ok){

                /* create cookie */
                if(isset($_POST["rememberMe"])){
                    setcookie("username", $username, time() + 120);
                    setcookie("password", $userpassword, time() + 120);
                }else{
                    setcookie("username", $username, time()-1);
                    setcookie("password", $userpassword, time()-1);
                }

                /* create session */
                session_regenerate_id(true);
                $_SESSION["logedIn"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["userIP"] = $_SERVER["REMOTE_ADDR"];
                $_SESSION["userAgent"] = $_SERVER["HTTP_USER_AGENT"];
                $_SESSION["status"] = "<script>
                                        $.toaster({ message : 'Admin paneline girisiniz uqurla heyata kecdi', title : 'Uqurlu', proority : 'success' });
                                       </script>";
                
                
                go("../index.php");
               }else{
                   
                showAlert("Xeta", "Daxil etdiyiniz istifadeci adi ve ya sifre yanlisdir", "error");
                back(3);
               }

            }else{
                showAlert("Xeta", "Formdaki xanalari doldurmaq vacibdir", "error");
                back(3);
            }
        }
        /* check cookie */
        $cookie_username = "";
        $cookie_password = "";
        $set_remember = "";
        if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
            $cookie_username = $_COOKIE["username"];
            $cookie_password = $_COOKIE["password"];
            $set_remember = "checked='checked'";
        }
    ?>
    <body id="particles-js"></body>
    <div class="animated bounceInDown">
    <div class="container">
        <span class="error animated tada" id="msg"></span>
        <form method="post" name="form1" class="box" onsubmit="return checkStuff()">
        <h4>Admin<span>Dashboard</span></h4>
        <h5>Sign in to your account.</h5>
            <input type="text" value="<?= $cookie_username; ?>" name="username" placeholder="Username" autocomplete="off">
            <i class="typcn typcn-eye" id="eye"></i>
            <input type="password" value="<?= $cookie_password; ?>" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
            <label>
            <input type="checkbox" <?= $set_remember; ?> name="rememberMe">
            <span></span>
            <small class="rmb">Remember me</small>
            </label>
            <a href="forget.php" class="forgetpass">Forget Password?</a>
            <input type="submit" name="submit" value="Sign in" class="btn1">
        </form>
            
    </div> 
        
    </div>
    <script src="assets/js/login.js"></script>
    <script>
        
    </script>
</body>
</html>