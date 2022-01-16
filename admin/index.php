<?php 
    session_start();
    ob_start();
   
    include("functions/routing.php");
     $myIP = $_SERVER["REMOTE_ADDR"];
     $myBrowser = $_SERVER["HTTP_USER_AGENT"];
     if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true && $myIP ==  $_SESSION["userIP"] && $myBrowser == $_SESSION["userAgent"]){}
        else{
            go("login/login.php");
    } 
    
?>
<?php
    include("system/setting.php");
   
    include("system/tools.php");
    include("inc/header.php");
    include("inc/navbar.php");
    include("inc/sidebar.php");
    include("system/routes.php");
?>

    <?php
        if(isset($_SESSION["status"])){
            echo $_SESSION["status"];
            unset($_SESSION["status"]); 
        }
    ?>

<?php
    include("inc/footer.php");
    ob_end_flush();
?>
