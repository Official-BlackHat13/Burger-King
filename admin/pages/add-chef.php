    <?php
        //Post form
        if(isset($_POST["submit"])){
            $file = $_FILES["file"]["name"];
            $fileName = rand(0, 999999).$file;
            $filePath = "uploads/".$fileName;
            $Path = substr($filePath, 8);

            $personName = $_POST["person_name"];
            $personPosition = $_POST["person_position"];
            
            // check file size
            if($_FILES["file"]["size"] < 2000000){
                //check file type
                if($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png"){
                    move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);
                    $insert = $db->prepare("INSERT INTO cheaf_team(team_img, team_person, team_person_position) VALUES(?, ?, ?)");
                    $ok = $insert->execute(array($Path, $personName, $personPosition));
                    if($ok){
                        showAlert("Uqurlu", "Melumatlar uqurla gonderildi", "success");
                        header("Refresh:3; url=?page=chef");
                    }
                        
                    
                }else{
                    showAlert("Xeta", "Senedin formati jpg ve ya png ola biler", "error");
                    header("Refresh:3; url=?page=add-chef");
                }
            }else{
                showAlert("Xeta", "Senedin olcusu 2GB artiq ola bilmez", "error");
                header("Refresh:3; url=?page=add-chef");
            }
                 
  
        }
             

      
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 m-auto">
                <h4 class="mt-3 mb-3">Isci formunu doldurun</h4>
                <form class="mb-3" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="file" class="form-label">İscinin sekili</label>
                        <input type="file" name="file" class="form-control" id="file" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="personName" class="form-label">İscinin adi</label>
                        <input type="text" name="person_name" class="form-control" id="personName" required>
                    </div>
                    <div class="mb-3">
                        <label for="personposition" class="form-label">İscinin vezifesi</label>
                        <input type="text" name="person_position" class="form-control" id="personposition" required>
                        
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>