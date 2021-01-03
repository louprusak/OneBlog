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
    <?php
    require('header.php');
    ?>

    <div class="row">
        <div id="ajoutcommentaire" class="col-xs-12 col-md-12 col-lg-12">
            <h1 id="titre-ajoutcommentaire">Ajouter une news</h1>
            <hr class="separateur">
            <br>
            <h5 id="auteur-news">Veuillez saisir les informations suivantes pour créer et poster votre News</h5>
            <br>
            <form action="index.php?action=addnews" method="post" id="form-commentaire">
                <label for="titre">Titre de votre news :</label>
                <br>
                <textarea name="titre" cols="80%" rows="1""></textarea>
                <br>
                <label for="contenu">Contenu de votre news :</label>
                <br>
                <textarea name="contenu" cols="100%" rows="15"></textarea>
                <br><br>
                <input class="btn-valid" type="submit" value="Créer et poster la news"/>
                <br><br><br>
            </form>
        </div>
    </div>

</div>
</body>
</html>


