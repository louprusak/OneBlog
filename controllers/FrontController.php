<?php

require_once('model/ModelUser.php');
require_once('controllers/CtrlVisitor.php');
require_once('controllers/CtrlUser.php');
require_once('controllers/CtrlAdmin.php');

class FrontController
{
    public function __construct()
    {
        $action  = strtolower($_REQUEST['action']) ?? null;
        $mdl  = new ModelUser();

        $admin = $mdl->getUser();

        $listActionsUser = ['deconnection','addNews','deleteMyNews'];
        $listActionsAdmin = ['deleteNews'];


        if(in_array($action, $listActionsUser)){
            if($admin->getRole() == null){
                new CtrlVisitor('connection');
            }else{
                new CtrlUser($action);
            }
        }else if(in_array($action, $listActionsAdmin)){
            if($admin->getRole() == null or 0){
                new CtrlVisitor('connection');
            }else if($admin->getRole() === 1){
                new CtrlAdmin($action);
            }
        }else{
            new CtrlVisitor($action);
        }
    }


}

new FrontController();