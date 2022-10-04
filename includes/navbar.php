<?php

?>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg py-2 py-lg-5 navbar-custom bg-dark-grey menuContainer">
    <div class="container-fluid p-2">
        <!-- Icon of profilUser -->
        <a class="navbar-brand" aria-current="page" href="<?php
                                                            if (isset($userRole)) {
                                                                if ($userRole) {
                                                                    echo 'profilUserAdmin.php';
                                                                } else {
                                                                    echo 'profilUser.php';
                                                                }
                                                            } else {
                                                                echo 'index.php';
                                                            }
                                                            ?>"><i class="bi bi-person-circle "></i></a>
        <!-- Icon of Burger -->
        <button class="navbar-dark navbar-toggler navbar-toggler-color" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="bi bi-list"></span>
        </button>
        <!-- List of links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 d-flex justify-content-between menuContainer">
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('index.php' == $page) ? ' active' : '' ?>" aria-current="page" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('Bars' == $page) ? ' active' : '' ?>" href="categoryPage.php?name=Bars">Bars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('Restaurants' == $page) ? ' active' : '' ?>" href="categoryPage.php?name=Restaurants">Restaurants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('Boulangeries' == $page) ? ' active' : '' ?>" href="categoryPage.php?name=Boulangeries">Boulangeries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text <?= ('Parcs' == $page) ? ' active' : '' ?>" href="categoryPage.php?name=Parcs">Parcs</a>
                </li>
                <!-- Special condition to verify user or admin connexion -->
                <li class="nav-item">
                    <?php if (isset($_SESSION['id']) && $_SESSION['id'] !== null) : ?>
                        <a class="nav-link navbar-text Connexion" href="deconnexion.php" role="button">Se déconnecter</a>
                    <?php else : ?>
                        <a class="nav-link navbar-text Connexion" data-bs-toggle="modal" href="#modalConnexion" role="button">Se connecter</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
include 'connexion.php';
?>