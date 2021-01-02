<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Rechercher</title>
    <?php
    require ('head.php');
    ?>
</head>

<body>
<div class="container-fluid">
    <?php
    require('header.php');
    ?>


    <div id="recherche-container" class="row">
        <div id="recherche" class="col-lg-12">
            <h1 id="titre-recherche">Rechercher une News</h1>
            <hr class="separateur">
            <br>
            <h5 id="auteur-news">Veuillez entrer une date pour trouver les news correspondantes:</h5>
            <br>
            <form action="index.php?action=search" method="post">
                <input type="date" name="dateNews">
                <br><br><br>
                <input class="btn-valid" type="submit" value="Rechercher" >
            </form>
        </div>
    </div>


</div>
</body>
</html>




