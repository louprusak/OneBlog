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
        <br><br><br>
        <h4 class="white">Résultat de la recherche :</h4>

        <?php
        if (isset($listNewsSearch) && !empty($listNewsSearch)) {
            foreach ($listNewsSearch as $news) {
                echo "
                    <div class=\"row\">
                        <div id=\"index-news\" class=\"col-lg-12\">
                            <div id=\"index-news-contenu\">
                                <h6>" . strtoupper($news->getAuteur()) . " le " . $news->getDate() . "</h6>
                                <hr class=\"hr-news\">
                                <h2>" . $news->getTitre() . "</h2>

                                <p>" . substr($news->getDescription(),0,500) . " . . . </p>
                                <a id=\"btn-next\" href=\"index.php?action=readnews&id=".$news->getIdNews()."\">Lire la suite</a>";
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'admin'){
                        echo " <a id=\"btn-delete\" href=\"index.php?action=deletenews\">Supprimer</a>";
                    }
                }
                echo "        
                            </div>
                        </div>
                    </div>";

            }
        } else {
            echo "<br><br><h4 class=\"white\">Aucune news trouvée à cette date ...</h4>";
        }
        ?>
    </div>


</div>

</body>
</html>


