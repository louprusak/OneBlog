<header class="row">
    <div id="entete" class="col-xs-12 col-sm-12 col-lg-3">
        <a class="titre" href="index.php"><img src="/res/images/logo_oneblog_grandtxt.png" height="60"/></a>
    </div>
    <div id="menu" class="col-xs-12 col-sm-12 col-lg-5">
        <nav>
            <a class="btn" href="/views/search.php">Rechercher</a>

            <?php
            if (!isset($_SESSION['role'])) {
                //if ($_SESSION['role'] == 'user' or $_SESSION['role'] == 'admin') {
                    echo "<a class=\"btn\" id=\"btn-add\" href=\"/views/addNews.php\">Ajouter News</a>";
                    echo "<a class=\"btn\" id=\"btn-add\" href=\"/controllers/FrontController.php?action=deconnection\">Se déconnecter</a>";
                //}
            }
            else{
                echo "<a class=\"btn\" href=\"/views/connection.php\">Se connecter</a>";
            }
            ?>
        </nav>
    </div>

    <?php
        // A FAIRE MARCHER !

        //require_once ('DAL/gateways/GtwComment.php');
        //$gtwcom = new GtwComment();
        //$nbcom = $gtwcom->getNbComment();
        echo "<p class=\"col-xs-6 col-md-6 col-lg-2\"> Commentaires du site : "/*.$nbcom*/."</p>";
        echo "<p class=\"col-xs-6 col-md-6 col-lg-2\"> Vos commentaires : "/*.$nbcom*/."</p>";
    ?>

</header>
