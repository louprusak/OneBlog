<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>News</title>
    <?php
    require ('head.php');
    ?>
</head>

<body>
<div class="container-fluid">
    <?php
    require('header.php');


    if(isset($news)){
    echo'
    <div id="news-container">
        <div id="news" class="col-lg-12">
            <h5>Posté par ' . strtoupper($news->getAuteur()). ' le ' .strtoupper($news->getDate()). '</h5>
            <hr class="separateur">
            <br>
            <h1 id="titre-news">'.$news->getTitre().'</h1>
            <br>
            <p id="contenu-news">'.$news->getDescription().'</p>

        </div>
    </div>

    <div id="comment-container">
        <div id="comment">
            <div class="row">
                <div class="col-lg-3">
                    <h5 id="titre-comment">Commentaires de la news</h5>
                </div>
                <div class="col-lg-3">
                    <a class="btn" id="btn-add" href="addComment.php">Ajouter un commentaire</a>
                </div>
            </div>
            <hr class="separateur">
        </div>
';}

        if(isset($listComments)){
            foreach ($listComments as $Comment) {
                echo '
                    <div class="row">
                        <div id="index-news" class="col-lg-12">
                            <div id="index-news-contenu">
                                <h6>'.$Comment->getAuteur().'</h6>
                                <hr class="hr-news">
                                <p>'.$Comment->getMessage().'</p>
                            </div>

                        </div>
                    </div>';
            }
        }
        else{
            echo "<br><br><br><h4 class='white'>Pas de commentaires à afficher ...</h4>";
        }
        ?>

    </div>

    <br><br><br>

</div>


</div>
</body>
</html>


