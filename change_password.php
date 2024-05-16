<?php
// Inclure le fichier de configuration de la base de données
include('includes/config.php');

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: index.php");
    exit();
}

// Vérifier si le formulaire de modification de mot de passe a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    // Récupérer l'ID de l'utilisateur actuel
    $user_id = $_SESSION['user_id'];

    // Nettoyer et récupérer les mots de passe soumis
    $current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Vérifier si le nouveau mot de passe correspond à la confirmation
    if ($new_password != $confirm_password) {
        // Rediriger vers la page de profil avec un message d'erreur
        header("Location: profile.php?password_error=true");
        exit();
    }

    // Vérifier si le mot de passe actuel est correct
    $password_query = "SELECT * FROM users WHERE id = $user_id AND password = '$current_password'";
    $password_result = mysqli_query($conn, $password_query);

    if (mysqli_num_rows($password_result) == 1) {
        // Mettre à jour le mot de passe dans la base de données
        $update_password_query = "UPDATE users SET password = '$new_password' WHERE id = $user_id";
        $update_password_result = mysqli_query($conn, $update_password_query);

        if ($update_password_result) {
            // Rediriger vers la page de profil avec un message de succès
            header("Location: profile.php?password_success=true");
            exit();
        } else {
            // Rediriger vers la page de profil avec un message d'erreur
            header("Location: profile.php?password_error=true");
            exit();
        }
    } else {
        // Rediriger vers la page de profil avec un message d'erreur si le mot de passe actuel est incorrect
        header("Location: profile.php?password_error=true");
        exit();
    }
} else {
    // Rediriger vers la page de profil si le formulaire n'a pas été soumis correctement
    header("Location: profile.php");
    exit();
}
?>
