<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Connexion</title>
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
            <a class="titre"href="index.php"><p>Mon Blog</p></a>
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


