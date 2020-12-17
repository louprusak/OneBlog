<?php


class CtrlVisitor
{
    /**
     * @var string|null
     */
    private $action;

    public function __construct(?string $action)
    {
        $action = $_GET['action'] ?? null;

        try{
            switch(strtolower($action)){
                case null:
                case $action='search':
                    $this->searchNews();

                case $action='display':
                    $this->displayNews();

                case $action='addComment':
                    $this->addComment();

                case $action='register':
                    $this->register();

                case $action='connection';
                    $this->connection();

                default:
                    require('../views/error.html');
            }
        }catch (PDOException $e){
            $erreur = 'Erreur lors de la connexion à la base de donnée.';
            require('/views/error.php');
        }catch (Exception $e2){
            $erreur = 'Erreur lors de l\'éxécution du code du controller visiteur';
            require('/views/erro.php');
        }
        $this->action = $action;
    }

    public function searchNews()
    {
        require('views/search.php');
    }

    public function addComment()
    {
        require('views/addComment.php');
    }

    public function register()
    {
        require('views/register.php');
    }

    public function displayNews()
    {
        require('views/index.php');
    }

    private function connection()
    {
        require('views/connection.php');
    }
}

new CtrlVisitor();

?>