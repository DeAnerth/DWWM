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
                    <a class="nav-link navbar-text active" aria-current="page" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text Bars" href="category.php">Bars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text Restaurants" href="category.php">Restaurants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text Patisseries" href="category.php">Pâtisseries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text Parcs" href="category.php">Parcs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text Connexion" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Se connecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
include 'connexion.php';
?>
