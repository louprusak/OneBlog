<?php



require_once ('model/ModelNews.php');
require_once ('model/ModelUser.php');

class CtrlVisitor
{

    public function __construct()
    {
        $action = $_GET['action'] ?? null;


        try{
            switch(strtolower($action)){
                case 'search':
                    $this->searchNews();
                    break;
                case 'display':
                    $this->displayNews();
                    break;
                case 'addComment':
                    $this->addComment();
                    break;
                case 'register':
                    $this->register();
                    break;
                case 'connection';
                    $this->connection();
                    break;
                case null:
                default:
                    echo "affichage des news car action nulle<br>";
                    //$message = 'Cette action n\'est pas disponible';
                    $this->displayNews();

            }
        }catch (PDOException $e){
            $error = 'Erreur lors de la connexion à la base de données.';
            require('views/error.php');
        }catch (Exception $e2){
            $error= 'Erreur lors de l\'éxécution du code du controller visiteur';
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
        echo 'Fonction display news du controlleur visiteur<br>';
        $mdl = new ModelNews();
        $listNews = $mdl->getAllNews();
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