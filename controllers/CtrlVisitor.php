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


        try{
            switch(strtolower($action)){
                case 'search':
                    $this->searchNews();
                    break;
                case 'addComment':
                    $this->addComment();
                    break;
                case 'register':
                    $this->register();
                    break;
                case 'connection':
                    $this->connection();
                    break;
                case 'readNews':
                    $this->readNews();
                    break;
                case null:
                default:
                    $this->displayNews();

            }
        }catch (PDOException $e){
            $error = 'Erreur lors de la connexion à la base de données.';
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
        require_once('views/addComment.php');
        $mdl = new ModelComment();
        $comment = $_GET['comment'];
        $pseudo = $_GET['pseudo'];
        $mdl->addComment(1,$pseudo,$comment);
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
        if(isset($_POST['login']) && isset($_POST['password'])){
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
        if(isset($_POST['login']) && isset($_POST['password'])){
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
    {/*
        //if(isset($_GET['id'])){
           // $id = Nettoyer::nettoyerInt($_POST['id']);
            $mdl = new ModelNews();
            print_r('modelNews ok');
            $news = $mdl->getNewsById(1);
            print_r('getNewsById ok');
            print_r($news);
            require_once ('views/news.php');
        //}*/
    }
}



