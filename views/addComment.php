<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Ajouter un commentaire</title>
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
            <h1 id="titre-ajoutcommentaire">Ajouter un commentaire</h1>
            <hr class="separateur">
            <br>
            <h5 id="auteur-news">Veuillez saisir les informations suivantes pour poster votre commentaire :</h5>
            <br>
            <form action="index.php?action=addcomment&id=<?=$_GET['id']?>" method="post" id="form-commentaire">
                <label for="pseudo">Votre Pseudo :</label>
                <br>
                <input type="text" name="login">
                <br>
                <label for="commentaire">Votre Commentaire :</label>
                <br>
                <textarea name="commentaire" cols="80%" rows="7"></textarea>
                <br><br>
                <input class="btn-valid" type="submit" value="Envoyer le commentaire"/>
                <br><br><br>
            </form>
        </div>
    </div>

</div>
</body>
</html>


