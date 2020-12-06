<?php

class ModelNews
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = new GtwNews();
    }

    public function addNews()
    {
        $this->gateway->addNews();
    }

    public function deleteNews($idNews)
    {
        $this->gateway->deleteNews();
    }

    public function getAllNews()
    {
        return $this->gateway->getAllNews();
    }

    public function getNbNews()
    {
        return $this->gateway->getnbNews();
    }

    public function getNewsByUser($user)
    {
        return $this->gateway->getNewsByUser($user);
    }

    public function getNewsByDate($date)
    {
        return $this->gateway->getNewsByDate($date);
    }
}