<?php

require ('model/metiers/News.php');

/**
 * Class GtwNews
 */
class GtwNews
{
    /**
     * @var Connection Instance de la classe Connection pour accès à la base de données.
     */
    private $con;

    protected static string $dsn = 'mysql:host=localhost;dbname=blog';

    protected static string $username = 'root';

    protected static string $password = 'root';

    private $tabAllNews;

    private $tabNewsByDate;

    private $tabNewsByUser;


    /**
     * GtwNews constructor.
     */
    public function __construct()
    {
        $this->con = new Connection($this::$dsn,$this::$username,$this::$password);
        $this->tabAllNews = array();
        $this->tabNewsByDate = array();
        $this->tabNewsByUser = array();

    }

    /**
     * Fonction d'ajout d'une news en base de données.
     * @param string $date Date de la rédaction de la news.
     * @param string $titre Titre de la news.
     * @param string $description Contenu de la news.
     * @param string $auteur Login de l'auteur de la news.
     */
    public function addNews(string $date,string $titre,string $description,string $auteur)
    {
        // ATTENTION AU TO DATE POUR LE SQL
        $query = 'INSERT INTO news(date,titre,description,auteur) VALUES(:date,:titre,:description,:auteur)';
        $this->con->executeQuery($query,array(':date'=>$date,':titre'=>$titre,':description'=>$description,':auteur'=>$auteur));
    }

    /**
     * Fonction de suppression d'une news en fonction de son titre.
     * @param string $titre
     */
    public function deleteNews(string $titre)
    {
        $query = 'DELETE FROM news WHERE idNews=:titre';
        $this->con->executeQuery($query,array(':titre'=>$titre));
    }

    /**
     * Fonction qui retourne toute les news trouvées en base de données.
     * @return array Tableau d'instance métiers des news trouvées en base de données.
     */
    public function getAllNews():array
    {
        $query = 'SELECT * FROM news ORDER BY date desc ';
        $params = array();
        $this->con->executeQuery($query,$params);
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabAllNews[] = new News($row['idNews'],$row['date'],$row['titre'],$row['description'],$row['auteur']);
        }
        return $this->tabAllNews;
    }

    /**
     * Fonction qui compte le nombre total de news en base de données.
     * @return int Nombre de news
     */
    public function getNbNews():int
    {
        $query = 'SELECT count(*) FROM news';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }

    /**
     * Fonction qui retoure toutes les news postées à une date donnée en base de données.
     * @param string $date Date de recherche.
     * @return array Tableau d'instance métiers des news trouvées en base de données à la date donnée.
     */
    public function getNewsByDate(string $date):array
    {
        $query = 'SELECT * FROM news WHERE date=:date';
        $this->con->executeQuery($query,array(':date'=>$date));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabNewsByDate[] = new News($row['idNews'],$row['date'],$row['$titre'],$row['description'],$row['lien'],$row['auteur']);
        }
        return $this->tabNewsByDate;
    }

    /**
     * Fonction qui retourne les news d'un utilisateur depuis la base de données.
     * @param int $idUser
     * @return array Tableau d'instance métiers des news trouvées en base de données écrites par un utilisateur donné.
     */
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