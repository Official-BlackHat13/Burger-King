<?php
    $id = $_GET["id"];
    
    $sh = getSLiderById($id);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if(isset($_POST["submit"])){
        
      try{
        $file = $_FILES["file"]["name"];
      $fileName = rand(0, 999999).$file;
      $fileSize = $_FILES["file"]["size"];
      $fileType = $_FILES["file"]["type"];
      $fileTmpName = $_FILES["file"]["tmp_name"];
      $filePath = "uploads/".$fileName;
      $path = substr($filePath, 8);
      $maxSize = 2000000;

      if($fileTmpName && !empty($fileTmpName)){

            // Check file size
            if($fileSize > $maxSize){
                showAlert("Xeta", "Senedin olcusu 2GB artiq ola bilmez", "error");
            }
            else
            {
                // Check file type
                if($fileType !== "image/jpeg" && $fileType !== "image/jpg" && $fileType !== "image/png"){
                showAlert("Xeta", "Senedin formati jpg ve ya png ola biler", "error");
                }
                else{
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) // is uploaded
                    @unlink("uploads/".$sh["img"]);
                }
                   
            }
      
      }else{
          $path = $sh["img"];

          
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
            $_POST["btn_url_2"],
            (isset($_POST["btn_status1"])) ? 1 : 0,
            (isset($_POST["btn_status2"])) ? 1 : 0,
            $id
        ];

        if(updateSLider($data)){
            showAlert("Uğurlu", "Məlumatlar uğurla yeniləndi", "success");
        }  
        else{
            showAlert("Xeta", "Məlumatlar deyisdirilerken xeta bas verdi", "error");
        }
      }
           
            
     
      }catch(Exception $e){
        echo $e->getMessage();
      }
      
                
    }

    $sh = getSLiderById($id);
    


?>
<div class="container">
    <h2 class="text-center mb-5 mt-3">Slider formu yenileyin</h2>
    <form action="" method="post"  class="slider-form" enctype="multipart/form-data">
            <div class="d-flex justify-content-around mb-5">
                <div class="mb-5">
                    <label for="btn1" class="text-red">Button 1</label><br>
                    <label class="switch">
                        <input type="checkbox" id="btn1" name="btn_status1" <?php if($sh["btn_status_1"] == 1){echo "checked";} ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <img src="<?= "uploads/".$sh["img"]; ?>" width="100" style="object-fit: cover;">
                <div class="mb-5">
                    <label for="btn2" class="text-red">Button 2</label><br>
                    <label  class="switch m-auto">
                        <input type="checkbox" id="btn2" name="btn_status2" <?php if($sh["btn_status_2"] == 1){echo "checked";} ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="first-blog">
                    <div class="mb-3">
                        <label for="file" class="form-label text-red">**Slider sekili**</label>
                        <input type="file" name="file" class="form-control" id="file" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label text-red">**Basliq**</label>
                        <input type="text" name="title" class="form-control" id="title" value="<?= $sh["title"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label text-red">**Slider metni**</label>
                        <div class="form-floating">
                        <textarea class="form-control" name="description" placeholder="leave here comment" id="description"><?= $sh["description"]; ?></textarea>
                         <label for="floatingTextarea">Metnin iceriyi</label> 
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="rank" class="form-label text-red">**Slider sirasi**</label>
                        <input type="number" value="<?= $sh["rank"]; ?>" name="rank" class="form-control" id="rank">
                    </div>
                    <div class="mb-3">
                        <label for="activpassiv" class="form-label text-red">**Slider durumu**</label>
                        <select class="form-select" name="slider_active" aria-label="Default select example" id="activpassiv">
                            <option value="aktiv" <?php if($sh["isActive"] == "aktiv"){echo "selected";} ?>>Aktiv</option>
                            <option value="passiv" <?php if($sh["isActive"] == "passiv"){echo "selected";} ?>>Passiv</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-5 col-lg-4">
                <div class="mb-3">
                    <label for="button_text1" class="form-label text-red">**Button 1 metni**</label>
                    <input type="text" value="<?= $sh["btn_text_1"]; ?>" name="btn_text_1" class="form-control" id="button_text1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="color1" class="form-label text-red">**Button 1 rengi**</label>
                    <input type="color" value="<?= $sh["btn_color_1"]; ?>" name="btn_color_1" class="form-control" id="color1">
                </div>
                <div class="mb-3">
                    <label for="url1" class="form-label text-red">**Button 1 linki**</label>
                    <input type="text" value="<?= $sh["btn_url_1"]; ?>" name="btn_url_1" class="form-control" id="url1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="button_text2" class="form-label text-red">**Button 2 metni**</label>
                    <input type="text" value="<?= $sh["btn_text_2"]; ?>" name="btn_text_2" class="form-control" id="button_text2" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="color2" class="form-label text-red">**Button 2 rengi**</label>
                    <input type="color" value="<?= $sh["btn_color_2"]; ?>" name="btn_color_2" class="form-control" id="color1">
                </div>
                <div class="mb-3">
                    <label for="url2" class="form-label text-red">**Button 2 linki**</label>
                    <input type="text" value="<?= $sh["btn_url_2"]; ?>" name="btn_url_2" class="form-control" id="url1" aria-describedby="emailHelp">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
</div>