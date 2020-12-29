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
        $today = date('d/m/y');
        $this->gateway->addNews($today, $titre, $description, $auteur);
    }

    /**
     * Fonction suppression d'une news du Model News.
     * @param int $idNews Identifiant de la news à supprimer
     */
    public function deleteNews(int $idNews)
    {
        $this->gateway->deleteNews();
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
     * Fonction qui retourne le nombre de news du site.
     * @return int Nombre de news du site
     */
    public function getNbNews()
    {
        return $this->gateway->getnbNews();
    }

    /**
     * @param $user
     * @return array
     */
    public function getNewsByUser($user)
    {
        return $this->gateway->getNewsByUser($user);
    }

    /**
     * Fonction qui renvoie les news postées à une date spécifiée.
     * @param $date Date de recherche.
     * @return array Tableau d'instance métiers des news à la date recherchée.
     */
    public function getNewsByDate($date)
    {
        return $this->gateway->getNewsByDate($date);
    }
}