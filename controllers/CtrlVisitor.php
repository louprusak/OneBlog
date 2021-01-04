<?php

/**
 * Class CtrlVisitor
 */
class CtrlVisitor
{
    /**
     * CtrlVisitor constructor.
     * @param $action
     */
    public function __construct($action)
    {

        //$action = $_GET['action'] ?? null;
        //print_r($action);

        try{
            switch(strtolower($action)){
                case 'search':
                    $this->searchNews();
                    break;
                case 'addcomment':
                    $this->addComment();
                    break;
                case 'readnews':
                    $this->readNews();
                    break;
                case 'register':
                    $this->register();
                    break;
                case 'connection':
                    $this->connection();
                    break;
                case null:
                default:
                    $this->displayNews();

            }
        }catch (PDOException $e){
            $error = $e->getMessage().'Erreur lors de la connexion à la base de données.';
            require_once('views/error.php');
        }catch (Exception $e2){
            $error= 'Erreur lors de l\'éxécution du code du controller visiteur';
            require_once('views/error.php');
        }

    }

    /**
     * Fonction de recherche de News du controlleur visiteur.
     */
    public function searchNews()
    {
        if(isset($_POST['dateNews'])){
            $mdl = new ModelNews();
            $date = Nettoyer::nettoyerString($_POST['dateNews']);
            $listNewsSearch = $mdl->getNewsByDate($date);
            require_once ('views/searchResult.php');
        }
        else{
            require_once('views/search.php');
        }
    }

    /**
     * Fonction d'ajout de commentaire du controlleur visiteur.
     */
    public function addComment()
    {
        if(isset($_POST['login']) && isset($_POST['commentaire']) && !empty($_POST['login']) && !empty($_POST['commentaire']) && isset($_GET['id'])){
            $login = Nettoyer::nettoyerString($_POST['login']);
            $commentaire = Nettoyer::nettoyerString($_POST['commentaire']);
            $idnews = Nettoyer::nettoyerInt($_GET['id']);

            $mdl = new ModelComment();

            $mdl->addComment($idnews,$login,$commentaire);

            if(isset($_COOKIE['nbcom'])){
                setcookie('nbcom',(int)Nettoyer::nettoyerInt($_COOKIE['nbcom'])+1,time()+365*24*3600);
            }
            else{
                setcookie('nbcom',1,time()+356*24*3600);
            }

            header('Location: /?action=readnews&id='.$idnews);
        }
        else{
            require_once ('views/addComment.php');
        }
    }

    /**
     * Fonction d'affichage des news sur la page principale du site.
     */
    public function displayNews()
    {
        $mdl = new ModelNews();
        $listNews = $mdl->getAllNews();
        require_once('views/index.php');
    }

    /**
     * Fonction de connection du controlleur visiteur.
     */
    private function connection()
    {
        if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])){
            $mdl = new ModelUser();

            $login = Nettoyer::nettoyerString($_POST['login']);
            $password = Nettoyer::nettoyerString($_POST['password']);

            $resco = $mdl->connection($login, $password);

            if(!$resco){
                $error = 'Login ou mot de passe inconnu, veuillez réessayer !';
                require_once ('views/error.php');
            }else{
                $this->displayNews();
            }
        }
        else{
            require_once('views/connection.php');
        }
    }

    /**
     * Fonction d'inscription du controlleur visiteur.
     */
    public function register()
    {
        if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])){
            $mdl = new ModelUser();

            $login = Nettoyer::nettoyerString($_POST['login']);
            $password = Nettoyer::nettoyerString($_POST['password']);

            try {
                $mdl->register($login,$password);
            }catch (PDOException $e){
                $error = $e->getMessage().'Login invalide, veuillez en entrer un nouveau svp.';
                require_once ('views/error.php');
            }

            $resco = $mdl->connection($login,$password);

            if(!$resco){
                $error = 'Impossible de se connecter.';
                require_once ('views/error.php');
            }else{
                header("Location: /");
            }
        }
        else{
            require_once('views/register.php');
        }

    }

    public function readNews()
    {
        if(isset($_GET['id'])){
            $id = Nettoyer::nettoyerInt($_GET['id']);
            $mdlnews = new ModelNews();
            $mdlcom = new ModelComment();
            $news = $mdlnews->getNewsById($id);
            $listComments = $mdlcom->getCommentByNews($id);
            require_once ('views/news.php');
        }
    }
}



