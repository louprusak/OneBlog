<?php

/**
 * Class CtrlUser
 */
class CtrlUser
{
    /**
     * CtrlUser constructor.
     * @param $action
     */
    public function __construct($action)
    {
        //$action = $_GET['action'] ?? null;

        try{
            switch(strtolower($action)){
                case $action='deconnection':
                    $this->deconnection();
                    break;
                case $action='addNews':
                    $this->addNews();
                    break;
                case $action='deleteMyNews':
                    $this->deleteMyNews();
                    break;
                case null:
                default:
                    $error = 'erreur dans le controlleur user';
                    require('views/error.php');
            }
        }catch (PDOException $e){
            $error = 'Erreur lors de la connexion à la base de données.';
            require('views/error.php');
        }catch (Exception $e2){
            $error = 'Erreur lors de l\'éxécution du code du controller user';
            require('views/error.php');
        }
    }

    /**
     * Fonction de deconnection du controlleur user.
     */
    public function deconnection()
    {
        $mdl = new ModelUser();
        $mdl->deconnection();
        require('views/index.php');
    }

    /**
     * Fonction d'ajout de news du controlleur user.
     */
    public function addNews(){
        require('views/addNews.php');
        $mdl = new ModelNews();
        $auteur = $_SESSION['login'];
        $content = $_GET['content'];
        $title= $_GET['title'];
        try {
            $mdl->addNews($title,$content,$auteur);
        }catch (Exception $e){
            $error = 'Erreur lors de l\'ajout d\'une nouvelle news.';
            require ('views/error.php');
        }
        require('views/index.php');
    }

    /**
     * Fonction de suppression des news d'un utilisateur normale du controlleur user.
     */
    public function deleteMyNews(){
        $mdl = new ModelNews();
        $mdl->deleteNews(0);// A TROUVER COMMENT RECUP ID NEWS DE CELLE SELECTIONNEE
        require ('views/index.php');
    }

}

?>