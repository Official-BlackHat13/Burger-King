<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=blog3;charset=utf8", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo $e->getMessage();
    }

?>