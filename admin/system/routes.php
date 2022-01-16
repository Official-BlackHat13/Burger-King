<?php
    $page = @$_GET["page"];
    if(isset($page)){
        $file_name = "pages/".$page.".php";
        if(file_exists($file_name)){
            include("$file_name");
        }
    }
    /* switch($page){
        case "general-slider":
            include("./pages/slider.php");
            break;
    } */

?>