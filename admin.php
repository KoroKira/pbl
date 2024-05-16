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

// Récupérer la liste des utilisateurs
$users_query = "SELECT * FROM users";
$users_result = mysqli_query($conn, $users_query);

// Récupérer la liste des messages
$messages_query = "SELECT * FROM messages";
$messages_result = mysqli_query($conn, $messages_query);
?>

<?php include('includes/header.php'); ?>

<div class="container">
    <h2>Administration</h2>
    <h3>Utilisateurs</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom d'utilisateur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = mysqli_fetch_assoc($users_result)) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><a href="delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h3>Messages</h3>
    <ul class="list-group">
        <?php while ($message = mysqli_fetch_assoc($messages_result)) { ?>
            <li class="list-group-item"><?php echo $message['message']; ?> (Utilisateur ID: <?php echo $message['user_id']; ?>)</li>
        <?php } ?>
    </ul>
</div>

<?php include('includes/footer.php'); ?>
