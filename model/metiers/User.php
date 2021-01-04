<?php

/**
 * Class User
 */
class User
{
    private string $login;

    private bool $role;

    /**
     * User constructor.
     * @param $login
     * @param $role
     */
    public function __construct($login,$role)
    {
        $this->login = $login;
        $this->role = $role;
    }

    /**
     * Getter de l'identifiant de l'utilisateur
     * @return mixed
     */
    public function getLogin():string
    {
        return $this->login;
    }

    /**
     * Getter du rôle de l'utilisateur
     * @return mixed
     */
    public function getRole():bool
    {
        return $this->role;
    }
}