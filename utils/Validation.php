<?php


class Validation
{
    /**
     * @param date $date
     * @return bool
     */
    public static function validateDate($date):bool
    {
        $expression = "/^[:digit:]+[:digit:]+/+[:digit:]+[:digit:]+/+[:digit:]+[:digit:]+[:digit:]+[:digit:]$/";
        if (!preg_match($expression, $date)) {
            echo "Le format de la date est invalide !";
        }
    }

    /**
     * @param string $email
     * @return bool
     */
    public static function validateEmail(string $email):bool
    {
        if (!isset($email) || $email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    /**
     * @param string $password
     * @param string $passwordrepeat
     * @return bool
     */
    public static function validatePassword(string $password, string $passwordrepeat):bool
    {
        if(!isset($password) || !isset($passwordrepeat) || strlen($password)<=4 || !$password==$passwordrepeat){
            return false;
        }
        return true;
    }


}