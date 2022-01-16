<?php
     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);
    /* Add datas database from slider forms */
    if(isset($_POST["submit"])){
        try{
            $file = $_FILES["file"]["name"];
            $fileName = rand(0, 999999).$file;
            $filePath = "uploads/".$fileName;
            $fileSize = $_FILES["file"]["size"];
            $fileType = $_FILES["file"]["type"];
            $path = substr($filePath, 8);
            $maxSize = 2000000;

            /* insert file size  */
                if($fileSize > $maxSize){
                    showAlert("Xeta", "Senedin olcusu 2GB artiq ola bilmez", "error");
                }
                else{
                    /* check file type */
                    if($fileType !== "image/jpeg" && $fileType !== "image/png"){
                        showAlert("Xeta", "Senedin formati yalniz png ve ya jpg ola biler", "error");
                    }else{
                        /* file uploaded success */
                        move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);
                        $data = [
                            $path,
                            $_POST["title"],
                            $_POST["description"],
                            $_POST["rank"],
                            $_POST["slider_active"],
                            $_POST["btn_text_1"],
                            $_POST["btn_color_1"],
                            $_POST["btn_url_1"],
                            $_POST["btn_text_2"],
                            $_POST["btn_color_2"],
                            $_POST["btn_url_2"]
                        ];
                        if(insertData($data)){
                            showAlert("Uqurlu", "Melumatlar uqurla yuklendi", "success");
                        }
                        else{
                            showAlert("Xeta", "Melumatlar yuklenerken xeta bas verdi", "error");
                        } 
                    } 
                }          
        }catch(Exception $e){
            /* show all errors */
            echo $e->getMessage();
        }
    }

?>

<!-- Slider form part start -->
<div class="container">
    <h2 class="text-center mb-5 mt-3">Slider formu</h2>
    <form action="" method="post"  class="slider-form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="first-blog">
                    <div class="mb-3">
                        <label for="file" class="form-label text-red">**Slider sekili**</label>
                        <input type="file" name="file" class="form-control" id="file" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label text-red">**Basliq**</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label text-red">**Slider metni**</label>
                        <div class="form-floating">
                        <textarea class="form-control" name="description" placeholder="Leave a comment here" id="description"></textarea>
                        <label for="floatingTextarea">Metnin iceriyi</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="rank" class="form-label text-red">**Slider sirasi**</label>
                        <input type="number" name="rank" class="form-control" id="rank" required>
                    </div>
                    <div class="mb-3">
                        <label for="activpassiv" class="form-label text-red">**Slider durumu**</label>
                        <select class="form-select" name="slider_active" aria-label="Default select example" id="activpassiv">
                            <option value="aktiv">Aktiv</option>
                            <option value="passiv">Passiv</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-5 col-lg-4">
                <div class="mb-3">
                    <label for="button_text1" class="form-label text-red">**Button 1 metni**</label>
                    <input type="text" name="btn_text_1" class="form-control" id="button_text1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="color1" class="form-label text-red">**Button 1 rengi**</label>
                    <input type="color" name="btn_color_1" class="form-control" id="color1">
                </div>
                <div class="mb-3">
                    <label for="url1" class="form-label text-red">**Button 1 linki**</label>
                    <input type="text" name="btn_url_1" class="form-control" id="url1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="button_text2" class="form-label text-red">**Button 2 metni**</label>
                    <input type="text" name="btn_text_2" class="form-control" id="button_text2" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="color2" class="form-label text-red">**Button 2 rengi**</label>
                    <input type="color" name="btn_color_2" class="form-control" id="color1">
                </div>
                <div class="mb-3">
                    <label for="url2" class="form-label text-red">**Button 2 linki**</label>
                    <input type="text" name="btn_url_2" class="form-control" id="url1" aria-describedby="emailHelp">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
    

</div>