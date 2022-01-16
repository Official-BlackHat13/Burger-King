<?php

    /* show alert function */
    if(!function_exists("showAlert")){
        function showAlert($title = 'Xəta', $content = 'Xəta baş verdi', $type = 'error'){
            $alert = "<script>
                        swal('" . $title. "', '" . $content. "', '" . $type. "')
                    </script>";
            echo $alert;
            
        }
    }

    /* add data database in slider forms */
    if(!function_exists("insertData")){
        function insertData($data){
            global $db;
            $insert = $db->prepare("INSERT INTO slider SET 
            img = ?,
            title = ?,
            description = ?,
            rank = ?,
            isActive = ?,
            btn_text_1 = ?,
            btn_color_1 = ?,
            btn_url_1 = ?,
            btn_text_2 = ?,
            btn_color_2 = ?,
            btn_url_2 = ?
            ");
            return $insert->execute($data);
        }
    }

    /* update data in slider forms */
    if(!function_exists("updateSlider")){
        function updateSlider($data){
            global $db;
            $update = $db->prepare("UPDATE  slider SET 
            img = ?,
            title = ?,
            description = ?,
            rank = ?,
            isActive = ?,
            btn_text_1 = ?,
            btn_color_1 = ?,
            btn_url_1 = ?,
            btn_text_2 = ?,
            btn_color_2 = ?,
            btn_url_2 = ?,
            btn_status_1 = ?,
            btn_status_2 = ? WHERE id = ?
            /*btn_status_2 = ? */
            ");
            return $update->execute($data);
        }
    }
    /* select data from database */
    if(!function_exists("getSliderById")){
        function getSliderById($id){
            global $db;
            $select = $db->prepare("SELECT * FROM slider WHERE id = ?");
            $select->execute(array($id));
            return $select->fetch(PDO::FETCH_ASSOC);
        }
    }
    /* delete data from database */
    if(!function_exists("deleteSlider")){
        function deleteSlider($id){
            global $db;
            $delete = $db->prepare("DELETE FROM slider WHERE id = ?");
            return $delete->execute(array($id));
        }
    }
    /* check data in admin login */
    if(!function_exists("checkData")){
        function checkData($par1, $par2){
                global $db;
                $control = $db->prepare("SELECT * FROM adminlogin WHERE username = ? AND userPassword = ?");
                $control->execute(array($par1, $par2));
                return $control->fetch(PDO::FETCH_ASSOC);
        }
    }

    /* check email from database */
    if(!function_exists("checkEmail")){
        function checkEmail($data){
            global $db;
            $control = $db->prepare("SELECT * FROM adminlogin WHERE email = :email");
            $control->bindParam(":email", $data, PDO::PARAM_STR);
            $control->execute();
            return $control->rowCount();
        }
    }

    /* check code and email from database */
    if(!function_exists("checkCode")){
        function checkCode($par1, $par2){
            global $db;
            $control = $db->prepare("SELECT * from adminlogin WHERE code = ? AND email = ?");
            $control->execute(array($par1, $par2));
            $control->fetch(PDO::FETCH_ASSOC);
            return $control->rowCount();
        }
    }
    
    /* add category to database */
    if(!function_exists("addCategory")){
        function addCategory($data1, $data2){
            global $db;
            $insert = $db->prepare("INSERT INTO category(category_name, category_num) VALUES(?, ?)");
            return $insert->execute(array($data1, $data2));
        }
    }

    /* select categories from database */
    if(!function_exists("selectCategory")){
        function selectCategory(){
            global $db;
            $select = $db->prepare("SELECT * FROM category");
            $select->execute(array());
            return $select->fetchALL(PDO::FETCH_ASSOC);
        }
    }

    /* insert article to database */
    if(!function_exists("insertArticle")){
        function insertArticle($data){
            global $db;
            $insert = $db->prepare("INSERT INTO article SET 
                article_img = ?,
                article_title = ?,
                article_content = ?,
                article_category = ?,
                article_author = ?
            ");
            return $insert->execute($data);
        }
    }

    /* update article function */
    if(!function_exists("updateArticle")){
        function updateArticle($par1){
            global $db;
            $update = $db->prepare("UPDATE article set 
                article_img = ?,
                article_title = ?,
                article_content = ?,
                article_category = ? WHERE article_id = ?
            ");
            return $update->execute($par1);
            
        }
    }

    /* select article and category data from database */
    if(!file_exists("innerTablo")){
        function innerTablo($par){
            global $db;
            $inner = $db->prepare("SELECT * FROM article INNER JOIN category ON article.article_category = category.category_name WHERE article_id = ?");
            $inner->execute(array($par));
            return $inner->fetch(PDO::FETCH_ASSOC);
        }
    }

    /* select cheaf team from database */
    if(!function_exists("selectCheaf")){
        function selectCheaf($par){
            global $db;
            $select = $db->prepare("SELECT * FROM cheaf_team WHERE team_ID = ?");
            $select->execute(array($par));
            return $select->fetch(PDO::FETCH_ASSOC);
        }
    }
   
?>