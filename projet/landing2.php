
<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'root', '');

// Securité si utilisateur pas connecté mais tente quand meme d'allez sur cette page
if(!$_SESSION['Password']){
    header('Location: connexion.php');
} else {

    foreach($_SESSION as $key=>$value) {
        echo $key . ': ' . $value . '<br>' ;
    }

    $sql = "SELECT idCom, description, utilisateur_id FROM commentaire
        ORDER BY idCom ASC";

    $user_id = $_SESSION['id'];

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $tabObjetsSQL = $stmt->fetchAll();

    if(isset($_POST['Deposer'])){
        $commentaire = $_POST["ComRed"];
        $stmt = $bdd->prepare('INSERT INTO commentaire(description,utilisateur_id) VALUES(?,?)' );
        $stmt->execute(array($commentaire,$user_id));
        $stmt = $bdd->prepare('SELECT * FROM commentaire');
        $stmt->execute();
        $tabObjetsSQL = $stmt->fetchAll();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Landing</title>
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

    <div class="Height">

        <header>
            <div class="left">
                <label>SISecure</label>
            </div>
            <div class="right">
                <a href="deconnexion.php"><button class="button-17">Disconnect</button></a>
                <a href="PasswordProblem.php"><button class="button-17">Change Data</button></a>
                <a href="landing.php"><button class="button-17">Table Commentaire</button></a>
                <label class="button-17"><?php echo $_SESSION['Prenom']?></label>
            </div>
        </header>


        <?php
        if ($_SESSION['Permission'] == 2 or $_SESSION['Permission'] == 1 or $_SESSION['Permission'] == 0) {
            echo '<div class="container" align="center">
            <div class="row mb-md-5">
            </div>
            <div class="row mb-md-5">
                <div class="col-3">
                </div>
                <div class="col-6">
                    <h2 class="text-center">Table commentaire</h2>
                </div>
                <div class="col-3">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <table class="table table-striped" align="center">
                        <thead>
                        <tr>
                            <th scope="col">idCom</th>
                            <th scope="col">description</th>
                            <th scope="col">utilisateur_id</th>
                        </tr>
                        </thead>
                        <tbody>
            ';
            foreach($tabObjetsSQL as $unObjet) {
                echo "<tr>";
                echo "<th scope='col'>" . $unObjet['idCom'] . "</th>";
                echo "<th scope='col'>" . $unObjet['description'] . "</th>";
                echo "<th scope='col'>" . $unObjet['utilisateur_id'] . "</th>";
                echo "</tr>";
            }
            echo '</tbody>
                    </table>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
            ';
        }
        ?>

        <br>
        <?php
        if ($_SESSION['Permission'] == 0) {
            // Espace pour ecrire requete
            echo '<div>
                <form method="POST" action="" align="center">
                    <textarea name="ComRed" rows=4 cols=40>Veuillez ajouter votre commentaire</textarea>
                    <br/>
                    <input type="submit" class="btn" name="Deposer" value="Deposer">
                </form>
            </div>';
        }
        ?>

        <br>

        <?php
        if ($_SESSION['Permission'] == 2) {
            // Reset BDD
            echo '<div>
                <form method="POST" action="" align="center">
                    <input type="submit" class="btn" name="RemiseZero" value="Remise A Zero">
                </form>
            </div>';
            // Supprimer Utilisateur
            echo '<div>
                <form method="POST" action="" align="center">
                    <label>Entrer le numero ID de la personne a enlever de la base de donnee</label>
                    <input type="text" name="SupUtil" class="form-control" placeholder="Id">
                    <br/>
                    <input type="submit" class="btn" name="SuppUtilisateur" value="Valider">
                </form>
            </div>';

        }
        ?>

        <footer>
            <p>© 2022 SSI ||| Contact : maxime.montavon@efrei.net</p>
        </footer>
    </div>

</div>
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
    ul {
        list-style-type: none;
    }

    body {
        background: blue;
    }
    header {
        /*background: red;*/
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
    .form-control {
        min-height: 38px;
        border-radius: 2px;
    }
    #Welcome {
        color: white;
    }
    .Height {
        Height: 100%;
    }

    #CentralDiv {

        margin-right: 10px;
        margin-left: 10px;
        margin-top: 30px;
        margin-bottom: 5px;
        border-radius: 20px;
        /*background: white;*/
        text-align: center;
    }
    #SendDiv {
        margin: 0 auto;
        display: table;
        margin-top: 10px;
        margin-bottom: 10px;
        border: solid 0.3em black;
        border-radius: 20px;
        background: white;
        text-align: center;
    }
    #KeyDiv {
        margin: 0 auto;
        display: table;
        margin-top: 10px;
        margin-bottom: 10px;
        border: solid 0.3em black;
        border-radius: 20px;
        background: white;
        text-align: center;
    }
    #ReceiveDiv {
        margin: 0 auto;
        display: table;
        border: solid 0.3em black;
        border-radius: 20px;
        background: white;
        text-align: center;
    }
    #inputPassword {
        margin-left: 100px;
        margin-right: 100px;
        margin-bottom: 15px;
    }
    #FileFormDiv {
        margin-left: 50px;
        margin-right: 50px;
        margin-bottom: 15px;
        margin-inside: 10px;
    }
    #SubmitFormDiv {
        margin-bottom: 15px;
    }

    .list-group {
        /* border: solid 0.3em black; */
        margin-left: 50px;
        margin-right: 50px;
        display: grid;
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

<script>

</script>

?>

