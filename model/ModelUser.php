<?php


class ModelUser
{
    private $gateway;

    public function __construct(){
        $this->gateway=new GtwUser();
    }

    public function register(string $login, string $password, bool $role){
        $this->gateway->addUser($login, $password, $role);
    }

    public function connection(string $login, string $mdp) : bool
    {
        $loginNettoyer = Nettoyer::nettoyerString($login);
        $mdpNettoyer = Nettoyer::nettoyerString($mdp);

        if($this->gateway->exist($loginNettoyer, $mdpNettoyer)){
            $_SESSION['login']  = $loginNettoyer;

            if($this->gateway->isAdmin($loginNettoyer)){
                $_SESSION['role']  = "admin";
            }else{
                $_SESSION['role']  = "user";
            }

            return true;
        }
        return false;
    }

    public function deconnection()
    {
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $_SESSION['login'] = "";
            $_SESSION['role'] = "";
        }
    }


    public function getUser() : ?User
    {
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $loginNettoyer = Nettoyer::nettoyer_string($_SESSION['login']);
            $roleNettoyer = Nettoyer::nettoyer_string($_SESSION['role']);

            return new User(1,$loginNettoyer,"",$roleNettoyer);
        }
        return null;
    }

    public function isAdmin() : bool
    {
        if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
            return true;
        }
        return false;
    }
}