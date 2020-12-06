<?php


class CtrlVisitor
{
    public function __construct(){
        $action = $_GET['action'] ?? null;

        try{
            switch(strtolower($action)){
                case $action='search':
                    $this->searchNews();
                default:
                    require('../views/error.html');
            }
        }catch (PDOException $e){
            $erreur = 'Erreur lors de la connexion à la base de donnée.';
            require('../views/error.php');
        }catch (Exception $e2){
            $erreur = 'Erreur lors de l\'éxécution du code du controller visiteur';
            require('../views/erro.php');
        }
    }

    public function searchNews()
    {
        echo 'coucou';
        /*$mdl = new model.ModelUser;
        $user = $mdl->getUser();
        $user->getNewsByDate();*/
    }

    public function addComment()
    {
        $mdl = new model.User;
        $user = $mdl->getUser();
        require('../views/addComment.php');
    }
}

new CtrlVisitor();

?>