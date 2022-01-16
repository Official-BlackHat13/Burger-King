    <?php
        $id = @$_GET["id"];
        $selectCheaf = selectCheaf($id);
        if(isset($_POST["submit"])){
            $file = $_FILES["file"]["name"];
            $fileName = rand(0,999999).$file;
            $filePath = "uploads/".$fileName;
            $Path = substr($filePath, 8);
            $fileTmpName = $_FILES["file"]["tmp_name"];

            $personName = $_POST["person_name"];
            $personPosition = $_POST["person_position"];

            if($fileTmpName == true && !empty($fileTmpName)){
                 //check file size
                if($_FILES["file"]["size"] < 2000000){
                    //check file type
                    if($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png"){
                        move_uploaded_file($fileTmpName, $filePath);
                        unlink("uploads/".$selectCheaf["team_img"]);
                    }else{
                        showAlert("Xeta", "Senedin formati png ve ya jpeg ola biler", "error");
                        header("Refresh:2; url=?page=update-chef");
                    }
                }else{
                    showAlert("Xeta", "Senedin olcusu 2GB artiq ola bilmez", "error");
                    header("Refresh:2; url=?page=update-chef");
                }

            }else{
                $Path = $selectCheaf["team_img"];
            }
            
            $update = $db->prepare("UPDATE cheaf_team SET 
                team_img = ?,
                team_person = ?,
                team_person_position = ? WHERE team_ID = ?
            ");
            $ok = $update->execute(array($Path, $personName, $personPosition, $id));
            if($ok == true){
                showAlert("Uqurlu", "Melumatlar uqurla yenilendi", "success");
                header("Refresh:2; url=?page=chef");
            }else{
                showAlert("Xeta", "Mmelumatlar yenilenerken xeta bas verdi", "error");
                header("Refresh:2; url=?page=update-chef");
            }

           
        }

    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 m-auto">
                <h4 class="mt-3 mb-3">Isci formunu yenileyin</h4>
                <form class="mb-3" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="file" class="form-label">İscinin sekili</label>
                        <input type="file" name="file" class="form-control" id="file" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="personName" class="form-label">İscinin adi</label>
                        <input type="text"  value="<?= $selectCheaf["team_person"]; ?>" name="person_name" class="form-control" id="personName">
                    </div>
                    <div class="mb-3">
                        <label for="personposition" class="form-label">İscinin vezifesi</label>
                        <input type="text" value="<?= $selectCheaf["team_person_position"]; ?>" name="person_position" class="form-control" id="personposition">
                        
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>