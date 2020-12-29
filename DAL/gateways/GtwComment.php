<?php

/**
 * Class GtwComment
 */
class GtwComment
{
    protected static $dsn='mysql:host=localhost;dbname=blog';
    protected static $username='root';
    protected static $password='';
    private $con;
    private $tabAllComment;
    private $tabCommentByNews;

    /**
     * GtwComment constructor.
     */
    public function __construct(){
        global $dsn, $username, $password;
        $con = new Connection($dsn,$username,$password);
        $this->tabAllComment=array();
        $this->tabCommentByNews=array();
    }

    /**
     * Fonction d'ajout d'un commentaire de news en base de données.
     * @param $idNews
     * @param $auteur
     * @param $message
     */
    public function addComment($idNews, $auteur, $message){
        $query='INSERT INTO comment(idNews, auteur, message) VALUES(:idNews, :auteur, :message)';
        $this->con->executeQuery($query,array(':idNews'=>$idNews, ':auteur'=>$auteur, ':message'=>$message));
    }

    /**
     * Fonction qui renvoie les commentaires d'une news dans la base de données.
     * @param $idNews
     * @return array Tableau d'instances métier de commentaire d'une news.
     */
    public function getCommentByNews($idNews):array{
        $query = 'SELECT * FROM comment WHERE idNews = :idNews';
        $this->con->executeQuery($query,array(':idNews'=>$idNews));
        $results=$this->con->getResults();
        foreach ($results as $row){
            $this->tabCommentByNews[] = new Comment($row['idComment'],$row['idNews'],$row['auteur'],$row['message']);
        }
        return $this->tabCommentByNews;
    }

    /**
     * Fonction qui rnvoie le nombre total de commentaires en base de données.
     * @return int Nombre de commentaires.
     */
    public function getNbComment():int{
        $query = 'SELECT COUNT(*) FROM comment';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }

    /**
     * Fonction qui renvoie le nombre de commentaires d'une news donnée
     * @param $idNews
     * @return int Nombre de commentaires d'une news.
     */
    public function getNbCommentByNews($idNews):int{
        $query = 'SELECT COUNT(*) FROM comment WHERE idNews = :idNews';
        $this->con->executeQuery($query,array(':idNews'=>$idNews));
        return $this->con->getResults();
    }

    /**
     * Fonction qui renvoie le nombre de commentaires d'un utilisateur donné.
     * @param $idUser
     * @return int Nombre de commentaires de l'utilisateur
     */
    public function getNbCommentByUser($idUser):int{
        $query = 'SELECT COUNT(*) FROM comment WHERE auteur = :idUser';
        $this->con->executeQuery($query,array(':idUser'=>$idUser));
        return $this->con->getResults();
    }
}