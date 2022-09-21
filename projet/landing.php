
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

    $sql = "SELECT id, Prenom, password, Email, Nom, DateNaissance, NumCB, Ville, Permission FROM users
        ORDER BY id ASC";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $tabObjetsSQL = $stmt->fetchAll();


    if(isset($_POST['Deposer'])){
        $request = $_POST["ReqSQL"];
        echo($request);
        $stmt = $bdd->prepare($request);
        $stmt->execute();
        $tabObjetsSQL = $stmt->fetchAll();
    }
    if(isset($_POST['RemiseZero'])){
        $stmt = $bdd->prepare('SELECT * FROM users');
        $stmt->execute();
        $tabObjetsSQL = $stmt->fetchAll();
    }
    if(isset($_POST['SuppUtilisateur'])){
        $delete = $_POST["SupUtil"];
        $stmt = $bdd->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$delete]);
        $stmt = $bdd->prepare('SELECT * FROM users');
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
                <a href="landing2.php"><button class="button-17">Table Commentaire</button></a>
                <label class="button-17"><?php echo $_SESSION['Prenom']?></label>
            </div>
        </header>


        <?php
        if ($_SESSION['Permission'] == 2 or $_SESSION['Permission'] == 1 ) {
            echo '<div class="container" align="center">
                   <h2 class="text-center">Table users</h2>

            <div class="cadre-table-scroll">
                    <table class="table-scroll" align="center">
                        <thead>
                        <tr class="info">
                            <th scope="col">id</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Mot de passe</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Date Naissance</th>
                            <th scope="col">NumCB</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Permission</th>
                        </tr>
                        </thead>
                        <tbody>
            ';
            foreach($tabObjetsSQL as $unObjet) {
                echo "<tr>";
                echo "<th scope='col'>" . $unObjet['id'] . "</th>";
                echo "<th scope='col'>" . $unObjet['Prenom'] . "</th>";
                echo "<th scope='col'>" . $unObjet['password'] . "</th>";
                echo "<th scope='col'>" . $unObjet['Email'] . "</th>";
                echo "<th scope='col'>" . $unObjet['Nom'] . "</th>";
                echo "<th scope='col'>" . $unObjet['DateNaissance'] . "</th>";
                echo "<th scope='col'>" . $unObjet['NumCB'] . "</th>";
                echo "<th scope='col'>" . $unObjet['Ville'] . "</th>";
                echo "<th scope='col'>" . $unObjet['Permission'] . "</th>";
                echo "</tr>";
            }
            echo '</tbody>
                    </table>
            </div>
        </div>
            ';
        }
        ?>
        <?php
        if ($_SESSION['Permission'] == 0) {
            echo '<div class="container" align="center">
            <div class="row mb-md-5">
            </div>
            <div class="row mb-md-5">
                <div class="col-3">
                </div>
                <div class="col-6">
                    <h2 class="text-center">Table users</h2>
                </div>
                <div class="col-3">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <table class="table table-striped" style="overflow-y:scroll" align="center">
                        <thead>
                        <tr class="info">
                            <th scope="col">id</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Ville</th>
                        </tr>
                        </thead>
                        <tbody>
            ';
            foreach($tabObjetsSQL as $unObjet) {
                echo "<tr>";
                echo "<th scope='col'>" . $unObjet['id'] . "</th>";
                echo "<th scope='col'>" . $unObjet['Prenom'] . "</th>";
                echo "<th scope='col'>" . $unObjet['Nom'] . "</th>";
                echo "<th scope='col'>" . $unObjet['Ville'] . "</th>";
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
        if ($_SESSION['Permission'] == 2) {
            // Espace pour ecrire requete
            echo '<div>
                <form method="POST" action="" align="center">
                    <textarea name="ReqSQL" rows=4 cols=40>Saisir votre requete SQL</textarea>
                    <br/>
                    <input type="submit" class="btn" name="Deposer" value="Deposer">
                </form>
            </div>';
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

    .Height {
        Height: 100%;
    }

    table {
        background: #f5f5f5;
        border-collapse: separate;
        box-shadow: inset 0 1px 0 #fff;
        font-size: 12px;
        line-height: 24px;
        margin: 30px auto;
        text-align: left;
        width: 800px;
    }
    .cadre-table-scroll {
        display: inline-block;
        height: 20em;
        overflow-y: scroll;
    }

    .table-scroll thead tr {
        position: static;
        top: 0;
    }
    .table-scroll tfoot th {
        position: static;
        bottom: 0;
    }

    .info{

        background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
        border-left: 1px solid #555;
        border-right: 1px solid #777;
        border-top: 1px solid #555;
        border-bottom: 1px solid #333;
        box-shadow: inset 0 1px 0 #999;
        color: #fff;
        font-weight: bold;
        padding: 10px 15px;
        position: relative;
        text-shadow: 0 1px 0 #000;
    }

    th {
        border-right: 1px solid #fff;
        border-left: 1px solid #e8e8e8;
        border-top: 1px solid #fff;
        border-bottom: 1px solid #e8e8e8;

        padding: 10px 15px;
        position: relative;
        transition: all 300ms;
    }
    th:first-child {
        box-shadow: inset 1px 0 0 #fff;
    }

    th:last-child {
        border-right: 1px solid #e8e8e8;
        box-shadow: inset -1px 0 0 #fff;
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

