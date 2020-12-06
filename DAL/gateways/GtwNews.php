<?php


class GtwNews
{
    private $con;

    protected static $dsn = 'mysql:host=localhost;dbname=blog';

    protected static $username = 'root';

    protected static $password = '';


    private $tabAllNews;

    private $tabNewsByDate;

    private $tabNewsByUser;


    public function __construct()
    {
        global $dsn,$username,$password;
        $con = new Connection($dsn,$username,$password);
        $this->tabAllNews = array();
        $this->tabNewsByDate = array();
        $this->tabNewsByUser = array();

    }

    public function addNews($date,$titre,$description,$auteur)
    {
        $query = 'INSERT INTO news(date,titre,description,auteur) VALUES(:date,:titre,:description,:auteur)';
        $this->con->executeQuery($query,array(':date'=>$date,':titre'=>$titre,':description'=>$description,':auteur'=>$auteur));
    }

    public function deleteNews($titre)
    {
        $query = 'DELETE FROM news WHERE idNews=:titre';
        $this->con->executeQuery($query,array(':titre'=>$titre));
    }

    public function getAllNews()
    {
        $query = 'SELECT * FROM news ORDER BY desc date';
        $this->con->executeQuery($query,null);
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabAllNews[] = new News($row['idNews'],$row['date'],$row['$titre'],$row['description'],$row['lien'],$row['auteur']);
        }
        return $this->tabAllNews;
    }

    public function getNbNews()
    {
        $query = 'SELECT count(*) FROM news';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }


    public function getNewsByDate($date)
    {
        $query = 'SELECT * FROM news WHERE date=:date';
        $this->con->executeQuery($query,array(':date'=>$date));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabNewsByDate[] = new News($row['idNews'],$row['date'],$row['$titre'],$row['description'],$row['lien'],$row['auteur']);
        }
        return $this->tabNewsByDate;
    }

    public function getNewsByUser($idUser)
    {
        $query = 'SELECT * FROM news WHERE auteur=:idUser';
        $this->con->executeQuery($query,array(':idUser'=>$idUser));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabNewsByUser[] = new News($row['idNews'],$row['date'],$row['$titre'],$row['description'],$row['lien'],$row['auteur']);
        }
        return $this->tabNewsByUser;
    }
}