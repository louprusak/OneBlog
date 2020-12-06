<?php


class GtwUser
{
    protected static $dsn='mysql:host=localhost;dbname=blog';
    protected static $username='root';
    protected static $password='';
    private $con;

    public function __construct(){
        global $dsn, $username, $password;
        $con = new Connection($dsn,$username,$password);
    }

    public function addUser($login, $password, $role){
        $query='INSERT INTO user(login, password, role) VALUES(:login, :password, :role )';
        $this->con->executeQuery($query,array(':login'=>$login, ':password'=>$password, ':role'=>$role));
    }

    public function isAdmin($idUser){
        $query = 'SELECT role FROM user WHERE idUser = :idUser';
        $this->con->executeQuery($query,array(':idUser'=>$idUser));
        $results=$this->con->getResults();
        if($results==1) return true;
        return false;
    }

    public function checkConnection($login, $password){
        if(checkLogin($login)){
            $query='SELECT password FROM user WHERE password = :password';
            $this->con->executeQuery($query, array(':password'=>$password));
            $results=$this->con->getResults();
            if (strcmp($password,$results)) return true;
            return false;
        }
        return false;
    }

    public function checkLogin($login){
        $query='SELECT login FROM user WHERE login = :login';
        $this->con->executeQuery($query, array(':login'=>$login));
        $results=$this->con->getResults();
        if (strcmp($login,$results)) return true;
        return false;
    }
}