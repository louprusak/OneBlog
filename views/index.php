<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Blog</title>
    <?php
    require ('head.php');
    ?>
</head>

<body>



<div class="container-fluid">
    <?php
    require('header.php');
    ?>

    <!--<div class="row">
        <div class="col-lg-12">
            <a href="news.php">Exemple de lien menant vers la page complete d'une news</a><br>
            <a href="error.php">Exemple de lien menant vers la page d'erreur</a><br>
            <a href="searchResult.php">Exemple de lien menant vers la page principale admin</a><br>
            <a href="addNews.php">Exemple de lien menant vers la page d'ajout de news</a>
        </div>
    </div>

    <br><br><br><br><br>-->

    <div>


        <?php
        if (isset($listNews)) {
            foreach ($listNews as $News) {
                echo '
                    <div class="row">
                        <div id="index-news" class="col-lg-12">
                            <div id="index-news-contenu">
                                <h6>' . $News->getAuteur() . ' le ' . $News->getDate() . '</h6>
                                <hr class="hr-news">
                                <h2>' . $News->getTitre() . '</h2>

                                <p>' . substr($News->getDescription(),0,500) . '... </p>
                                <a href="news.php">Lire la suite</a>
                            </div>

                        </div>
                    </div>';

            }
        }else {
            echo "<h4 class=\"white\">Pas de news à afficher ...</h4>";
        }
        ?>
    </div>


</div>

</body>
</html>


