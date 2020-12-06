<?php


class Validation
{
    static function validDate($date)
    {
        $expression = "/^[:digit:]+[:digit:]+/+[:digit:]+[:digit:]+/+[:digit:]+[:digit:]+[:digit:]+[:digit:]$/";
        if (!preg_match($expression, $date)) {
            echo "Le format de la date est invalide !";
        }
    }


}