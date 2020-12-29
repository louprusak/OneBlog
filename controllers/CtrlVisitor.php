<?php

require_once ('model/ModelNews.php');
require_once ('model/ModelUser.php');

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
                case 'display':
                    $this->displayNews();
                    break;
                case 'addComment':
                    $this->addComment();
                    break;
                case 'register':
                    $this->register();
                    break;
                case 'connection';
                    $this->connection();
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
        require_once('views/search.php');
        $mdl = new ModelNews();
        $date = $_GET['date'];
        $listNewsSearch = $mdl->getNewsByDate($date);
        require_once ('views/searchResult.php');
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
        require_once('views/connection.php');
        $mdl = new ModelUser();
        $login = $_GET['login'];
        $password = $_GET['password'];
        if(!$mdl->connection($login, $password)){
            $error = 'Login ou mot de passe inconnu, veuillez réessayer !';
            require_once ('views/error.php');
        }else{
            require_once ('views/index.php');
        }
    }

    /**
     * Fonction d'inscription du controlleur visiteur.
     */
    public function register()
    {
        require_once('views/register.php');
        $mdl = new ModelUser();
        $login = $_GET['login'];
        $password = $_GET['password'];
        try {
            $mdl->register($login,$password);
        }catch (PDOException $e){
            $error = 'Login invalide, veuillez en entrer un nouveau svp.';
            require_once ('views/error.php');
        }
        $mdl->connection($login,$password);
        require_once ('views/index.php');
    }
}



?>