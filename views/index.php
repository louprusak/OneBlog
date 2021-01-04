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

    <div>
        <?php

        if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
            echo "<br><br><h4 class=\"white\">Bienvenue ". strtoupper($_SESSION['login'])." !</h4>";
        }

        if (isset($listNews)) {
            foreach ($listNews as $news) {
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
                        echo " <a id=\"btn-delete\" href=\"index.php?action=deletenews&id=".$news->getIdNews()."\">Supprimer</a>";
                    }
                    if($_SESSION['role'] == 'user' && $_SESSION['login'] == $news->getAuteur()){
                        echo " <a id=\"btn-delete\" href=\"index.php?action=deletemynews&id=".$news->getIdNews()."\">Supprimer ma news</a>";
                    }
                }
                echo "        
                            </div>
                        </div>
                    </div>";
            }
        }else {
            echo "<h4 class=\"white\">Pas de news à afficher ...</h4>";
        }
        ?>
        <br><br><br>
    </div>


</div>

</body>
</html>


