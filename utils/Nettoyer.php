<?php


/**
 * Class Nettoyer
 */
class Nettoyer
{
    /**
     * Fonction de nettoyage d'une chaine de caractères
     * @param string|null $string
     * @return string
     */
    public static function nettoyerString(?string $string):string{
        return filter_var($string,FILTER_SANITIZE_STRING);
    }

    /**
     * Fonction de nettoyage d'un entier
     * @param string|null $int
     * @return string
     */
    public static function nettoyerInt(?string $int):string{
        return filter_var($int,FILTER_SANITIZE_NUMBER_INT);
    }
}