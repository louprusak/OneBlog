<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Ajouter une news</title>
    <?php
    require ('head.php');
    ?>
</head>

<body>
<div class="container-fluid">
    <header class="row">
        <div id="entete" class="col-xs-12 col-sm-12 col-lg-3">
            <a class="titre"href="index.php"><img src="../res/images/logo_oneblog_grandtxt.png" height="60"/></a>
        </div>
        <div id="menu" class="col-xs-12 col-sm-12 col-lg-7">
            <nav>
                <a class="btn" href="addComment.php">Commentaire</a>
                <a class="btn" href="connection.php">Admin</a>
                <a class="btn" href="search.php">Rechercher</a>
            </nav>
        </div>

        <p class="col-xs-6 col-md-6 col-lg-1">Compteur 1</p>
        <p class="col-xs-6 col-md-6 col-lg-1">Compteur 2</p>
    </header>

    <div class="row">
        <div id="ajoutcommentaire" class="col-xs-12 col-md-12 col-lg-12">
            <h1 id="titre-ajoutcommentaire">Ajouter une news</h1>
            <hr class="separateur">
            <br>
            <h5 id="auteur-news">Veuillez saisir les informations suivantes pour créer et poster votre News</h5>
            <br>
            <form action="" method="post" id="form-commentaire">
                <label for="titre">Titre de votre news :</label>
                <br>
                <textarea name="titre" cols="80%" rows="1" id="titre"></textarea>
                <br>
                <label for="contenu">Contenu de votre news :</label>
                <br>
                <textarea name="contenu" cols="150%" rows="15" id="contenu"></textarea>
                <br><br>
                <input class="btn-valid" type="submit" value="Créer et poster la news"/>
                <br><br><br>
            </form>
        </div>
    </div>

</div>
</body>
</html>


