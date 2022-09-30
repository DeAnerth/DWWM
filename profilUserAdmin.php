<?php
$page = 'profilUserAdmin.php';
require_once 'controllers/profilAdminCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';
?>
<main class="mx-5 mt-5 px-2 bg-light">
    <h1 id="profilUserTitle" class="d-flex justify-content-center mt-5 mb-5">VOTRE COMPTE</h1>
    <p class="d-flex justify-content-center">Vous êtes connecté sur votre compte Admin</p>
    <!-- List of All users -->
    <div class="text-center mb-4">
        <?php
        if (isset($usersListWithLimitAndOffsetForPagination)) { ?>
            <h2 id="pageUsersList" class="d-flex justify-content-center mt-5 mb-5">LISTE DES UTILISATEURS INSCRITS</h2>
            <section aria-label="Liste de tous les utilisateurs du site">
                <ul class="list-group list-group-horizontal-md mb-3">
                    <li class="list-group-item text-start col-md-4">Pseudo</li>
                    <li class="list-group-item text-start col-md-4">Email</li>
                    <li class="list-group-item text-start col-md-2">Date de création </li>
                    <li class="list-group-item text-center col-md-2">Compte de l'utilisateur</li>
                </ul>
                <!-- Special function object request for Pagination list      -->
                <?php foreach ($usersListWithLimitAndOffsetForPagination as $showUser) { ?>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item text-start col-md-4"><?= $showUser->username ?></li>
                        <li class="list-group-item text-start col-md-4"><?= $showUser->email ?></li>
                        <li class="list-group-item text-start col-md-2"><?= $showUser->dateCreateUser ?></li>
                        <li class="list-group-item text-center col-md-2"><a href="profilUser.php?id=<?= $showUser->id ?>" class="btn btn-bkgd-black text-white-yellow-btn col-sm-12" aria-label="Lien vers la page du compte de l'utilisateur">Visiter</a></li>
                    </ul>
            <?php }
            } ?>
            <!-- Pagination -->
            <nav aria-label="Page navigation de la liste des utilisateurs">
                <ul class="pagination">
                    <li class="page-item <?= ($currentPageUsers == 1) ? "disabled" : "" ?>"><a class="page-link btn-bkgd-black" href="profilUserAdmin.php?pageUsers=<?= $currentPageUsers - 1 ?>">Previous</a></li>
                    <?php for ($i = 1; $i <= $nbPageUsers; $i++) { ?>
                        <li class="page-item <?= ($currentPageUsers == $i) ? "active" : "" ?>"><a class="page-link btn-bkgd-black" href="profilUserAdmin.php?pageUsers=<?= $i ?>"><?= $i ?></a></li>
                    <?php } ?>
                    <li class="page-item <?= ($currentPageUsers == $nbPageUsers) ? "disabled" : "" ?>"><a class="page-link btn-bkgd-black" href="profilUserAdmin.php?pageUsers=<?= $currentPageUsers + 1 ?>">Next</a></li>
                </ul>
            </nav>
            </section>
    </div>
    <!-- List of All articles -->
    <div>
        <?php
        if (isset($articlesListWithLimitAndOffsetForPagination)) { ?>
            <h2 class="d-flex justify-content-center mt-5 mb-5">LISTE DES ARTICLES</h2>
            <section aria-label="Liste de tous les articles du site">
                <ul class="list-group list-group-horizontal-md mb-3">
                    <li class="list-group-item text-start col-md-4">Titre</li>
                    <li class="list-group-item text-start col-md-4">Date de création</li>
                    <li class="list-group-item text-start col-md-2">Auteur</li>
                    <li class="list-group-item text-center col-md-2">Article</li>
                </ul>
                <!-- Special function object request for Pagination list -->
                <?php foreach ($articlesListWithLimitAndOffsetForPagination as $showArticle) { ?>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item text-start col-md-4"><?= $showArticle->title ?></li>
                        <li class="list-group-item text-start col-md-4"><?= $showArticle->dateCreateArticle ?></li>
                        <li class="list-group-item text-start col-md-2"><?= $showArticle->idAuthor ?></li>
                        <li class="list-group-item text-center col-md-2"><a href="articlePage.php?idArticle=<?= $showArticle->id ?>" class="btn btn-bkgd-black text-white-yellow-btn col-sm-12" aria-label="Lien vers la page de l'article">Visiter</a></li>
                    </ul>
            <?php }
            } ?>
            <!-- Pagination -->
            <nav aria-label="Page navigation de la liste des articles">
                <ul class="pagination">
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>"><a class="page-link" href="profilUserAdmin.php?page=<?= $currentPage - 1 ?>">Previous</a></li>
                    <?php for ($y = 1; $y <= $nbPage; $y++) { ?>
                        <li class="page-item <?= ($currentPage == $y) ? "active" : "" ?>"><a class="page-link" href="profilUserAdmin.php?page=<?= $y ?>"><?= $y ?></a></li>
                    <?php } ?>
                    <li class="page-item <?= ($currentPage == $nbPage) ? "disabled" : "" ?>"><a class="page-link" href="profilUserAdmin.php?page=<?= $currentPage + 1 ?>">Next</a></li>
                </ul>
            </nav>
            </section>
    </div>
    <!-- List of All articles -->
    <div>
        <?php
        if (isset($commentsListWithLimitAndOffsetForPagination)) { ?>
            <h2 class="d-flex justify-content-center mt-5 mb-5">LISTE DES COMMENTAIRES</h2>
            <section aria-label="Liste de tous les articles du site">
                <ul class="list-group list-group-horizontal-md mb-3">
                    <li class="list-group-item text-start col-md-5">Description</li>
                    <li class="list-group-item text-start col-md-3">Date de création</li>
                    <li class="list-group-item text-start col-md-2">Auteur</li>
                    <li class="list-group-item text-center col-md-2">Commentaire</li>
                </ul>
                <!-- Special function object request for Pagination list -->
                <?php foreach ($commentsListWithLimitAndOffsetForPagination as $showComment) { ?>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item text-start col-md-5"><?= $showComment->text1 ?></li>
                        <li class="list-group-item text-start col-md-3"><?= $showComment->dateCreateComment ?></li>
                        <li class="list-group-item text-start col-md-2"><?= $showComment->idAuthor ?></li>
                        <li class="list-group-item text-center col-md-2"><a href="articlePage.php?idArticle=<?= $showComment->id ?>" class="btn btn-bkgd-black text-white-yellow-btn col-sm-12" aria-label="Lien vers la page de l'article">Visiter</a></li>
                    </ul>
            <?php }
            } ?>
            <!-- Pagination -->
            <nav aria-label="Page navigation de la liste des articles">
                <ul class="pagination">
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>"><a class="page-link" href="profilUserAdmin.php?page=<?= $currentPage - 1 ?>">Previous</a></li>
                    <?php for ($y = 1; $y <= $nbPage; $y++) { ?>
                        <li class="page-item <?= ($currentPage == $y) ? "active" : "" ?>"><a class="page-link" href="profilUserAdmin.php?page=<?= $y ?>"><?= $y ?></a></li>
                    <?php } ?>
                    <li class="page-item <?= ($currentPage == $nbPage) ? "disabled" : "" ?>"><a class="page-link" href="profilUserAdmin.php?page=<?= $currentPage + 1 ?>">Next</a></li>
                </ul>
            </nav>
            </section>
    </div>
    <div class="text-center mb-4 mt-5">
        <a href=javascript:history.go(-1) class="btn btn-back btn-bkgd-black text-white-yellow-btn col-sm-2 d-flex justify-content-start" aria-label="Lien vers la page précédente">Retour</a>
    </div>
</main>


<?php include 'includes/footer.php' ?>