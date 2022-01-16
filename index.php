<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php ob_start(); ?>
    <?php include "system/custom.php"; ?>
    <?php include "inc/header.php";?>
    <?php include "system/tools.php"; ?>
    <script src="toaster.js"></script>
</head>
<body>
    <?php @$page = $_GET["page"];?>
    
    <?php include "system/setting.php";?>
    
    
    <?php include "inc/menu.php";?>
   
    <?php include "system/routing.php";?>
    
   
   
    
   

    
    
    

    

    <?php include "inc/footer.php";?>
    <?php include "inc/library.php";?>
 
    <?php ob_end_flush(); ?>
</body>
</html>