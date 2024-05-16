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

// Récupérer les messages de l'utilisateur actuel
$user_id = $_SESSION['user_id'];
$messages_query = "SELECT * FROM messages WHERE user_id = $user_id";
$messages_result = mysqli_query($conn, $messages_query);
?>

<?php include('includes/header.php'); ?>

<div class="container">
    <h2>Tableau de bord</h2>
    <h3>Mes Messages</h3>
    <ul class="list-group">
        <?php while ($message = mysqli_fetch_assoc($messages_result)) { ?>
            <li class="list-group-item"><?php echo $message['message']; ?></li>
        <?php } ?>
    </ul>

    <!-- Formulaire pour poster un nouveau message -->
    <form action="post_message.php" method="post">
        <div class="form-group">
            <label for="message">Nouveau Message :</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Poster</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
