<?php
// Initialiser ses sessions
session_start();

// Connection a la BDD via phpmyadmin
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'root', '');

// Au moment de la validation du formulaire ( Cliquer sur bouton déposer )
if(isset($_POST['Deposer'])){
    if(!empty($_POST['Prenom']) AND  !empty($_POST['Password']) AND !empty($_POST['Email']) AND !empty($_POST['confirmPassword']) AND  !empty($_POST['Nom']) AND  !empty($_POST['DateNaissance']) AND  !empty($_POST['NumCB']) AND  !empty($_POST['Ville']) ){
        if($_POST['Password'] == $_POST['confirmPassword']){

            // Securité des entrées - Security
            $Prenom = htmlspecialchars($_POST['Prenom']); // Htmlspecialchars ici utiliser pour empecher un utilisateur d'entrerdu code, et donc par exemple de faire du SQL Injection
            $Nom = htmlspecialchars($_POST['Nom']);
            $DateNa = date($_POST['DateNaissance']);
            $NumCB = htmlspecialchars($_POST['NumCB']);
            $Ville = htmlspecialchars($_POST['Ville']);
            $Password = sha1($_POST['Password']);
            $Email = $_POST['Email']; //AF


            // Verifier que le Prenom ou Email n'existe pas deja dans la BDD - Check user -Email exist in the BDD
            // $verifyPrenom = $bdd->prepare('SELECT * FROM users WHERE Prenom = ?');
            // $verifyPrenom->execute([$Prenom]);
            $verifyEmail = $bdd->prepare('SELECT * FROM users WHERE Email = ?');
            $verifyEmail->execute([$Email]);

            if($verifyEmail->rowcount() != 0) {
                echo '<script>alert("Email deja utilisé")</script>';
            }else {

                // Inserer le form dans la BDD - Insert into BDD
                $insertUser = $bdd->prepare('INSERT INTO users(Prenom,password,Email,Nom,DateNaissance,NumCB,Ville) VALUES(?, ?, ?, ?, ?, ?, ?)');
                $insertUser->execute(array($Prenom, $Password,$Email, $Nom, $DateNa, $NumCB, $Ville));

                // Recuperer ID utilisateur + Declarer sessions liées
                $recupUser = $bdd->prepare('SELECT * FROM users WHERE Prenom = ? AND password = ? AND Email = ? AND Nom = ? AND DateNaissance = ? AND NumCB = ? AND Ville = ?');
                $recupUser->execute(array($Prenom,$Password,$Email,$Nom, $DateNa, $NumCB, $Ville));
                if($recupUser->rowCount() > 0) {
                    $_SESSION['Prenom'] = $Prenom;
                    $_SESSION['Password'] = $Password;
                    $_SESSION['Email'] = $Email;
                    $_SESSION['id'] = $recupUser->fetch()['id'];
                    $_SESSION['Permission'] = $recupUser->fetch()['Permission'];

                    // Redirection pour se connecter
                    header('Location: connexion.php');
                }
            }
        }else{
            echo '<script>alert("Veuillez saisir le meme mot de passe")</script>';
        }
    }else{
        echo '<script>alert("Veuillez completer le formulaire")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
</head>
<body>
<div class="echo"></div>
<div class="Box">
<div class="login-form">
    <form method="POST" action="" align="center">

        <input type="text" name="Prenom" class="form-control" placeholder="Prenom">
        <br/>
        <input type="text" name="Nom" class="form-control" placeholder="Nom">
        <br/>
        <input type="email" name="Email" class="form-control" placeholder="Email">
        <br/>
        <input type="date" name="DateNaissance" class="form-control" placeholder="Date de Naissance">
        <br/>
        <input type="text" name="NumCB" class="form-control" placeholder="Numero de CB">
        <br/>
        <input type="text" name="Ville" class="form-control" placeholder="Ville">
        <br/>
        <input type="password" name="Password" class="form-control" placeholder="Password" id="Password">
        <br/>
        <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" id="cpassword">
        <br/><br/>
        <input type="submit" class="btn" name="Deposer">
        <br/><br/>

    </form>

</div>
<div align="center">
    <a href="connexion.php">
        <button class="btn">Already a account</button>
    </a>
</div>
</div>
</body>
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
    .login-form {
        width: 340px;
        margin: 50px auto;
    }
    .login-form form {
        border-radius: 20px;
        margin-bottom: 10px;
        background: white;
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 10px;
    }
    .btn {
        font-size: 15px;
        font-weight: bold;
    }
    .echo {
        position: absolute;
        top : 10%;
        left: 49%;
        color: red;
        border: cornflowerblue;
        background: blue;
        font-weight: bold;


    }
</style>
</html>
