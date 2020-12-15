<?php


class FrontController
{
    public function __construct()
    {
        $action  = strtolower($_REQUEST['action']) ?? null;
        $mdl  = new ModelUser();

        $admin = $mdl->isAdmin();

        $listActionUser = ['deconnecter','ajouter','supprimer'];
        $listActionAdmin = ['deconnecter','ajouter','supprimer'];

        if(in_array($action, $listActionUser)){
            if(!$admin){
                new CtrlUser();
            }else{
                CtrlUser($action);
            }
        }else if(in_array($action, $listActionAdmin)){
            if(!$admin){
                new CtrlUser();
            }else if($admin->getRole() === 1){
                CtrlAdmin($action);
            }
        }
    }
}