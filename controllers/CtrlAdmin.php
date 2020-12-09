<?php


class CtrlAdmin extends CtrlUser
{
    public function __construct()
    {
        $action = $_GET['action'] ?? null;

        try{
            switch(strtolower($action)){
                case $action='connection':
                    $this->connection();

                case $action='search':
                    $this->searchNews();
            }
        }catch (PDOException $e){
            $erreur = 'Erreur lors de la connexion à la base de données.';
            require('../views/error.php');
        }catch (Exception $e2){
            $erreur = 'Erreur lors de l\'éxécution du code du controller user';
            require('../views/error.php');
        }
    }

    public function connection()
    {

    }

    public function searchNews()
    {
        $mdl = new model.User;
        $user = $mdl->getUser();
        $user->getNewsByDate();
    }

    public function addComment()
    {
        $mdl = new ModelUser();
        $user = $mdl->getUser();
        require('/views/addComment.php');
    }


    public function deleteComment()
    {
        $mdl = new model.User;
        $user = $mdl->getUser();
        $user->deleteComment();
    }
}