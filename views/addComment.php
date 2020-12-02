<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Ajouter un commentaire</title>
    <link href="../css/bootstrap.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/scroll-animate.js"></script>
</head>

<body>
<div id="container-fluide">
    <header class="row">
        <div id="entete" class="col-xs-12 col-sm-12 col-lg-3">
            <a class="Titre"href="index.php"><p>Mon Blog</p></a>
        </div>
        <div id="menu" class="col-xs-12 col-sm-12 col-lg-7">
            <nav>
                <a class="btn" href="#">Commentaire</a>
                <a class="btn" href="connection.php">Admin</a>
                <a class="btn" href="search.php">Rechercher</a>
            </nav>
        </div>

        <p class="col-xs-6 col-md-6 col-lg-1">Compteur 1</p>
        <p class="col-xs-6 col-md-6 col-lg-1">Compteur 2</p>
    </header>

    <div class="row">
        <div id="ajoutcommentaire" class="col-xs-12 col-md-12 col-lg-12">
            <h1 id="titre-ajoutcommentaire">Ajouter un commentaire</h1>
            <hr id="separateur">
            <br>
            <h5 id="auteur-news">Veuillez saisir les informations suivantes pour poster votre commentaire :</h5>
            <br>
            <form action="" method="post" id="form-commentaire">
                <label for="pseudo">Votre Pseudo :</label>
                <br>
                <input type="text" name="pseudo" id="pseudo">
                <br>
                <label for="commentaire">Votre Commentaire :</label>
                <br>
                <textarea name="commentaire" cols="120" rows="7" re id="commentaire"></textarea>
                <br><br>
                <input type="submit" value="Envoyer le commentaire"/>
            </form>
        </div>
    </div>

</div>
</body>
</html>


