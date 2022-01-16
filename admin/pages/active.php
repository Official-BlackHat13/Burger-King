<?php
    include "../system/setting.php";
    if($_POST){
        $id = (int) $_POST["id"];
        $active = (int) $_POST["aktive"];

        $update = $db->prepare("UPDATE cheaf_team SET team_active = ? WHERE team_ID = ?");
        $update->execute(array($active, $id));
        //category active
        $categoryId = (int) $_POST["categoryId"];
        $categoryActive = (int) $_POST["categoryActive"];

        $updateCategory = $db->prepare("UPDATE category SET category_active = ? WHERE category_id = ?");
        $updateCategory->execute(array($categoryActive, $categoryId));

        //article active
        $articleId = (int) $_POST["articleId"];
        $articleActive = (int) $_POST["articleActive"];

        $updateArticle = $db->prepare("UPDATE article SET article_active = ? WHERE article_id = ?");
        $updateArticle->execute(array($articleActive, $articleId));
    }
    
?>