<?php

require_once('utils/Connection.php');

/**
 * Class GtwUser
 */
class GtwUser
{
    private Connection $con;

    /**
     * GtwUser constructor.
     */
    public function __construct(){
        global $dsn, $password, $username;
        $this->con = new Connection($dsn,$username,$password);
    }

    /**
     * Fonction qui ajoute un nouvel utilisateur dans la base de données.
     * @param string $login
     * @param string $password
     * @param bool $role Admin ou non
     */
    public function addUser(string $login, string $password, bool $role){

            $query='INSERT INTO user(login, password, role) VALUES(:login, :password, :role )';
            $res = $this->con->executeQuery($query, array(
                ':login'=> array($login,PDO::PARAM_STR),
                ':password'=> array($password,PDO::PARAM_STR),
                ':role'=> array($role,PDO::PARAM_BOOL)));
            print_r($res);

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
    public function exist(string $login, string $password):?User{
        $query='SELECT * FROM user WHERE login = :login';
        $this->con->executeQuery($query, array(':login'=> array($login,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        $results = count($results) != 0 ? $results[0] : null;


        if($results == null){
            return null;
        }

        $user = new User($results['login'],$results['role']);
        if(password_verify($password,$results['password'])){
            return $user;
        }
        return null;
    }


}