<?php


require_once('model/ModelUser.php');
require_once('controllers/CtrlVisitor.php');
require_once('controllers/CtrlUser.php');
require_once('controllers/CtrlAdmin.php');

/**
 * Class FrontController
 */
class FrontController
{
    /**
     * FrontController constructor.
     */
    public function __construct()
    {
        if(isset($_REQUEST['action'])){
            $action  = strtolower($_REQUEST['action']) ?? null;
        }
        else{
            $action = null;
        }

        $mdl  = new ModelUser();

        $admin = $mdl->getUser();

        $listActionsVisitor = ['connection','search','register'];
        $listActionsUser = ['deconnection','addNews','deleteMyNews'];
        $listActionsAdmin = ['deleteNews'];

        //Si l'action fait partie de la liste d'actions possibles du visiteur
        if(in_array($action, $listActionsVisitor)){
            new CtrlVisitor($action);
        }
        //Si l'action fait partie de la liste d'actions possibles du user
        else if(in_array($action, $listActionsUser)){
            if($admin->getRole() == null){
                new CtrlVisitor('connection');
            }else{
                new CtrlUser($action);
            }
        }
        //Si l'action fait partie de la liste d'actions possibles de l'admin
        else if(in_array($action, $listActionsAdmin)){
            if($admin->getRole() == null or 0){
                new CtrlVisitor('connection');
            }else if($admin->getRole() === 1){
                new CtrlAdmin($action);
            }
        }
        //Aucune action = afficher la page d'acueil avec les news en base de données
        else{
            new CtrlVisitor(null);
        }
    }


}

new FrontController();