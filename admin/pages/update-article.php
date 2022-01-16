    <?php
        $id = $_GET["id"];
         $show = innerTablo($id);
        if(isset($_POST["submit"])){
            $show = innerTablo($id);
            

            $file = $_FILES["file"]["name"];
            $fileName = rand(0, 999999).$file;
            $filePath = "uploads/".$fileName;
            $fileTmpName = $_FILES["file"]["tmp_name"];
            $maxSize = 2000000;
            $Path = substr($filePath, 8);

            if($_FILES["file"]["tmp_name"] && !empty($_FILES["file"]["tmp_name"])){
                 //check file size
                 if($_FILES["file"]["size"] < $maxSize){
                    //check fil type
                    if($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png"){
                        move_uploaded_file($fileTmpName, $filePath);
                        unlink("uploads/".$show["article_img"]);
                    }else {
                        showAlert("Xeta", "Senedin formati png ve ya jpg ola biler", "error");
                        back(3);
                    }
                }else {
                    showAlert("Xeta", "Senedin olcusu 2GB artiq ola bilmez","error");
                    back(3);
                }
            }else {
                $Path = $show["article_img"];
            }

            $data = [
                $Path,
                $_POST["article_title"],
                $_POST["article_content"],
                $_POST["article_category"],
                $id
            ];

            $ok = updateArticle($data);
                //check update data
                if($ok == true){
                showAlert("Uqurlu", "Melumatlar uqurla yenilendi", "success");
                    go("?page=blog", 3);
                }else {
                    showAlert("Xeta", "Melumatlar yenilenerken xeta bas verdi", "error");
                    back(3);
                        }
               
            }
        $list = selectCategory();
    ?>

    <div class="container">
        <div class="row">
            <h4 class="text-center mt-3">Meqaleni yenileyin</h4>
            <div class="col-6 m-auto">
            <form class="mt-5 mb-3" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="file" class="form-label">Meqalenin sekili</label>
                    <input type="file"  name="file" class="form-control" id="file" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Meqalenin basliqi</label>
                    <input type="text" value="<?= $show["article_title"]; ?>"  name="article_title" class="form-control" id="title">
                </div>
              
                <label for="category">Meqalenin kateqoriyasi</label>
                <select class="form-select mb-3"   name="article_category" aria-label="Default select example" id="category">
                    <?php
                    foreach($list as $category){
                            ?>
                                <option <?php if($show["article_category"] == $category["category_name"]){echo "selected";} ?>  value="<?= $category["category_name"]; ?>"><?= $category["category_name"]; ?></option>
                            <?php
                    }
                   ?>    
                </select>

                <div class="form-floating mb-3">
                    <p class="font-weight-bold">Meqalenin mezmunu</p>
                    <textarea class="form-control"  style="height: 200px;" name="article_content" id="content"><?= $show["article_content"]; ?></textarea>
                   
                </div>

                <button type="submit" name="submit" class="btn btn-success">Gonder</button>
            </form>
            </div>
        </div>
    </div>