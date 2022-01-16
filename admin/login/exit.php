<?php
    session_start();
    include "../functions/routing.php";
    include "../system/setting.php";
    session_destroy();
    go("login.php");

?>