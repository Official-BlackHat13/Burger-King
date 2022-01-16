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
        }
        .container{
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body>

    <?php
        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        if(isset($_POST["submit"])){
            $email = strip_tags(trim($_POST["email"]));
            /* check email  */
            $controlCount = checkEmail($email);

            if($controlCount > 0){
                /* update code  */
                $code = rand(0, 9000)."_".rand(0, 9000);
                $update = $db->prepare("UPDATE adminlogin set code = ? WHERE email = ?");
                $update->execute(array($code, $email));
                
                require '../PHPMailer/Exception.php';
                require '../PHPMailer/PHPMailer.php';
                require '../PHPMailer/SMTP.php';

                
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.mail.ru';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'asif_seferov_1995@mail.ru';                     //SMTP username
                    $mail->Password   = 'sumqayit_lerik1995';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('asif_seferov_1995@mail.ru', 'Admin Login');
                    $mail->addAddress($email);     //Add a recipient


                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Sifreni unutmusunuz?';
                    $mail->Body    = "Sifrenizi berpa etmek ucun bildirilen koddan istifade edin: <br> \n
                    Kod:  <b>$code</b>";

                    if($mail->send()){
                        showAlert("Uqurlu", "Sorqunuz mailinize gonderilmisdir", "success");
                        go("new_password.php", 5);
                    }else{
                        showAlert("Xeta", "Sorqu gondeilerken xeta bas verdi", "error");
                        back(3);
                    }
                   
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

            }else{
               
                showAlert("Xeta", "Bele bir hesab qeyde alinmadi", "error");
                //back(3);
            }
        }

    ?>
    
    <div class="container d-flex justify-content-center align-items-center">
        <div class="div">
            <h4 class="mb-5">Sifrenizi berpa etmek ucun mailinizi daxil edin</h4>
            <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Gonder</button>
            </form>
        </div>
    </div>
</body>
</html>