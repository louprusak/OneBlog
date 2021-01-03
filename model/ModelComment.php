<?php


class ModelComment
{
    private $gateway;

    public function __construct(){
        $this->gateway=new GtwComment();
    }

    public function addComment($idNews, $auteur, $message){
        $this->gateway->addComment($idNews, $auteur, $message);
    }

    public function getCommentByNews($idNews){
        return $this->gateway->getCommentByNews($idNews);
    }

    public function getNbComment(){
        return $this->gateway->getNbComment();
    }

    public function getNbCommentByNews($idNews){
        return $this->gateway->getNbCommentByNews($idNews);
    }

    public function getNbCommentByUser($idUser){
        return $this->gateway->getNbCommentByUser($idUser);
    }

    public function deleteCommentByNews($id)
    {
        $this->gateway->deleteCommentByNews($id);
    }
}