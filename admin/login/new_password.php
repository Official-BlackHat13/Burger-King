<?php
    include "../system/setting.php";
    include "../functions/routing.php";
    include "../system/tools.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background: #f4f4f4;
            height: 100vh;
        }
        .container{
            width: 100%;
            height: 100vh;
        }
        
    </style>
</head>
<body>

    <?php
       

        if(isset($_POST["submit"])){
            /* post input datas */
            $email = strip_tags(trim($_POST["email"]));
            $code = strip_tags(trim($_POST["code"]));
            $password = strip_tags(trim($_POST["password"]));
            $repeatPassword = strip_tags(trim($_POST["repeatPassword"]));

            /* check password and repet password */
            if($password == $repeatPassword){
                /* check code and email  */
                $controlCount = checkCode($code, $email);

                if($controlCount > 0){

                    /* update new password */
                    $update = $db->prepare("UPDATE adminlogin SET userPassword = ?, code = ? WHERE email = ?");
                    $ok = $update->execute(array(md5($password), null, $email));
                    if($ok){
                        showAlert("Uqurlu", "Yeni sifreniz uqurlu sekilde teyin olundu. Yonlendirlirsiniz...", "success");
                        go("login.php", 5);
                    }else{
                        showAlert("Xeta", "Emeliyyat uqursuzluqla sonlandi", "error");
                        back(3);
                    }
                }else{
                    showAlert("Xeta", "Daxil etdiyiniz melumatlar yanlisdir", "error");
                    back(3);
                }
            }else{
                showAlert("Xeta", "Sifreleriniz arasinda uyqunsuzluq var", "error");
                back(3);
            }
        }  

    ?>
    
    <div class="container d-flex justify-content-center align-items-center">
        <div class="div">
            <h4 class="mb-5">Yeni sifrenizi teyin etmek ucun melumatlari daxil edin</h4>
            <form action="" method="post" class="col-8">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email adresiniz daxil edin:</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Kodunuzu daxil edin</label>
                <input type="text" name="code" class="form-control" id="code" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Sifrenizi daxil edin</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="repeatpassword" class="form-label">Tekrar sifrenizi daxil edin</label>
                <input type="password" name="repeatPassword" class="form-control" id="repeatpassword" aria-describedby="emailHelp" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Sifreni deyis</button>
            </form>
        </div>
    </div>
</body>
</html>