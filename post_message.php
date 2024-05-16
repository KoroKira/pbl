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

// Vérifier si le formulaire de message a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message']) && !empty($_POST['message'])) {
    // Récupérer l'ID de l'utilisateur actuel
    $user_id = $_SESSION['user_id'];

    // Nettoyer et récupérer le message soumis
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insérer le nouveau message dans la base de données
    $insert_message_query = "INSERT INTO messages (user_id, message) VALUES ($user_id, '$message')";
    $insert_message_result = mysqli_query($conn, $insert_message_query);

    if ($insert_message_result) {
        // Rediriger vers le tableau de bord avec un message de succès
        header("Location: dashboard.php?post_success=true");
        exit();
    } else {
        // Rediriger vers le tableau de bord avec un message d'erreur
        header("Location: dashboard.php?post_error=true");
        exit();
    }
} else {
    // Rediriger vers le tableau de bord si le formulaire n'a pas été soumis correctement
    header("Location: dashboard.php");
    exit();
}
?>
