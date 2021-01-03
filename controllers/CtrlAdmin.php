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
                case 'deletenews':
                    $this->deleteNews();
                    break;
                case null:
                default :
                    $error = 'erreur dans le controlleur admin';
                    require('views/error.php');
            }
        }catch (PDOException $e){
            $error = $e->getMessage().'Erreur lors de la connexion à la base de données.';
            require('views/error.php');
        }catch (Exception $e2){
            $error = 'Erreur lors de l\'éxécution du code du controller user';
            require('views/error.php');
        }
    }

    /**
     * Fonction de suppression de news du controlleur admin.
     */
    public function deleteNews()
    {
        if(isset($_GET['id'])){
            // SI IL EXISTE DES COMMENTAIRE IL FAUT LES SUPPRIMER AVANT
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