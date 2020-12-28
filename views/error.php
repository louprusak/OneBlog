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
    <?php
    require('header.php');
    ?>


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


