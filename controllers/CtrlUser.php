<?php

/**
 * Class CtrlUser
 */
class CtrlUser
{
    /**
     * CtrlUser constructor.
     * @param $action
     */
    public function __construct($action)
    {
        try{
            switch(strtolower($action)){
                case $action='deconnection':
                    $this->deconnection();
                    break;
                case $action='addnews':
                    $this->addNews();
                    break;
                case $action='deletemynews':
                    $this->deleteMyNews();
                    break;
                case null:
                default:
                    $error = 'erreur dans le controlleur user';
                    require('views/error.php');
            }
        }catch (PDOException $e){
            $error = 'Erreur lors de la connexion à la base de données.<br><br>Erreur plus précise : '.$e->getMessage();
            require('views/error.php');
        }catch (Exception $e2){
            $error = 'Erreur lors de l\'éxécution du code du controller user.<br><br>Erreur plus précise : '.$e2->getMessage();
            require('views/error.php');
        }
    }

    /**
     * Fonction de deconnection du controlleur user.
     */
    public function deconnection()
    {
        $mdl = new ModelUser();
        $mdl->deconnection();
        header("Location: /");
    }

    /**
     * Fonction d'ajout de news du controlleur user.
     */
    public function addNews()
    {
        if(isset($_POST['titre']) && isset($_POST['contenu']) && !empty($_POST['titre']) && !empty($_POST['contenu'])){
            $titre = Nettoyer::nettoyerString($_POST['titre']);
            $contenu = Nettoyer::nettoyerString($_POST['contenu']);

            $mdl = new ModelNews();

            $mdl->addNews($titre,$contenu,$_SESSION['login']);

            header('Location: /');
        }
        else{
            require_once ('views/addNews.php');
        }
    }

    /**
     * Fonction de suppression des news d'un utilisateur normal du controlleur user.
     */
    public function deleteMyNews(){
        if(isset($_GET['id'])){
            $id = Nettoyer::nettoyerInt($_GET['id']);

            $mdlcom = new ModelComment();
            if($mdlcom->getNbCommentByNews($id) != 0){
                $mdlcom->deleteCommentByNews($id);
            }

            $mdl = new ModelNews();
            $mdl->deleteNews($id);
            header('Location: /');
        }
    }

}

?>