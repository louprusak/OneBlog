<?php


class ModelNews
{
    public function addNews()
    {

    }

    public function deleteNews($idNews)
    {

    }

    public function getNewsByDate()
    {
        $gtw = new GtwNews('blog','root','');
        $gtw->addNews($gtw->getConnection(),$_POST['date'],$_POST['titre'],$_POST['contenu'],$_POST['auteur']);
    }
}