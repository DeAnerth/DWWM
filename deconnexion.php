<?php 
$page = 'deconnexion.php';
require_once 'controllers/deconnexionCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php' 
?>
<main class="container mt-3">

    <p>Vous avez bien été déconnecté, merci de votre visite.</p>

    <a class="Connexion" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Se connecter</a>

</main>

<?php include 'includes/footer.php'; ?>