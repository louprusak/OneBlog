# OneBlog | Blog PHP
## Informations
- Base de données MySQL 5.7.31
- PHP version 7.4.9

## Configuration

1. Base de données
Vérifiez bien que les variables de base de données du site correspondent à vos paramètres personnels.
Si cela n'est pas le cas, il faut changer le DSN, USERNAME et PASSWORD dans le fichier **config.php** qui se trouve dans le dossier **config**.
Quand vous créez votre base n'oubliez de la passer elle ainsi que toutes les tables et toutes les colonnes en encodage **utf8mb4_general_ci**.
Afin de créer toutes les tables et de réaliser les insertions prédéfinies, vous n'avez qu'a exécuter le fichier **bdd_blog.sql** qui se trouve dans le dossier **DAL/sql**.

2. Serveur 
Pour que le site fonctionne dans les meilleurs conditions, nous vous conseillons de mettre les fichiers directement à la racine du serveur.
Si vous souhaitez le faire dans un autre dossier:
* Ouvrez un terminal dans le dossier en question.
* Tapez la commande : **php -S votre_adresse:port** (ex php -S localhost:3000)
* Dans votre naviguateur : votre_adresse:port/**index.php**

## A Propos

1. Utilisateurs du site
Sur ce site, les utilisateurs peuvent avoir des rôles différents :
- Le** simple visiteur** peut : se connecter, s'inscrire, rechercher des news, ajouter un commentaire sur une news et lire une news.
- **L'Utilisateur** s'est auparavant inscrit sur le site et peut en plus des actions du visiteur : se déconnecter, ajouter des news et supprimer seulement les news qu'il a écrit.
Dans la base de données, deux sont crées par défaut : _(loup loup),(manoah manoah)_.
- **L'administrateur** peut faire tout ce que fait l'utilisateur normal à la différence qu'il peut supprimer n'importe quelle news.
Impossible de rajouter de nouveaux administrateur, il faut le faire manuellement dans la base de données. Le seul existant est _(admin admin)_.

2. Ajout de commentaires
Nous avons choisi lors de l'ajout de commentaires de ne pas donner le choix aux visiteurs de pouvoir rentrer un pseudo associé à son commentaire. Il sera donc marqué comme utilisateur anonyme. Seuls les utilisateurs connectés auront leur pseudo déjà rempli quand ils ajouteront un commentaire.

## Conclusion

Nous espérons que ce site vous sera utile et surtout vous plaira ! Bonne visite !

Loup et Manoah :P
