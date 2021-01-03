<?php


class User
{





    private string $login;



    private bool $role;

    public function __construct($login,$role)
    {

        $this->login = $login;
        $this->role = $role;
    }



    /**
     * @return mixed
     */
    public function getLogin():string
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->password = $login;
    }



    /**
     * @return mixed
     */
    public function getRole():bool
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole(bool $role)
    {
        $this->role = $role;
    }
}