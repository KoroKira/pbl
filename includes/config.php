<?php
$servername = "localhost";
$username = "username"; // Remplace 'username' par le nom d'utilisateur de ta base de données
$password = "password"; // Remplace 'password' par le mot de passe de ta base de données
$database = "database"; // Remplace 'database' par le nom de ta base de données

// Créer une connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $database);

// Vérifier la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
?>
