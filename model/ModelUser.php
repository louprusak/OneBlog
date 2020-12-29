<?php

require_once('DAL/gateways/GtwUser.php');
require_once('DAL/gateways/GtwNews.php');

/**
 * Class ModelUser
 */
class ModelUser
{
    /**
     * @var GtwUser Attribut gateway news
     */
    private GtwUser $gateway;

    /**
     * ModelUser constructor.
     */
    public function __construct(){
        $this->gateway=new GtwUser();
    }

    /**
     * Fonction d'inscription d'un nouvel utilisateur du Model User.
     *
     * @param string $login Login de l'utilisateur.
     * @param string $password Mot de passe de l'utilisateur.
     */
    public function register(string $login, string $password){
        $this->gateway->addUser($login, $password, false);
    }

    /**
     * Fonction de connection d'un utilisateur du Model User.
     *
     * @param string $login Login de l'utilisateur à connecter.
     * @param string $mdp Mot de passe de l'utilisateur à connecter.
     * @return bool Retourne si la connection a été effectuée.
     */
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

    /**
     * Fonction de déconnection du Model User.
     */
    public function deconnection()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();

        /*if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $_SESSION['login'] = "";
            $_SESSION['role'] = "";
        }*/
    }

    /**
     * Fonction qui retourne l'instance métier de l'utilisateur connecté.
     * @return User|null retourne l'instance métier de l'utilisateur ou null si aucun utilisateur n'est connecté.
     */
    public function getUser() : ?User
    {
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $loginNettoyer = Nettoyer::nettoyer_string($_SESSION['login']);
            $roleNettoyer = Nettoyer::nettoyer_string($_SESSION['role']);

            return new User(1,$loginNettoyer,"",$roleNettoyer);
        }
        return null;
    }

    /**
     * Fonction qui indique si l'utilisateur connecté est un admini
     * @return bool
     */
    public function isAdmin() : bool
    {
        if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
            return true;
        }
        return false;
    }
}