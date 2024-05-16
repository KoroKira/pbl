<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Super Site</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Ajoute d'autres liens CSS si nécessaire -->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Mon Super Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Tableau de bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profil</a>
                    </li>
                    <?php if($_SESSION['isAdmin']) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Administration</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Connexion / Inscription</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
