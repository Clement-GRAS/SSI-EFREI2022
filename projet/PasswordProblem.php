<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'root', '');

if(!$_SESSION['Password']){
    header('Location: connexion.php');
}
else{
    if(!empty($_POST)){

        if(isset($_POST['PasswordChange'])) {
            if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
                $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
            }else{
                $Prenom = $_SESSION['Prenom'];
                $password=  sha1($_POST['password']);
                $bdd->prepare('UPDATE users SET password = ? WHERE Prenom = ?')->execute([$password, $Prenom]);
                //echo $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
                header('Location: Landing.php');
            }
        }

        if(isset($_POST['EmailChange'])) {
            if(empty($_POST['email']) || $_POST['email'] != $_POST['email_confirm']){
                $_SESSION['flash']['danger'] = "Les emails ne correspondent pas";
            }else{
                $Prenom = $_SESSION['Prenom'];
                $email =  $_POST['email'];
                $bdd->prepare('UPDATE users SET Email = ? WHERE Prenom = ?')->execute([$email, $Prenom]);
                //echo $_SESSION['flash']['success'] = "Votre email a bien été mis à jour";
                header('Location: Landing.php');
            }
        }

    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Account</title>
    <meta charset="utf-8">
</head>
<body>


<div class="background">
    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    <header>
        <div class="left">
            <label>ChouetteTransfert</label>
        </div>
        <div class="right">
            <a href="deconnexion.php"><button class="button-17">Disconnect</button></a>
            <a href="landing.php"><button class="button-17">Accueil</button></a>
            <label class="button-17"><?php echo $_SESSION['Prenom']?></label>
        </div>
    </header>

    <div class="Box">
        <div class="login-form">

            <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Changer de mot de passe"/>
                    <br/>
                    <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du mot de passe"/>
                </div>
                <br/>
                <input type="submit" name="PasswordChange" value="Change password" class="btn"></input>
            </form>
            <br/><br/>
            <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Changer de mail"/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email_confirm" placeholder="Confirmation de mail"/>
                </div>
                <br/>
                <input type="submit" name="EmailChange" value="Change Email" class="btn"></input>
            </form>
        </div>

    </div>

</div>

<footer>
    <p>© 2022 Mastercamp ||| Pour nous contacter : ChouetteTransfert@efrei.net</p>
</footer>



</body>

<style>
    footer {
        position: fixed;
        padding: 10px 10px 0px 10px;
        bottom: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: cornflowerblue;
        color: white;
    }

    header {
        display: flex;
        width: 99%;
        padding: 10px;
    }
    .right {
        margin-left: auto;
        margin-right: 0;
    }
    .left {
        color: white;
        font-size: xx-large;
        font-family: "Google Sans", Roboto, Arial, sans-serif;
        margin-left: 0;
        margin-right: auto;
    }

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
        text-align: center;
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
        border: solid 0.3em black;
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


    /* Fond dynamique made by https://wweb.dev/resources/animated-css-background-generator/ */
    @keyframes animate {
        0%{
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }
        100%{
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
        }
    }

    .background {
        position: fixed;
        width: 100vw;
        height: 100vh;
        top: 0;
        left: 0;
        margin: 0;
        padding: 0;
        background: #4e54c8;
        overflow: hidden;
    }
    .background li {
        position: absolute;
        display: block;
        list-style: none;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.2);
        animation: animate 19s linear infinite;
    }




    .background li:nth-child(0) {
        left: 65%;
        width: 108px;
        height: 108px;
        bottom: -108px;
        animation-delay: 1s;
    }
    .background li:nth-child(1) {
        left: 70%;
        width: 124px;
        height: 124px;
        bottom: -124px;
        animation-delay: 3s;
    }
    .background li:nth-child(2) {
        left: 62%;
        width: 109px;
        height: 109px;
        bottom: -109px;
        animation-delay: 1s;
    }
    .background li:nth-child(3) {
        left: 44%;
        width: 182px;
        height: 182px;
        bottom: -182px;
        animation-delay: 6s;
    }
    .background li:nth-child(4) {
        left: 13%;
        width: 173px;
        height: 173px;
        bottom: -173px;
        animation-delay: 18s;
    }
    .background li:nth-child(5) {
        left: 86%;
        width: 151px;
        height: 151px;
        bottom: -151px;
        animation-delay: 18s;
    }
    .background li:nth-child(6) {
        left: 72%;
        width: 126px;
        height: 126px;
        bottom: -126px;
        animation-delay: 6s;
    }
    .background li:nth-child(7) {
        left: 86%;
        width: 138px;
        height: 138px;
        bottom: -138px;
        animation-delay: 34s;
    }
    .background li:nth-child(8) {
        left: 0%;
        width: 183px;
        height: 183px;
        bottom: -183px;
        animation-delay: 6s;
    }
    .background li:nth-child(9) {
        left: 50%;
        width: 191px;
        height: 191px;
        bottom: -191px;
        animation-delay: 4s;
    }

    /* CSS bouton Google  */
    .button-17 {
        align-items: center;
        appearance: none;
        background-color: #fff;
        border-radius: 24px;
        border-style: none;
        box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
        box-sizing: border-box;
        color: #3c4043;
        cursor: pointer;
        display: inline-flex;
        fill: currentcolor;
        font-family: "Google Sans",Roboto,Arial,sans-serif;
        font-size: 14px;
        font-weight: 500;
        height: 48px;
        justify-content: center;
        letter-spacing: .25px;
        line-height: normal;
        max-width: 100%;
        overflow: visible;
        padding: 2px 24px;
        position: relative;
        text-align: center;
        text-transform: none;
        transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: auto;
        will-change: transform,opacity;
        z-index: 0;
    }

    .button-17:hover {
        background: #F6F9FE;
        color: #174ea6;
    }

    .button-17:active {
        box-shadow: 0 4px 4px 0 rgb(60 64 67 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
        outline: none;
    }

    .button-17:focus {
        outline: none;
        border: 2px solid #4285f4;
    }

    .button-17:not(:disabled) {
        box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
    }

    .button-17:not(:disabled):hover {
        box-shadow: rgba(60, 64, 67, .3) 0 2px 3px 0, rgba(60, 64, 67, .15) 0 6px 10px 4px;
    }

    .button-17:not(:disabled):focus {
        box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
    }

    .button-17:not(:disabled):active {
        box-shadow: rgba(60, 64, 67, .3) 0 4px 4px 0, rgba(60, 64, 67, .15) 0 8px 12px 6px;
    }

    .button-17:disabled {
        box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
    }

</style>
</html>
