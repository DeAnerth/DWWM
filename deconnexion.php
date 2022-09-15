<?php 
    require 'controllers/deconnexionCtrl.php';
?>

<?php 
include 'includes/header.php';
include 'includes/navbar.php' 
?>
<main class="container mt-3">

    <p>Vous avez bien été déconnecté, merci de votre visite.</p>

    <a href="connexion.php">
        <button class="btn btn-success">Se connecter</button>
    </a>

</main>

<?php include 'includes/footer.php'; ?>