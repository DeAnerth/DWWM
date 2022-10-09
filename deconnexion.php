<?php
$page = 'deconnexion.php';
require_once 'controllers/deconnexionCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php'
?>
<main class="deconnexion container mt-3">
    <article>
        <div class="deconnexionContainer">
            <div class="mt-5 mb-5">
                <p >Vous avez bien été déconnecté, merci de votre visite.</p>
            </div>
            <div class="mt-5 mb-5">
                <a class="Connexion card-link btn btn-bkgd-black text-white-yellow-btn col-sm-7 col align-self-center" data-bs-toggle="modal" href="#modalConnexion" role="button">Se connecter</a>
            </div>
        </div>
    </article>
</main>

<?php include 'includes/footer.php'; ?>