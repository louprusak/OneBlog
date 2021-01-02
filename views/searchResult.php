<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Résultat de la recherche</title>
    <?php
    require ('head.php');
    ?>
</head>

<body>



<div class="container-fluid">
    <?php
    require('header.php');
    ?>



    <div>

        <h4 class="white">Résultat de la recherche :</h4>

        <?php
        if (isset($listNewsSearch)) {
            foreach ($listNewsSearch as $News) {
                echo '
                    <div class="row">
                        <div id="index-news" class="col-lg-12">
                            <div id="index-news-contenu">
                                <h6>' . $News->getAuteur() . 'le' . $News->getDate() . '</h6>
                                <hr class="hr-news">
                                <h2>' . $News->getTitre() . '</h2>

                                <p>' . substr($News->getDescription(),0,500) . '</p>
                                <a href="news.php">Lire la suite</a>
                            </div>

                        </div>
                    </div>';
            }
        } else {
            echo "<h4 class=\"white\">Aucune news trouvée à cette date ...</h4>";
        }
        ?>
    </div>


</div>

</body>
</html>


