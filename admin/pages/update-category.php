<?php
    /* update category */
    if(isset($_POST["submit"])){
        $id = $_GET["id"];
        $categoryName = $_POST["category_name"];
        $categoryNum = $_POST["category_num"];
    
        $update = $db->prepare("UPDATE category SET
            category_name = ?,
            category_num = ? WHERE category_id = ?
        ");
        $ok = $update->execute(array($categoryName, $categoryNum, $id));
        if($ok == true){
            showAlert("Uqurlu", "Melumatlar uqurla yenilendi", "success");
            go("?page=category", 3);
        }else{
            showAlert("Xeta", "Melumatlar yenilenerken xeta bas verdi", "error");
            back(3);
        }
    }
   

    /* select category data from database */
    $id = $_GET["id"];
    $select = $db->prepare("SELECT * FROM category WHERE category_id = ?");
    $select->execute([$id]);
    $show = $select->fetch(PDO::FETCH_ASSOC);
?>
    <div class="container">
        <div class="row">
            <h4 class="text-center mt-3">Meqaleye duzelis edin</h4>
            <div class="col-6 m-auto">
            <form class="mt-5 mb-3" method="post">
                <div class="mb-3">
                    <label for="categoryTitle" class="form-label">Kateqoriya adi</label>
                    <input type="text" value="<?= $show["category_name"]; ?>" required name="category_name" class="form-control" id="categoryTitle" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="categoryNum" class="form-label">Kategoriya sirasi</label>
                    <input type="number" value="<?= $show["category_num"]; ?>" required name="category_num" class="form-control" id="categoryNum">
                </div>
                <button type="submit" name="submit" class="btn btn-success">Deyis</button>
            </form>
            </div>
        </div>
    </div>