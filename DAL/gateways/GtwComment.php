<?php


class GtwComment
{
    private $con;

    public function __construct($dsn,$username,$password)
    {
        $con = new Connection($dsn,$username,$password);

        // mettre la suite du code donné dans l'exemple de la classe connection
    }

    public function addComment($con,$auteur,$message){
        $query = 'insert into comment(auteur,message) values($auteur,$message)';
        $con->executeQuery($query,);
    }

    public function listerCommentaires($con,$date):LinkedList{

        $query = 'SELECT date,titre,contenu,auteur FROM news WHERE date =' . $date;
        $liste = $con->executeQuery($query,);
        return $liste;
    }
}