<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=blog3;charset=utf8", "root", "");
    }catch(PDOException $e){
        echo $e->getMessage();
    }

?>