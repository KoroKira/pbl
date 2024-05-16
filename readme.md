# PBL de Guilhem 

Ce projet consiste à créer un site web basique utilisant PHP, MySQL et Bootstrap, avec les fonctionnalités suivantes :

Création de compte utilisateur
Connexion et déconnexion
Affichage et envoi de messages
Profil utilisateur avec modification de mot de passe
Interface d'administration pour gérer les utilisateurs et les messages


## Installation

1. Clone ce dépôt sur ta machine locale.
2. Assurez-vous d'avoir XAMPP installé sur ton serveur.
3. Démarre XAMPP et assure-toi que les services Apache et MySQL sont en cours d'exécution.
4. Créé la table et les infos de la db (voir dans `database` pour plus d'infos)
5. Configure les paramètres de connexion à la base de données dans le fichier `config.php`.
6. Ouvre ton navigateur et accède à `http://localhost/nom-du-projet` pour voir l'application en action.

## Configuration du Serveur XAMPP

Pour configurer correctement le serveur XAMPP, suis les étapes suivantes:

1. Télécharge XAMPP à partir du site officiel et installe-le sur le serveur.
2. Démarre XAMPP et assure-toi que les services Apache et MySQL sont en cours d'exécution.
3. Ouvre le navigateur et accédez à `http://localhost` pour vérifier que le serveur est en cours d'exécution.
4. Pour configurer la base de données, accédez à `http://localhost/phpmyadmin`.
5. Crée une nouvelle base de données avec le nom de ton choix.
6. Modifie les paramètres de connexion à la base de données dans le fichier `config.php` de ton projet.

## Database

Table users :

id INT AUTO_INCREMENT PRIMARY KEY : Identifiant unique de l'utilisateur.

username VARCHAR(255) UNIQUE : Nom d'utilisateur de l'utilisateur.

password VARCHAR(255) : Mot de passe de l'utilisateur (assure-toi de stocker les mots de passe de manière sécurisée, par exemple en les hashant).

isAdmin BOOLEAN DEFAULT 0 : Champ pour indiquer si l'utilisateur est administrateur (1 pour admin, 0 pour utilisateur standard).


Table messages :

id INT AUTO_INCREMENT PRIMARY KEY : Identifiant unique du message.

user_id INT : Référence à l'utilisateur qui a posté le message (clé étrangère vers la table users).

message TEXT : Contenu du message.

timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP : Horodatage du moment où le message a été posté.



