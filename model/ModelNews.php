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
        $results = $this->gateway->getAllNews();
        foreach ($results as $row){
            $tabAllNews[] = new News($row['idNews'],$row['date'],$row['titre'],$row['description'],$row['auteur']);
        }
        return $tabAllNews;
    }

    /**
     * Fonction qui renvoie les news postées à une date spécifiée.
     * @param string $date Date de recherche.
     * @return array Tableau d'instance métiers des news à la date recherchée.
     */
    public function getNewsByDate(string $date)
    {
        $results = $this->gateway->getNewsByDate($date);
        foreach ($results as $row){
            $tabNewsByDate[] = new News($row['idNews'],$row['date'],$row['titre'],$row['description'],$row['auteur']);
        }
        return $tabNewsByDate;
    }

    /**
     * Fonction qui renvoie une news de part son identifiant
     * @param int $idNews Identifiant de le news
     * @return News Instance métier de la news
     */
    public function getNewsById(int $idNews)
    {
        $results = $this->gateway->getNewsById($idNews);
        $results = count($results) != 0 ? $results[0] : null;

        return new News($results['idNews'],$results['date'],$results['titre'],$results['description'],$results['auteur']);
    }
}