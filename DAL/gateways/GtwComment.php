<?php


class GtwComment
{
    protected static $dsn='mysql:host=localhost;dbname=blog';
    protected static $username='root';
    protected static $password='';
    private $con;
    private $tabAllComment;
    private $tabCommentByNews;

    public function __construct(){
        global $dsn, $username, $password;
        $con = new Connection($dsn,$username,$password);
        $this->tabAllComment=array();
        $this->tabCommentByNews=array();
    }

    public function addComment($idNews, $auteur, $message){
        $query='INSERT INTO comment(idNews, auteur, message) VALUES(:idNews, :auteur, :message)';
        $this->con->executeQuery($query,array(':idNews'=>$idNews, ':auteur'=>$auteur, ':message'=>$message));
    }

    public function getCommentByNews($idNews){
        $query = 'SELECT * FROM comment WHERE idNews = :idNews';
        $this->con->executeQuery($query,array(':idNews'=>$idNews));
        $results=$this->con->getResults();
        foreach ($results as $row){
            $this->tabCommentByNews[] = new Comment($row['idComment'],$row['idNews'],$row['auteur'],$row['message']);
        }
        return $this->tabCommentByNews;
    }

    public function getNbComment(){
        $query = 'SELECT COUNT(*) FROM comment';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }

    public function getNbCommentByNews($idNews){
        $query = 'SELECT COUNT(*) FROM comment WHERE idNews = :idNews';
        $this->con->executeQuery($query,array(':idNews'=>$idNews));
        return $this->con->getResults();
    }

    public function getNbCommentByUser($idUser){
        $query = 'SELECT COUNT(*) FROM comment WHERE auteur = :idUser';
        $this->con->executeQuery($query,array(':idUser'=>$idUser));
        return $this->con->getResults();
    }
}