<?php

?>

<nav class="navbar navbar-expand-lg py-3 py-lg-5 navbar-custom bg-dark-grey">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-person-circle"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 d-flex justify-content-between">
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('index.php'== $page) ? ' active' : '' ?>" aria-current="page" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('Bars'== $page) ? ' active' : '' ?>" href="categoryPage.php?name=Bars">Bars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('Restaurants'== $page) ? ' active' : '' ?>" href="categoryPage.php?name=Restaurants">Restaurants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('Boulangeries'== $page) ? ' active' : '' ?>" href="categoryPage.php?name=Boulangeries">Boulangeries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('Parcs'== $page) ? ' active' : '' ?>" href="categoryPage.php?name=Parcs">Parcs</a>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['id']) && $_SESSION['id'] !== null) : ?>
                        <a class="nav-link navbar-text Connexion" href="deconnexion.php" role="button">Se déconnecter</a>
                    <?php else : ?>
                        <a class="nav-link navbar-text Connexion" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Se connecter</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
include 'connexion.php';
?>