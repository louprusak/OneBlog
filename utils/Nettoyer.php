<?php


/**
 * Class Nettoyer
 */
class Nettoyer
{


    /**
     * @param string $string
     * @return string
     */
    public static function nettoyerString(?string $string):string{
        return filter_var($string,FILTER_SANITIZE_STRING);
    }

    /**
     * @param array $arrayString
     * @return array
     */
    public static function nettoyerArrayInt(?array $arrayString):array{
        $newArray = array();
        if($arrayString == null) return $newArray;
        foreach ($arrayString as $item) {
            array_push($newArray,Nettoyer::nettoyerInt($item));
        }
        return $newArray;
    }

    /**
     * @param string $int
     * @return string
     */
    public static function nettoyerInt(?string $int):string{
        return filter_var($int,FILTER_SANITIZE_NUMBER_INT);
    }
}