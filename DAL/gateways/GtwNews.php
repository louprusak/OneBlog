<?php

require ('model/metiers/News.php');

/**
 * Class GtwNews
 */
class GtwNews
{
    private $con;
    private $tabAllNews;
    private $tabNewsByDate;
    private $tabNewsByUser;


    /**
     * GtwNews constructor.
     */
    public function __construct()
    {
        global $dsn, $password, $username;
        $this->con = new Connection($dsn,$username,$password);
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
        $query = 'INSERT INTO news(date,titre,description,auteur) VALUES(:date,:titre,:description,:auteur)';
        $this->con->executeQuery($query,array(
            ':date'=>array($date,PDO::PARAM_STR),
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':description'=>array($description,PDO::PARAM_STR),
            ':auteur'=>array($auteur,PDO::PARAM_STR)));
    }

    /**
     * Fonction de suppression d'une news en fonction de son identifiant.
     * @param int $id Identifiant de la news
     */
    public function deleteNews(int $id)
    {
        $query = 'DELETE FROM news WHERE idNews=:id';
        $this->con->executeQuery($query,array(':id'=> array($id,PDO::PARAM_INT)));
    }

    /**
     * Fonction qui retourne toute les news trouvées en base de données.
     * @return array Tableau d'instance métiers des news trouvées en base de données.
     */
    public function getAllNews():array
    {
        $query = 'SELECT * FROM news ORDER BY date DESC ';
        $params = array();
        $this->con->executeQuery($query,$params);
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabAllNews[] = new News($row['idNews'],$row['date'],$row['titre'],$row['description'],$row['auteur']);
        }
        return $this->tabAllNews;
    }

    /**
     * Fonction qui retoure toutes les news postées à une date donnée en base de données.
     * @param string $date Date de recherche.
     * @return array Tableau d'instance métiers des news trouvées en base de données à la date donnée.
     */
    public function getNewsByDate(string $date):array
    {
        $query = 'SELECT * FROM news WHERE date= :date';
        $this->con->executeQuery($query,array(':date'=> array($date, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabNewsByDate[] = new News($row['idNews'],$row['date'],$row['titre'],$row['description'],$row['auteur']);
        }
        return $this->tabNewsByDate;
    }


    /**
     * Fonction qui retourne une instance métier d'une news en base de donnée trouvée de par son identifiant
     * @param int $idNews Identifiant de la news
     * @return News Instance métier de la news retournée
     */
    public function getNewsById(int $idNews):News
    {
        $query = 'SELECT * FROM news WHERE idNews=:idNews';
        $this->con->executeQuery($query,array(':idNews'=> array($idNews,PDO::PARAM_INT)));
        $results = $this->con->getResults();
        $results = count($results) != 0 ? $results[0] : null;

        return new News($results['idNews'],$results['date'],$results['titre'],$results['description'],$results['auteur']);
    }
}