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
}