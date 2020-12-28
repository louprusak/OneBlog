<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Connexion</title>
    <?php
    require ('head.php');
    ?>
</head>

<body>
<div class="container-fluid">
    <?php
    require('header.php');
    ?>


    <div id="connexion-container" class="row">
        <div id="connexion" class="col-lg-12">
            <h1>Connexion</h1>
            <hr class="separateur">
            <br>
            <h5>Veuillez entrer votre login et votre mot de passe pour vous connecter :</h5>
            <br>
            <form>
                <label for="login">Login</label>
                <br>
                <input type="text" name="login" id="login">
                <br>
                <label for="mdp">Mot de Passe</label>
                <br>
                <input type="text" name="mdp" id="mdp">
                <br><br><br>
                <input class="btn-valid" type="submit" value="Se connecter">
                <br><br>
                <p>Vous n'êtes pas inscrit sur le site ? Pas de problème ! <a href="register.php">Cliquez pour commencer l'inscription</a></p>
                <br>
            </form>
        </div>
    </div>


</div>
</body>
</html>


