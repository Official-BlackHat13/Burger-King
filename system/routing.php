<?php
    @$page = $_GET["page"];
    if(isset($page)){
        $file_name = "pages/".$page.".php";
        if(file_exists($file_name)){
            include("$file_name");
        }
    }else{
        include "pages/home.php";
    }
  /*   switch($page){
        case "home":
            include "pages/home.php";
            break;
        case "about":
            include "pages/about.php";
            break;
        case "feature":
            include "pages/feature.php";
            break;
        case "team":
            include "pages/team.php";
            break;
        case "menu":
            include "pages/menu.php";
            break;
        case "booking":
            include "pages/booking.php";
            break;
        case "blog":
            include "pages/blog.php";
            break;
        case "single":
            include "pages/single.php";
            break;
        case "contact":
            include "pages/contact.php";
            break;
    } */

?>