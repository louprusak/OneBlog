<?php


class GtwNews
{
    private $con;

    public function __construct($dsn,$username,$password)
    {
        $con = new Connection($dsn,$username,$password);

        // mettre la suite du code donné dans l'exemple de la classe connection
    }

    public function addNews($con,$date,$titre,$contenu,$auteur){
        $query = 'insert into news(date,titre,contenu,auteur) values($date,$titre,$contenu,$auteur)';
        $con->executeQuery($query,);
    }

    public function deleteNews($con,$titre){
        $query = 'delete from news where idNews = ' . $titre;
        $con->executeQuery($query,);
    }

    public function listerNews($con){
        $query = 'select * from news';
        $liste = $con->executeQuery($query,);
        return $liste;
    }

    public function findByDate($con,$date):LinkedList{

        $query = 'SELECT date,titre,contenu,auteur FROM news WHERE date =' . $date;
        $liste = $con->executeQuery($query,);
        return $liste;
    }
}