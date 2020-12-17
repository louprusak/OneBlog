<?php


class CtrlVisitor
{

    public function __construct($action)
    {
        //$action = $_GET['action'] ?? null;

        try{
            switch(strtolower($action)){
                case null:
                    $message = 'L\'action est nulle';
                    require('views/error.php');
                    break;
                case $action='search':
                    $this->searchNews();
                    break;
                case $action='display':
                    $this->displayNews();
                    break;
                case $action='addComment':
                    $this->addComment();
                    break;
                case $action='register':
                    $this->register();
                    break;
                case $action='connection';
                    $this->connection();
                    break;
                default:
                    $message = 'Cette action n\'est pas disponible';
                    require('views/error.php');
            }
        }catch (PDOException $e){
            $erreur = 'Erreur lors de la connexion à la base de donnée.';
            require('views/error.php');
        }catch (Exception $e2){
            $erreur = 'Erreur lors de l\'éxécution du code du controller visiteur';
            require('views/error.php');
        }

    }

    public function searchNews()
    {
        require('views/search.php');
    }

    public function addComment()
    {
        require('views/addComment.php');
    }

    public function displayNews()
    {
        require('views/index.php');
    }

    private function connection()
    {
        require('views/connection.php');
    }

    public function register()
    {
        require('views/register.php');
    }
}



?>