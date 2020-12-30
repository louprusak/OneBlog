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
        if(isset($_POST['date'])){
            $mdl = new ModelNews();
            $date = $_POST['date'];
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
            $login = $_POST['login'];
            $password = $_POST['password'];
            $resco = $mdl->connection($login, $password);

            if(!$resco){
                $error = 'Login ou mot de passe inconnu, veuillez réessayer !';
                require_once ('views/error.php');
            }else{
                require_once ('views/index.php');
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
            $login = $_POST['login'];
            $password = $_POST['password'];
            try {
                $mdl->register($login,$password);
            }catch (PDOException $e){
                $error = 'Login invalide, veuillez en entrer un nouveau svp.';
                require_once ('views/error.php');
            }
            $mdl->connection($login,$password);
            require_once ('views/index.php');
        }
        else{
            require_once('views/register.php');
        }

    }
}



?>