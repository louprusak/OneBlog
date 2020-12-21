<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Inscription</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scroll-animate.js"></script>
</head>

<body>
<div class="container-fluid">
    <header class="row">
        <div id="entete" class="col-xs-12 col-sm-12 col-lg-3">
            <a class="titre" href="index.php"><img src="../res/images/logo_oneblog_grandtxt.png" height="60"/></a>
        </div>
        <div id="menu" class="col-xs-12 col-sm-12 col-lg-7">
            <nav>
                <a class="btn" href="addComment.php">Commentaire</a>
                <a class="btn" href="#">Admin</a>
                <a class="btn" href="search.php">Rechercher</a>
            </nav>
        </div>
        <div class="col-xs-6 col-md-6 col-lg-1">
            <p>Compteur 1</p>
        </div >
        <div class="col-xs-6 col-md-6 col-lg-1">
            <p>Compteur 2</p>
        </div>

    </header>


    <div id="connexion-container" class="row">
        <div id="connexion" class="col-lg-12">
            <h1>Inscription</h1>
            <hr class="separateur">
            <br>
            <h5>Veuillez entrer un login et un mot de passe pour vous inscrire :</h5>
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
                <input class="btn-valid" type="submit" value="S'inscrire">
                <br><br>
                <p>Vous êtes déjà inscrit sur le site ? Pas de problème ! <a href="connection.php">Cliquez pour vous connecter</a></p>
                <br>
            </form>
        </div>
    </div>


</div>
</body>
</html>


