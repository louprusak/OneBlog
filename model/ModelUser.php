<?php

/**
 * Class ModelUser
 */
class ModelUser
{
    private GtwUser $gateway;

    /**
     * ModelUser constructor.
     */
    public function __construct(){
        $this->gateway=new GtwUser();
    }

    /**
     * Fonction d'inscription d'un nouvel utilisateur du Model User.
     * @param string $login Login de l'utilisateur.
     * @param string $password Mot de passe de l'utilisateur.
     */
    public function register(string $login, string $password){
        $passwordHash = password_hash($password,PASSWORD_DEFAULT);
        $this->gateway->addUser($login, $passwordHash, false);
    }

    /**
     * Fonction de connection d'un utilisateur du Model User.
     * @param string $login Login de l'utilisateur à connecter.
     * @param string $mdp Mot de passe de l'utilisateur à connecter.
     * @return bool Retourne si la connection a été effectuée.
     */
    public function connection(string $login, string $mdp) : bool
    {
        $loginNettoyer = Nettoyer::nettoyerString($login);
        $mdpNettoyer = Nettoyer::nettoyerString($mdp);

        $user = $this->gateway->exist($loginNettoyer, $mdpNettoyer);

        if($user == null){
            return false;
        }

        $_SESSION['login']  = $user->getLogin();

        if($user->getRole()){
            $_SESSION['role']  = "admin";
        }
        else{
            $_SESSION['role']  = "user";
        }

        return true;
    }

    /**
     * Fonction de déconnection du Model User.
     */
    public function deconnection()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    /**
     * Fonction qui retourne l'instance métier de l'utilisateur connecté.
     * @return User|null retourne l'instance métier de l'utilisateur ou null si aucun utilisateur n'est connecté.
     */
    public function getUser() : ?User
    {
        if(isset($_SESSION['login']) && isset($_SESSION['role']) ){

            $loginNettoyer = Nettoyer::nettoyerString($_SESSION['login']);
            $roleNettoyer = Nettoyer::nettoyerString($_SESSION['role']);

            if($roleNettoyer == 'admin'){
                $roleUser = true;
            }
            else{
                $roleUser = false;
            }

            return new User($loginNettoyer,$roleUser);
        }
        return null;
    }
}