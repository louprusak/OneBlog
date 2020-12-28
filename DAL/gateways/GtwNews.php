<?php


class GtwNews
{
    private $con;

    protected static string $dsn = 'mysql:host=localhost;dbname=blog';

    protected static string $username = 'root';

    protected static string $password = 'root';


    private $tabAllNews;

    private $tabNewsByDate;

    private $tabNewsByUser;



    public function __construct()
    {
        //global $dsn,$username,$password;
        $this->con = new Connection($this::$dsn,$this::$username,$this::$password);
        echo 'construction instance classe connection ok';
        $this->tabAllNews = array();
        $this->tabNewsByDate = array();
        $this->tabNewsByUser = array();

    }

    public function addNews(DateTime $date,string $titre,string $description,string $auteur)
    {
        $query = 'INSERT INTO news(date,titre,description,auteur) VALUES(:date,:titre,:description,:auteur)';
        $this->con->executeQuery($query,array(':date'=>$date,':titre'=>$titre,':description'=>$description,':auteur'=>$auteur));
    }

    public function deleteNews(string $titre)
    {
        $query = 'DELETE FROM news WHERE idNews=:titre';
        $this->con->executeQuery($query,array(':titre'=>$titre));
    }

    public function getAllNews():array
    {
        echo 'fonction getallnews de la gateway<br>';
        $query = 'SELECT * FROM news ORDER BY desc date';
        echo 'query ok';
        $this->con->executeQuery($query);
        echo 'execute query ok';
        $results = $this->con->getResults();
        echo 'getresults ok';
        foreach ($results as $row){
            $this->tabAllNews[] = new News($row['idNews'],$row['date'],$row['$titre'],$row['description'],$row['lien'],$row['auteur']);
        }
        return $this->tabAllNews;
    }

    public function getNbNews():int
    {
        $query = 'SELECT count(*) FROM news';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }


    public function getNewsByDate(DateTime $date):array
    {
        $query = 'SELECT * FROM news WHERE date=:date';
        $this->con->executeQuery($query,array(':date'=>$date));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabNewsByDate[] = new News($row['idNews'],$row['date'],$row['$titre'],$row['description'],$row['lien'],$row['auteur']);
        }
        return $this->tabNewsByDate;
    }

    public function getNewsByUser(int $idUser):array
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