<?php


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
        //$_SESSION = array();
        //print_r($_SESSION);

        if(isset($_REQUEST['action'])){
            $action  = strtolower($_REQUEST['action']) ?? null;
        }
        else{
            $action = null;
        }

        $mdl  = new ModelUser();

        $admin = $mdl->getUser();

        $listActionsVisitor = ['connection','search','register','addComment','readNews'];
        $listActionsUser = ['deconnection','addNews','deleteMyNews'];
        $listActionsAdmin = ['deleteNews'];

        //Si l'action fait partie de la liste d'actions possibles du visiteur
        if(in_array($action, $listActionsVisitor)){
            new CtrlVisitor($action);
        }
        //Si l'action fait partie de la liste d'actions possibles du user
        else if(in_array($action, $listActionsUser)){
            if($admin == null){
                new CtrlVisitor('connection');
            }else{
                new CtrlUser($action);
            }
        }
        //Si l'action fait partie de la liste d'actions possibles de l'admin
        else if(in_array($action, $listActionsAdmin)){
            if($admin->getRole() == null || $admin->getRole() == 0){
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

