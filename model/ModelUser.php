<?php


class ModelUser
{
    private $gateway;

    public function __construct(){
        $this->gateway=new GtwUser();
    }

    public function addUser($login, $password, $role){
        $this->gateway->addUser($login, $password, $role);
    }

    public function isAdmin($idUser){
        return $this->gateway->isAdmin($idUser);
    }

    public function checkConnection($login, $password){
        return $this->gateway->checkConnection($login, $password);
    }

    public function login(string $login, string $mdp) : bool
    {
        $loginNettoyer = Nettoyer::nettoyerString($login);
        $mdpNettoyer = Nettoyer::nettoyerString($mdp);
        $utilisateurGtw = new GtwUser();

        if($utilisateurGtw->userExists($loginNettoyer, $mdpNettoyer)){
            $_SESSION['user']  = $loginNettoyer;
            $_SESSION['role']  = "admin";
            return true;
        }
        return false;
    }

    public function getUser() : User
    {
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $loginNettoyer = Nettoyer::nettoyer_string($_SESSION['login']);
            $roleNettoyer = Nettoyer::nettoyer_string($_SESSION['role']);

            if($roleNettoyer == 'admin'){
                return new User(1,"","",1);
            }
        }
        else return null;
    }
}