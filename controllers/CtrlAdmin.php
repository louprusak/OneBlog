<?php

/**
 * Class CtrlAdmin
 */
class CtrlAdmin
{
    /**
     * CtrlAdmin constructor.
     * @param $action
     */
    public function __construct($action)
    {
        //$action = $_GET['action'] ?? null;

        try{
            switch(strtolower($action)){
                case 'deleteNews':
                    $this->deleteNews();
                    break;
                case null:
                default :
                    $error = 'erreur dans le controlleur admin';
                    require('views/error.php');
            }
        }catch (PDOException $e){
            $error = 'Erreur lors de la connexion à la base de données.';
            require('../views/error.php');
        }catch (Exception $e2){
            $error = 'Erreur lors de l\'éxécution du code du controller user';
            require('../views/error.php');
        }
    }

    /**
     * Fonction de suppression de news du controlleur admin.
     */
    public function deleteNews()
    {
        $mdl = new ModelNews();
        $mdl->deleteNews(0);// A TROUVER COMMENT RECUP ID NEWS DE CELLE SELECTIONNEE
        require ('views/index.php');
    }

}