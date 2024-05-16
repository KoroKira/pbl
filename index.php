<?php include('includes/header.php'); ?>

<div class="container">
    <h2>Connexion</h2>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

    <hr>

    <h2>Inscription</h2>
    <form action="register.php" method="post">
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-success">S'inscrire</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
