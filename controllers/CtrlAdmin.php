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
        try{
            switch(strtolower($action)){
                case 'deletenews':
                    $this->deleteNews();
                    break;
                case null:
                default :
                    $error = 'erreur dans le controlleur admin';
                    require('views/error.php');
            }
        }catch (PDOException $e){
            $error = 'Erreur lors de la connexion à la base de données.<br><br>Erreur plus précise : '.$e->getMessage();
            require('views/error.php');
        }catch (Exception $e2){
            $error = 'Erreur lors de l\'éxécution du code du controller user.<br><br>Erreur plus précise : '.$e2->getMessage();
            require('views/error.php');
        }
    }

    /**
     * Fonction de suppression de news du controlleur admin.
     */
    public function deleteNews()
    {
        if(isset($_GET['id'])){
            $id = Nettoyer::nettoyerInt($_GET['id']);

            $mdlcom = new ModelComment();
            if($mdlcom->getNbCommentByNews($id) != 0){
                $mdlcom->deleteCommentByNews($id);
            }

            $mdl = new ModelNews();
            $mdl->deleteNews($id);
            header('Location: /');
        }
    }

}