<?php include('includes/header.php'); ?>

<div class="container">
    <h2>Tableau de bord</h2>
    <!-- Affichage des messages ici -->
    <form action="post_message.php" method="post">
        <div class="form-group">
            <label for="message">Message :</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Poster</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
