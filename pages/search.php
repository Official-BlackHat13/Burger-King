<?php
    include "../system/setting.php";
    $value = $_POST["value"];
    
    $select = $db->prepare("SELECT * FROM article INNER JOIN category ON article.article_category = category.category_name WHERE article_title LIKE ?");
    $select->execute(array("%".$value."%"));
    $show = $select->fetchALL(PDO::FETCH_ASSOC);
    $count = $select->rowCount();
    if($value){
        if($count > 0){
            foreach($show as $row){
                echo '<a href="read-more?id='.$row["article_id"].'">'.$row["article_title"].'</a>'."<br>";
            }
        }else{
            echo "Hec bir netice tapilmadi";
        }
    }
    
?>