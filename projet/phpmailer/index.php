<?php
//Include files of phpmailer
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

// Define name spaces
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'root', '');

// Create a random password
function str_random($length)
{
    $alphabet = "azertyuiopqsdfghjklmwxcvbn0123456789AZERTYUIOPQSDFGHJKLMWXCVBN!?#./&[(]})";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

if(isset($_POST['submit'])) {
    $Email = $_POST['Email'];

    $req = $bdd->prepare('SELECT * FROM users WHERE Email = ?');
    $req->execute([$Email]);

    if($req->rowCount() > 0) {
        // Done by using the code on https://github.com/PHPMailer/PHPMailer/blob/master/README.md
        // Create instance of Phpmailer
        $mail = new PHPMailer();

        // Set mailer to use smtp & setup
        $mail->isSMTP();
        $mail->SMTPAuth = "true";
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";

        // Set account sending mail
        $mail->Username = ""; // A remplir
        $mail->Password = ""; // Créer sur Google une application messagerie à partir de votre ordinateur,copier le code et le mettre ici

        // set email data
        $mail->Subject = "Password forget";
        $mail->setFrom(""); // Envoyeur A remplir

        // Create a new password & send it to the BDD
        $new_password = sha1(str_random(30));
        $bdd->prepare('UPDATE users SET password = ? WHERE Email = ?')->execute([sha1($new_password), $Email]);

        $mail->Body = "Voici votre nouveau mot de passe : {$new_password} ,merci de le changer au plus vite";
        $mail->addAddress($Email); // Destinataire

        // Send email
        if(isset($_POST['submit'])) {
            try {
                if ($mail->Send()) {
                    header('Location: /projet/connexion.php');
                } else {
                    echo '<script>alert("Veuillez saisir une adresse mail")</script>';
                }
            } catch (Exception $e) {
            }
        }

        // Closing smtp connection
        $mail->smtpClose();
    } else {
        echo '<script>alert("Adresse mail inéxistante")</script>';
    }
}






?>

<!DOCTYPE html>
<html>
<head>
    <title>Forget</title>
    <meta charset="utf-8">
</head>
<body>
<div class="Box" >
    <h1 class="form-control" >Mot de passe oublié</h1>

    <form action="" method="POST">
        <label>Email
            <input type="email" class="form-control" name="Email" class="form-control"/>
        </label>

        <input type="submit"  name="submit" class="btn"></input>

    </form>

    <div class="connexion" align="center">
        <a href="../connexion.php">
            <button class="btn">Go back</button>
        </a>
    </div>

</div>


<style>
    body {
        background-image: url("https://www.banquedesterritoires.fr/sites/default/files/styles/landscape_auto_crop/public/2021-03/hacking-3112539_1280.jpg?itok=aOEvGPsO");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .Box {
        text-align: center;
        background: white;
        border-radius: 10px;
        position: absolute;
        top : 50%;
        left: 49%;
        transform: translate(-50%, -50%);
        padding: 10px;
        width: 340px;
        margin: 50px auto;
    }
    .btn {
        font-size: 15px;
        font-weight: bold;
    }
</style>
</body>
</html>


