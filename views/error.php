<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Erreur !</title>
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
        <div class="col-xs-6 col-md-6 col-lg-1">
            <p>Compteur 1</p>
        </div >
        <div class="col-xs-6 col-md-6 col-lg-1">
            <p>Compteur 2</p>
        </div>

    </header>


    <div id="erreur-container" class="row">
        <div id="erreur" class="col-lg-12">
            <h1 id="titre-erreur">Oh oh ! Il y a eu un petit soucis !</h1>
            <hr class="separateur">
            <br>
            <?php
            if(isset($error)){
                echo "<h5 id=\"auteur-news\">".$error."</h5>";
            }
            else{
                echo "Pas de message d'erreur spécifique à afficher !";
            }
            ?>

        </div>
    </div>


</div>
</body>
</html>


