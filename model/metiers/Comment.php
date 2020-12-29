<?php


class Comment
{
    private $idComment;

    private $idNews;

    private $auteur;

    private $message;

    /**
     * Comment constructor.
     * @param int $idComment
     * @param int $idNews
     * @param string $auteur
     * @param string $message
     */
    function __construct($idComment,$idNews,$auteur,$message)
    {
        $this->idComment = $idComment;
        $this->idNews = $idNews;
        $this->auteur = $auteur;
        $this->message =$message;
    }

    /**
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->idComment;
    }

    /**
     * @param mixed $idComment
     */
    public function setIdComment($idComment)
    {
        $this->idComment = $idComment;
    }

    /**
     * @return mixed
     */
    public function getIdNews()
    {
        return $this->idNews;
    }

    /**
     * @param mixed $idNews
     */
    public function setIdNews($idNews)
    {
        $this->idNews = $idNews;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }




}