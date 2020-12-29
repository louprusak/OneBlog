<?php

require_once('DAL/Connection.php');

/**
 * Class GtwUser
 */
class GtwUser
{
    protected static string $dsn = 'mysql:host=localhost;dbname=blog';
    protected static string $username = 'root';
    protected static string $password = 'root';
    private Connection $con;

    /**
     * GtwUser constructor.
     */
    public function __construct(){

        $this->con = new Connection($this::$dsn,$this::$username,$this::$password);
    }

    /**
     * Fonction qui ajoute un nouvel utilisateur dans la base de données.
     * @param string $login
     * @param string $password
     * @param bool $role Admin ou non
     */
    public function addUser(string $login, string $password, bool $role){
        $query='INSERT INTO user(login, password, role) VALUES(:login, :password, :role )';
        $this->con->executeQuery($query,array(':login'=>$login, ':password'=>$password, ':role'=>$role));
    }

    /**
     * Fonction qui vérifie en base de données si le login passé est un compte administrateur.
     * @param string $login
     * @return bool
     */
    public function isAdmin(string $login):bool{
        $query = 'SELECT role FROM user WHERE login = :login';
        $this->con->executeQuery($query,array(':login'=>$login));
        $results=$this->con->getResults();
        if($results==1) return true;
        return false;
    }

    /**
     * Fonction qui vérifie si une association de login et de mot de passe (un utilisateur) existe en base de données.
     * @param string $login
     * @param string $password
     * @return bool existe ou n'existe pas
     */
    public function exist(string $login, string $password):bool{
        if($this->existLogin($login)){
            $query='SELECT password FROM user WHERE password = :password';
            $this->con->executeQuery($query, array(':password'=>$password));
            $results=$this->con->getResults();
            if (strcmp($password, (string)$results)) return true;
            return false;
        }
        return false;
    }

    /**
     * Fonction qui vérifie en base de donnée si le login passé existe
     * @param string $login
     * @return bool
     */
    public function existLogin(string $login):bool{
        $query='SELECT login FROM user WHERE login = :login';
        $this->con->executeQuery($query, array(':login'=>$login));
        $results=$this->con->getResults();
        if (strcmp($login, (string)$results)) return true;
        return false;
    }
}