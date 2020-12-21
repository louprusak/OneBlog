<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Blog</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scroll-animate.js"></script>
</head>

<body>
<div class="container-fluid">
    <header class="row">
        <div id="entete" class="col-xs-12 col-sm-12 col-lg-3">
            <a class="titre"href="#"><p>Mon Blog</p></a>
        </div>
        <div id="menu" class="col-xs-12 col-sm-12 col-lg-7">
            <nav>
                <a class="btn" href="addComment.php">Commentaire</a>
                <a class="btn" href="connection.php">Admin</a>
                <a class="btn" href="search.php">Rechercher</a>
                <?php
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role'] == 'user' or $_SESSION['role'] == 'admin'){
                            echo "<a class=\"btn\" id=\"btn-add\" href=\"#\">Ajouter News</a>";
                        }
                    }
                ?>
            </nav>
        </div>

        <p class="col-xs-6 col-md-6 col-lg-1">Compteur 1</p>
        <p class="col-xs-6 col-md-6 col-lg-1">Compteur 2</p>
    </header>

    <div class="row">
        <div class="col-lg-12">
            <a href="news.php">Exemple de lien menant vers la page complete d'une news</a><br>
            <a href="error.php">Exemple de lien menant vers la page d'erreur</a><br>
            <a href="indexAdmin.php">Exemple de lien menant vers la page principale admin</a>
        </div>
    </div>

    <br><br><br><br><br>

    <div>
        <?php
            if(isset($listNews)){
                foreach ($listNews as $News) {
                    echo '
                    <div class="row">
                        <div id="index-news" class="col-lg-12">
                            <div id="index-news-contenu">
                                <h6>'.$News->getAuteur().'le'. $News->getDate().'</h6>
                                <hr class="hr-news">
                                <h2>'.$News->getTitre().'</h2>

                                <p>'.$News->getDescription().'</p>
                                <a href="news.php">Lire la suite</a>
                            </div>

                        </div>
                    </div>';
                }
            }
            else{
                echo "<h4 class=\"white\">Pas de news à afficher ...</h4>";
            }
        ?>
    </div>


</div>
</body>
</html>


