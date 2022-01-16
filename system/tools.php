<?php
    function go($url, $time = 0){
        if($time != 0){
            header("Refresh: $time; url = $url");
        }else{
            header("Location: $url");
        }
    }

    function back($time = 0){
        $url = $_SERVER["HTTP_REFERER"];
        if($time != 0){
            header("Refresh: $time; url = $url");
        }else{
            header("Location: $url");
        }
        
    }

    /* select article from database */
    if(!function_exists("selectArticle")){
        function selectArticle($par1, $par2){
            global $db;
            $select = $db->query("SELECT * FROM article INNER JOIN category ON article.article_category = category.category_name ORDER BY article_id DESC Limit $par1, $par2");
            $select->execute(array());
            return $select->fetchALL(PDO::FETCH_ASSOC);
        }
    }

    /* select category from database */
    if(!function_exists("selectCategory")){
        function selectCategory(){
            global $db;
            $select = $db->prepare("SELECT * FROM category");
            $select->execute(array());
            return $select->fetchALL(PDO::FETCH_ASSOC);
        }
    }
?>