<?php

/**
 * Class ModelComment
 */
class ModelComment
{
    /**
     * @var GtwNews Attribut gateway news
     */
    private $gateway;

    /**
     * ModelComment constructor.
     */
    public function __construct(){
        $this->gateway=new GtwComment();
    }

    /**
     * Fonction d'ajout de commentaire du model comment
     * @param string $idNews id de la news concernée
     * @param string $auteur login de l'auteur ou null si non connecté
     * @param string $message contenu du commentaire
     */
    public function addComment($idNews, $auteur, $message){
        $this->gateway->addComment($idNews, $auteur, $message);
    }

    /**
     * Fonction qui renvoie les instances métiers des commentaires d'une news
     * @param $idNews
     * @return mixed
     */
    public function getCommentByNews($idNews){
        $results = $this->gateway->getCommentByNews($idNews);
        foreach ($results as $row){
            $tabCommentByNews[] = new Comment($row['idComment'],$row['idNews'],$row['auteur'],$row['message']);
        }
        return $tabCommentByNews;
    }

    /**
     * Fonction qui renvoie le nombre de commentaires en base de données
     * @return int
     */
    public function getNbComment(){
        return $this->gateway->getNbComment();
    }

    /**
     * Fonction qui renvoie le nombre de commentaires d'une news en particulier
     * @param $idNews
     * @return int
     */
    public function getNbCommentByNews($idNews){
        return $this->gateway->getNbCommentByNews($idNews);
    }

    /**
     * Fonction qui supprime une news en base de données
     * @param $id
     */
    public function deleteCommentByNews($id)
    {
        $this->gateway->deleteCommentByNews($id);
    }
}