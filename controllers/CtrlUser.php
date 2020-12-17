<?php


class CtrlUser extends CtrlVisitor
{
    public function __construct()
    {
        $action = $_GET['action'] ?? null;

        try{
            switch(strtolower($action)){
                case $action='addUser':
                    $this->addUser();
                    break;
                case $action='isAdmin':
                    $this->isAdmin();
                    break;
                case $action='checkConnection':
                    $this->checkConnection();
                    break;
                case $action='checkLogin':
                    $this->checkLogin();
                    break;
                default:
                    require('../views/error.html');
            }
        }catch (PDOException $e){
            $erreur = 'Erreur lors de la connexion à la base de données.';
            require('../views/error.php');
        }catch (Exception $e2){
            $erreur = 'Erreur lors de l\'éxécution du code du controller user';
            require('../views/error.php');
        }
    }

    public function connection()
    {
        $mdl = new model.User;
        $user = $mdl->getUser();
        require('../views/connection.php');
    }

    public function addUser(){
        /*$mdl = new model.User;
        $user = $mdl->getUser();*/
    }

    public function isAdmin(){

    }

    public function checkConnection(){

    }

    public function checkLogin(){

    }
}

?>