<?php
    include "../system/setting.php";
    if(isset($_POST["delete_btn_set"])){
        $id = $_POST["id"];
        $delete = $db->prepare("DELETE FROM category WHERE category_id = ?");
        $delete->execute([$id]);
    }

    $articleID = $_POST["articleID"];
    $deleteArticle = $db->prepare("DELETE FROM article WHERE article_id = ?");
    $deleteArticle->execute(array($articleID));

    //delete chef
    
    $chefId = $_POST["chefId"];
    $deleteChef = $db->prepare("DELETE FROM cheaf_team WHERE team_ID = ?");
    $deleteChef->execute(array($chefId));

    $deleteChefImg = $_POST["deleteChefImg"];
    $select = $db->prepare("SELECT * FROM cheaf_team WHERE team_ID = ?");
    $select->execute(array($deleteChefImg));
    $selectChef = $select->fetch(PDO::FETCH_ASSOC);
    unlink("../uploads/".$selectChef["team_img"]);
    
?>