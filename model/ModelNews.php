<?php

/**
 * Class ModelNews
 */
class ModelNews
{
    /**
     * @var GtwNews Attribut gateway news
     */
    private $gateway;

    /**
     * ModelNews constructor.
     */
    public function __construct()
    {
        $this->gateway = new GtwNews();
    }

    /**
     * Fonction ajout d'une news du Model News.
     * @param string $titre Titre de la news
     * @param string $description Contenu de la news
     * @param string $auteur Login de l'auteur de la News
     */
    public function addNews(string $titre, string $description, string $auteur)
    {
        $today = date('y-m-d');
        $this->gateway->addNews($today, $titre, $description, $auteur);
    }

    /**
     * Fonction suppression d'une news du Model News.
     * @param int $idNews Identifiant de la news à supprimer
     */
    public function deleteNews(int $idNews)
    {
        $this->gateway->deleteNews($idNews);
    }

    /**
     * Fonction qui renvoie toute les news du site.
     * @return array Tableau d'instance métiers des news du site
     */
    public function getAllNews()
    {
        return $this->gateway->getAllNews();
    }

    /**
     * Fonction qui renvoie les news postées à une date spécifiée.
     * @param string $date Date de recherche.
     * @return array Tableau d'instance métiers des news à la date recherchée.
     */
    public function getNewsByDate(string $date)
    {
        return $this->gateway->getNewsByDate($date);
    }

    /**
     * Fonction qui renvoie une news de part son identifiant
     * @param int $idNews Identifiant de le news
     * @return News Instance métier de la news
     */
    public function getNewsById(int $idNews)
    {
        return $this->gateway->getNewsById($idNews);
    }
}