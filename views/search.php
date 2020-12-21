<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Rechercher</title>
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
            <a class="titre"href="index.php"><p>Mon Blog</p></a>
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


    <div id="recherche-container" class="row">
        <div id="recherche" class="col-lg-12">
            <h1 id="titre-recherche">Rechercher une News</h1>
            <hr class="separateur">
            <br>
            <h5 id="auteur-news">Veuillez entrer une date pour trouver la news correspondante:</h5>
            <h5 id="auteur-news">Format attendu : DD / MM / YYYY</h5>
            <br>
            <form action="controller/CtrlVisitor.php?action=search">
                <input type="text" name="datenews">
                <br><br><br>
                <input class="btn-valid" type="submit" value="Rechercher" >
            </form>
        </div>
    </div>


</div>
</body>
</html>




