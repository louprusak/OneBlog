<?php

require_once('DAL/Connection.php');

class GtwUser
{
    protected static string $dsn = 'mysql:host=localhost;dbname=blog';
    protected static string $username = 'root';
    protected static string $password = 'root';
    private Connection $con;

    public function __construct(){

        $this->con = new Connection($this::$dsn,$this::$username,$this::$password);
    }

    public function addUser(string $login, string $password, bool $role){
        $query='INSERT INTO user(login, password, role) VALUES(:login, :password, :role )';
        $this->con->executeQuery($query,array(':login'=>$login, ':password'=>$password, ':role'=>$role));
    }

    public function isAdmin(string $login):bool{
        $query = 'SELECT role FROM user WHERE login = :login';
        $this->con->executeQuery($query,array(':login'=>$login));
        $results=$this->con->getResults();
        if($results==1) return true;
        return false;
    }

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

    public function existLogin(string $login):bool{
        $query='SELECT login FROM user WHERE login = :login';
        $this->con->executeQuery($query, array(':login'=>$login));
        $results=$this->con->getResults();
        if (strcmp($login, (string)$results)) return true;
        return false;
    }
}