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

        /** Vérification action visiteur */
        if(in_array($action, $listActionsVisitor)){
            new CtrlVisitor($action);
        }

        /** Vérification action user */
        else if(in_array($action, $listActionsUser)){
            if($admin == null){
                new CtrlVisitor('connection');
            }else{
                new CtrlUser($action);
            }
        }

        /** Vérification action admin */
        else if(in_array($action, $listActionsAdmin)){
            if($admin->getRole() == null || !$admin->getRole()){
                print_r($admin->getRole());
                new CtrlVisitor('connection');
            }else if($admin->getRole()){
                new CtrlAdmin($action);
            }
        }

        /** Aucune action définie */
        else{
            new CtrlVisitor(null);
        }
    }


}

