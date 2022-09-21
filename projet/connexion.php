<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'root', '');

if(isset($_POST['Connecter'])){
    if(!empty($_POST['Prenom']) AND !empty($_POST['Password'])) {
        $Prenom = htmlspecialchars($_POST['Prenom']);
        $Password = sha1($_POST['Password']) ; // Ici le sha1 va permettre de le decrypter de la BDD une autre solution, plus sécurisée serait par exemple password_hash

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE Prenom = ? AND password = ?');
        $recupUser->execute(array($Prenom,$Password));

        if($recupUser->rowCount() > 0){
            $_SESSION['Prenom'] = $Prenom;
            $_SESSION['Password'] = $Password;
            $donnee = $recupUser->fetch();
            $_SESSION['id'] = $donnee['id'];
            $_SESSION['Permission'] = $donnee['Permission'];

            //Redirection
            header('Location: Landing.php');
        }else{
            echo '<script>alert("Password or Prenom incorrect")</script>';
        }

    }else{
        echo '<script>alert("Complete all data")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
</head>
<body>

<div class="Box">
<div class="login-form">
    <form method="POST" action="" align="center">

        <input type="text" name="Prenom" class="form-control" placeholder="Prenom">
        <br/>
        <input type="password" name="Password" class="form-control" placeholder="Password">
        <br/>
        <label for=""><a href="phpmailer/index.php">(J'ai oublié mon mot de passe)</a></label>
        <br/><br/>
        <input type="submit" class="btn" name="Connecter">

    </form>
</div>
<div class="register" align="center">
    <a href="inscription.php">
        <button class="btn">Not yet registered ?</button>
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
        position: absolute;
        top : 50%;
        left: 49%;
        transform: translate(-50%, -50%);
        padding: 10px;
        width: 340px;
        margin: 50px auto;
    }

    .login-form form {
        position: center;
        margin-bottom: 15px;
        border-radius: 20px;
        background: white;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {
        font-size: 15px;
        font-weight: bold;
    }
</style>
</body>
</html>
