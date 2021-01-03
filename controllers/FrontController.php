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



        $listActionsVisitor = ['connection','search','register','addcomment','readnews'];
        $listActionsUser = ['deconnection','addnews','deletemynews'];
        $listActionsAdmin = ['deletenews'];

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
            if($admin->getRole() == null || !$admin->getRole()){
                print_r($admin->getRole());
                new CtrlVisitor('connection');
            }else if($admin->getRole()){
                new CtrlAdmin($action);
            }
        }
        //Aucune action = afficher la page d'acueil avec les news en base de données
        else{
            new CtrlVisitor(null);
        }
    }


}

