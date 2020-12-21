<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>News</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scroll-animate.js"></script>
</head>

<body>
<div id="container-fluide">
    <header class="row">
        <div id="entete" class="col-xs-12 col-sm-12 col-lg-3">
            <a class="Titre"href="index.php"><p>Mon Blog</p></a>
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


    <div id="news-container">
        <div id="news" class="col-lg-12">
            <h5 id="auteur-news">Posté par Loup RUSAK le 10 janvier 2020</h5>
            <hr id="separateur">
            <br>
            <h1 id="titre-news">Titre de la News</h1>
            <br>
            <p id="contenu-news">ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
                ceci est le texte de la news et nous allons tester sa mise en formececi est le texte de la news et nous allons tester sa mise en forme
            </p>
            <a class="btn" href="addComment.php">Ajouter un commentaire</a>
        </div>
    </div>

    <div id="comment-container">
        <div class="row">
            <div id="index-news" class="col-lg-12">
                <div id="index-news-contenu">
                    <h6>'.$News->getAuteur().'le'. $News->getDate().'</h6>
                    <hr id="hr2">
                    <h2>'.$News->getTitre().'</h2>

                    <p>'.$News->getDescription().'</p>
                    <a href="news.php">Lire la suite</a>
                </div>

            </div>
        </div>';
        <?php
        if(isset($listNews)){
            foreach ($listNews as $News) {
                echo '
                    <div class="row">
                        <div id="index-news" class="col-lg-12">
                            <div id="index-news-contenu">
                                <h6>'.$News->getAuteur().'le'. $News->getDate().'</h6>
                                <hr id="hr2">
                                <h2>'.$News->getTitre().'</h2>

                                <p>'.$News->getDescription().'</p>
                                <a href="news.php">Lire la suite</a>
                            </div>

                        </div>
                    </div>';
            }
        }
        else{
            echo "<h4 id='white'>Pas de news à afficher ...</h4>";
        }
        ?>

    </div>


</div>
</body>
</html>


