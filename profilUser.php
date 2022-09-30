<?php
$page = 'profilUser.php';
require_once 'controllers/profilUserCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';
?>
<div class="mx-5 mt-5 px-2 py-3 bg-light">
    <h1 id="profilUserTitle" class="d-flex justify-content-center mt-5 mb-3">VOTRE COMPTE</h1>
    <p class="d-flex justify-content-center">Bonjour <?= $_SESSION['username']; ?>. Vous êtes connecté sur votre compte
    <p>
        <!-- Section of profilUser informations by registration without secure password     -->
    <section aria-label="Informations sur le compte">
        <div class="d-flex justify-content-center">
            <div class="card align-items-center mb-5 mt-5 w-100 p-3">
                <img src="./assets/images/patient.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center w-100 p-3">
                    <h5 class="card-title">Informations</h5>
                </div>
                <div class="w-75 mb-4">
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item col-md-5">Pseudo</li>
                        <li class="list-group-item col-md-7"><?= $readUser->username ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item col-md-5">Email</li>
                        <li class="list-group-item col-md-7"><?= $readUser->email ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Section to update profilUser's informations by registration without secure password     -->
    <section aria-label="Modifier les informations du compte">
        <div class="card-body col align-self-center mt-4 w-100">
            <div class="text-center mb-4">
                <a href="profilUser.php?id=<?= $readUser->id ?>&value=updateUser" id="updateProfilUserBtn" class="card-link btn btn-bkgd-black text-white-yellow-btn col-sm-7" name="updateBtn">Modifier informations</a>
            </div>
                <div id="updateProfilUserToggle" class="updateProfilUserClick">
                <form id="updateUser" class="m-5" method="POST" action="">
                    <ul class="list-group list-group-flush border-0 w-100 p-3">
                        <ul class="list-group list-group-horizontal-md">
                            <label for="updateUsername" class="form-label col-sm-5">Nouveau Pseudo</label>
                            <input type="text" class="form-control" name="updateUsername" id="updateUsername" value="<?= isset($_POST['dataUpdateUser']) ? $_POST['updateUsername'] : $readUser->username ?>"></li>
                            <span class="text-danger"><?= isset($errors['updateUsername']) ? $errors['updateUsername'] : '' ?></span>
                        </ul>
                        <ul class="list-group list-group-horizontal-md">
                            <label for="updateEmail" class="form-label col-sm-5">Nouveau email</label>
                            <input type="text" class="form-control" name="updateEmail" id="updateEmail" value="<?= isset($_POST['dataUpdateUser']) ? $_POST['updateEmail'] : $readUser->email ?>"></li>
                            <span class="text-danger"><?= isset($errors['updateEmail']) ? $errors['updateEmail'] : '' ?></span>
                        </ul>
                    </ul>
                    <div class="vstack align-items-center mx-auto mt-4 mb-5">
                        <button type="submit" class="btn btn-bkgd-black text-white-yellow-btn col-sm-8 mb-4" name="dataUpdateUser">Modifier</button>
                    </div>
                </form>
                </div>
            <div class="text-center mb-4" aria-roledescription="suppression compte" aria-label="bouton pour supprimer le compte">
                <a href="profilUser.php?idDelete=<?= $readUser->id ?>" class="card-link btn btn-bkgd-black text-white-yellow-btn col-sm-7 col align-self-center" name="deleteBtn" aria-label="lien vers page de suppression du compte">Supprimer le Compte définitivement</a>
            </div>
            <div class="text-center mb-4" aria-roledescription="redaction article">
                <a href="createArticle.php?idAuthor=<?= $readUser->id ?>" class="card-link btn btn-bkgd-black text-white-yellow-btn col-sm-7 col align-self-center" name="createArticleBtn" aria-label="lien vers page de création d'un article">Proposer un article</a>
            </div>
        </div>
    </section>
    <!-- Section to list all articles of profilUser -->
    <section aria-label="Liste des articles de l'utilisateur">
        <div class="text-center mb-4">
            <h2>LISTE DES ARTICLES PUBLIES</h2>
                <?php foreach ($readArticlesByUser as $articleByUser) { ?>
                        <ul class="list-group list-group-horizontal-md">
                            <li class="list-group-item col-md-4 justify-content-center"><?= $articleByUser->title ?></li>
                            <li class="list-group-item col-md-4 justify-content-center"><?= $articleByUser->dateCreateArticle ?></li>
                            <li class="list-group-item col-md-4 justify-content-center"><a href="articlePage.php?idArticle=<?= $articleByUser->id ?>" class="btn btn-bkgd-black text-white-yellow-btn col-sm-12">Visiter</a></li>
                        </ul>
                <?php }; ?>
        </div>
    </section>
    <!-- Section to list all articles of profilUser -->
    <section aria-label="Liste des commentaires de l'utilisateur">
        <?php if (isset($_GET['value'])) { ?>
            <div class="text-center mb-4">
                <h2>LISTE DES COMMENTAIRES PUBLIES</h2>
                <?php foreach ($readCommentByUser as $commentByUser) { ?>
                    <ul clas="list-group list-group-flush border-0 w-100 p-3">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item col-sm-12"><?= $commentByUser->title ?></li>
                        </ul>
                    </ul>
                <?php }; ?>
            </div>
        <?php } ?>
    </section>
    <div class="text-center mb-4 mt-5">
        <a href=javascript:history.go(-1) class="btn btn-back btn-bkgd-black text-white-yellow-btn col-sm-2 d-flex justify-content-start" aria-label="Lien vers la page précédente">Retour</a>
    </div>
</div>
<script src="assets/js/profilUser.js"></script>

<?php include 'includes/footer.php' ?>