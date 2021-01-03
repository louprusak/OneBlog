<header class="row">
    <div id="entete" class="col-xs-12 col-sm-12 col-lg-3">
        <a class="titre" href="index.php"><img src="/res/images/logo_oneblog_grandtxt.png" height="60"/></a>
    </div>
    <div id="menu" class="col-xs-12 col-sm-12 col-lg-5">
        <nav>
            <a class="btn" href="index.php">Accueil</a>
            <a class="btn" href="index.php?action=search">Rechercher</a>

            <?php
            if (!empty($_SESSION['role'])) {
                if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin') {
                    echo "<a class=\"btn\" id=\"btn-add\" href=\"index.php?action=addNews\">Ajouter News</a>";
                    echo "<a class=\"btn\" id=\"btn-add\" href=\"index.php?action=deconnection\">Se déconnecter</a>";
                }
            }
            else{
                echo "<a class=\"btn\" href=\"index.php?action=connection\">Se connecter</a>";
            }
            ?>
        </nav>
    </div>

    <?php

        $gtwcom = new GtwComment();
        $nbcom = $gtwcom->getNbComment();

        echo "<h6 id=\"compteur\" class=\"col-xs-6 col-md-6 col-lg-2\"> Commentaires du site : ".$nbcom."</h6>";
        echo "<h6 id=\"compteur\" class=\"col-xs-6 col-md-6 col-lg-2\"> Vos commentaires : "/*.$nbcom*/."</h6>";
    ?>

</header>
