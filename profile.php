<?php include('includes/header.php'); ?>

<div class="container">
    <h2>Profil</h2>
    <!-- Formulaire de modification de mot de passe -->
</div>

<?php include('includes/footer.php'); ?>
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

// Récupérer les informations de l'utilisateur actuel
$user_id = $_SESSION['user_id'];
$user_query = "SELECT * FROM users WHERE id = $user_id";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);
?>

<?php include('includes/header.php'); ?>

<div class="container">
    <h2>Profil</h2>
    <p><strong>Nom d'utilisateur :</strong> <?php echo $user['username']; ?></p>

    <!-- Formulaire de modification de mot de passe -->
    <form action="change_password.php" method="post">
        <div class="form-group">
            <label for="current_password">Mot de passe actuel :</label>
            <input type="password" class="form-control" id="current_password" name="current_password">
        </div>
        <div class="form-group">
            <label for="new_password">Nouveau mot de passe :</label>
            <input type="password" class="form-control" id="new_password" name="new_password">
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirmer le nouveau mot de passe :</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        </div>
        <button type="submit" class="btn btn-primary">Modifier le mot de passe</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
