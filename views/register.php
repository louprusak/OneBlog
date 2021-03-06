<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Inscription</title>
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
            <h1>Inscription</h1>
            <hr class="separateur">
            <br>
            <h5>Veuillez entrer un login et un mot de passe pour vous inscrire :</h5>
            <br>
            <form action="index.php?action=register" method="post">
                <label for="login">Login</label>
                <br>
                <input type="text" name="login">
                <br>
                <label for="mdp">Mot de Passe</label>
                <br>
                <input type="password" name="password">
                <br><br><br>
                <input class="btn-valid" type="submit" value="S'inscrire">
                <br><br>
                <p>Vous êtes déjà inscrit sur le site ? Pas de problème ! <a href="index.php?action=connection">Cliquez pour vous connecter</a></p>
                <br>
            </form>
        </div>
    </div>


</div>
</body>
</html>


