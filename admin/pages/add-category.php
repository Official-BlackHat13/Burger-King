
<div class="container">
        <div class="row">
            <h4 class="text-center mt-3">Meqale elave edin</h4>
            <div class="col-6 m-auto">
            <form class="mt-5 mb-3" method="post">
                <div class="mb-3">
                    <label for="categoryTitle" class="form-label">Kateqoriya adi</label>
                    <input type="text" required name="category_name" class="form-control" id="categoryTitle" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="categoryNum" class="form-label">Kategoriya sirasi</label>
                    <input type="number" required name="category_num" class="form-control" id="categoryNum">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Gonder</button>
            </form>
            </div>
        </div>
    </div>
    <?php


    if(isset($_POST["submit"])){
        $categoryName = $_POST["category_name"];
        $categoryNum = $_POST["category_num"];
        
        if(addCategory($categoryName, $categoryNum)){
            showAlert("Uqurlu", "Melumatlar uqurla yuklendi", "success");
            go("?page=category", 3);
          
        }else{
            showAlert("Xeta", "Melumatlar yuklenerken xeta bas verdi", "error");
            back(3);
          
        }
    }
?>