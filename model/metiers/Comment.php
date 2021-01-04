<?php

/**
 * Class Comment
 */
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
     * Getter de l'identifiant du commentaire
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->idComment;
    }

    /**
     * Getter de l'identifiant de la news associée du commentaire
     * @return mixed
     */
    public function getIdNews()
    {
        return $this->idNews;
    }

    /**
     * Getter de l'auteur du commentaire
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Getter du contenu du commentaire
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}