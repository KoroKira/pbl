<?php
// Inclure le fichier de configuration de la base de données
include('includes/config.php');

// Vérifier si l'utilisateur est connecté et est administrateur
session_start();
if (!isset($_SESSION['user_id']) || !$_SESSION['isAdmin']) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté ou n'est pas un administrateur
    header("Location: index.php");
    exit();
}

// Vérifier si l'ID de l'utilisateur à supprimer est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = $_GET['id'];

    // Supprimer l'utilisateur de la base de données
    $delete_user_query = "DELETE FROM users WHERE id = $user_id";
    $delete_user_result = mysqli_query($conn, $delete_user_query);

    if ($delete_user_result) {
        // Rediriger vers la page d'administration avec un message de succès
        header("Location: admin.php?delete_success=true");
        exit();
    } else {
        // Rediriger vers la page d'administration avec un message d'erreur
        header("Location: admin.php?delete_error=true");
        exit();
    }
} else {
    // Rediriger vers la page d'administration si l'ID de l'utilisateur à supprimer n'est pas spécifié
    header("Location: admin.php");
    exit();
}
?>
