<?php


class CtrlVisitor
{
    public function __construct()
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
    }

    public function searchNews()
    {
        require('/views/search.php');
        /*echo 'coucou';*/
        /*$mdl = new model.ModelUser;
        $user = $mdl->getUser();
        $user->getNewsByDate();*/
    }

    public function addComment()
    {
        /*$mdl = new model.User;
        $user = $mdl->getUser();*/
        require('../views/addComment.php');
    }

    public function register()
    {
        require('/views/inscription.php');
    }

    public function displayNews()
    {
        /*$mdlnews = new ModelNews();
        $listNews = $mdlnews->getAllNews();*/
        require('/views/index.html');
    }
}

new CtrlVisitor();

?>