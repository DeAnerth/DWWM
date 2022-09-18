<?php
require_once 'controllers/profilAdminCtrl.php';
?>
<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
<div class="mx-5 mt-5 px-2 bg-light">
    <h1 id="profilUserTitle" class="d-flex justify-content-center mt-5">VOTRE COMPTE</h1>
        Vous êtes connecté sur votre compte Admin
    <p>
            <div class="text-center mb-4">
                <h5>LISTE DES UTILISATEURS INSCRITS</h5>
                <?php
    if (isset($usersListWithLimitAndOffsetForPagination)) { ?>
        <h1 id="pageUsersList" class="d-flex justify-content-center mt-5 mb-5">LISTE DES UTILISATEURS INSCRITS</h1>
        <section>
            <ul class="list-group list-group-horizontal mb-3">
                <li class="list-group-item col-sm-4">Pseudo</li>
                <li class="list-group-item col-sm-4">Email</li>
                <li class="list-group-item col-sm-2">Date de création </li>
                <li class="list-group-item col-sm-2">Compte de l'utilisateur</li>
            </ul>
            <?php foreach ($usersListWithLimitAndOffsetForPagination as $showUser) { ?>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col-sm-4"><?= $showUser->username ?></li>
                    <li class="list-group-item col-sm-4"><?= $showUser->email ?></li>
                    <li class="list-group-item col-sm-2"><?= $showUser->dateCreateUser ?></li>
                    <li class="list-group-item col-sm-2">Identifiant: <a href="profilUser.php?id=<?= $showUser->id ?>"><?= $showUser->id ?></a></li>
                </ul>
        <?php }
        } ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= ($currentPageUsers == 1) ? "disabled" : "" ?>"><a class="page-link" href="profilUserAdmin.php?pageUsers=<?= $currentPageUsers - 1 ?>">Previous</a></li>
                <?php for($i = 1; $i <= $nbPageUsers; $i++) { ?>
                <li class="page-item <?= ($currentPageUsers == $i) ? "active" : "" ?>"><a class="page-link" href="profilUserAdmin.php?pageUsers=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
                <li class="page-item <?= ($currentPageUsers == $nbPageUsers) ? "disabled" : "" ?>"><a class="page-link" href="profilUserAdmin.php?pageUsers=<?= $currentPageUsers + 1 ?>">Next</a></li>
            </ul>
        </nav>
        </section>
        <div class="text-center mb-4 mt-5">
            <a href="./index.php" class="col align-self-center"><button class="btn btn-primary col-sm-7">Retour Index</button></a>
        </div>
        <?php
    if (isset($articlesListWithLimitAndOffsetForPagination)) { ?>
        <h1 id="pageArticlesList" class="d-flex justify-content-center mt-5 mb-5">LISTE DES ARTICLES</h1>
        <section>
            <ul class="list-group list-group-horizontal mb-3">
                <li class="list-group-item col-sm-4">Titre</li>
                <li class="list-group-item col-sm-4">Date de création</li>
                <li class="list-group-item col-sm-2">Auteur</li>
                <li class="list-group-item col-sm-2">Article</li>
            </ul>
            <?php foreach ($articlesListWithLimitAndOffsetForPagination as $showArticle) { ?>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col-sm-4"><?= $showArticle->title ?></li>
                    <li class="list-group-item col-sm-4"><?= $showArticle->dateCreateArticle ?></li>
                    <li class="list-group-item col-sm-2"><?= $showArticle->idAuthor ?></li>
                    <li class="list-group-item col-sm-2">Identifiant: <a href="profilUserAdminInfo.php?id==<?= $showArticle->id ?>"><?= $showArticle->id ?></a></li>
                </ul>
        <?php }
        } ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>"><a class="page-link" href="profilUserAdmin.php?page=<?= $currentPage - 1 ?>">Previous</a></li>
                <?php for($y = 1; $y <= $nbPage; $y++) { ?>
                <li class="page-item <?= ($currentPage == $y) ? "active" : "" ?>"><a class="page-link" href="profilUserAdmin.php?page=<?= $y ?>"><?= $y ?></a></li>
                <?php } ?>
                <li class="page-item <?= ($currentPage == $nbPage) ? "disabled" : "" ?>"><a class="page-link" href="profilUserAdmin.php?page=<?= $currentPage + 1 ?>">Next</a></li>
            </ul>
        </nav>
        </section>
        <div class="text-center mb-4 mt-5">
            <a href="./index.php" class="col align-self-center"><button class="btn btn-primary col-sm-7">Retour Index</button></a>
        </div>
                <?php foreach ($readAllUsers as $user) { ?>
                    <ul clas="list-group list-group-flush border-0 w-100 p-3">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item col-sm-12"><?= $user->username ?></li>
                        </ul>
                    </ul>
                <?php }; ?>
            </div>
            <div class="card-body col align-self-center mt-5 w-100">
                <div class="text-center mb-4">
                    <!-- <a href="profilUser.php?id=<?= $commentByUser->id ?>&value=commentListbyUser" class="card-link btn btn-info col-sm-7" name="updateBtn">LISTE DE VOS COMMENTAIRES</a> -->
                </div>
                <?php if (isset($_GET['value'])) { ?>
            <div class="text-center mb-4">
                <h5>LISTE DES COMMENTAIRES PUBLIES</h5>
                <?php foreach ($readCommentByUser as $commentByUser) { ?>
                    <ul clas="list-group list-group-flush border-0 w-100 p-3">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item col-sm-12"><?= $commentByUser->title ?></li>
                        </ul>
                    </ul>
                <?php }; ?>
            </div>
            <?php } ?>




<?php include 'includes/footer.php' ?>

