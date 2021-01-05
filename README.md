# OneBlog | Blog PHP
## Informations
- Base de données MySQL 5.7.31
- PHP version 7.4.9

## Configuration

1. Base de données
Vérifiez bien que les variables de base de données du site correspondent à vos paramètres personnels.
Si cela n'est pas le cas, il faut changer le DSN, USERNAME et PASSWORD dans le fichier **config.php** qui se trouve dans le dossier **config**.

2. Serveur 
Pour que le site fonctionne dans les meilleurs conditions, nous vous conseillons de mettre les fichiers directement à la racine du serveur.
Si vous souhaitez le faire dans un autre dossier:
* Ouvrez un terminal dans le dossier en question.
* Tapez la commande : **php -S votre_adresse:port **__(ex 3000)__
* Dans votre naviguateur : votre_adresse:port/**index.php**

