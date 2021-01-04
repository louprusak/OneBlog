<?php

/**
 * Class News
 */
class News
{
    private $idNews;

    private $date;

    private $titre;

    private $description;

    private $auteur;

    /**
     * News constructor.
     * @param $idNews
     * @param $date
     * @param $titre
     * @param $description
     * @param $auteur
     */
    function __construct($idNews,$date,$titre,$description,$auteur)
    {
        $this->idNews = $idNews;
        $this->date = $date;
        $this->titre = $titre;
        $this->description = $description;
        $this->auteur = $auteur;
    }

    /**
     * Getter de l'identifiant de la news
     * @return mixed
     */
    public function getIdNews()
    {
        return $this->idNews;
    }

    /**
     * Getter de la date de publication de la news
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Getter du titre de la news
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Getter du contenu de la news
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Getter de l'auteur de la news
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
}