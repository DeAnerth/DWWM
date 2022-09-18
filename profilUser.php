<?php
require_once 'controllers/profilUserCtrl.php';
?>
<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
<div class="mx-5 mt-5 px-2 bg-light">
    <h1 id="profilUserTitle" class="d-flex justify-content-center mt-5">VOTRE COMPTE</h1>
    <p>Bonjour <?= $_SESSION['id']; ?>
        Vous êtes connecté sur votre compte
        <?php var_dump($_SESSION['id']) ?>
    <p>
    <section>
        <div class="d-flex justify-content-center">
            <div class="card align-items-center mb-5 mt-5 w-100 p-3">
                <img src="./assets/images/patient.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center w-100 p-3">
                    <h5 class="card-title" name="id">Informations</h5>
                </div>
                <ul class="list-group list-group-flush border-0 w-100 p-3">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item col-sm-5">Pseudo</li>
                        <li class="list-group-item col-sm-7"><?= $readUser->username ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item col-sm-5">Email</li>
                        <li class="list-group-item col-sm-7"><?= $readUser->email ?></li>
                    </ul>
                </ul>
            </div>
        </div>
    </section>
    <section>
            <div class="card-body col align-self-center mt-5 w-100">
                <div class="text-center mb-4">
                    <a href="profilUser.php?id=<?= $readUser->id ?>&value=updateUser" class="card-link btn btn-info col-sm-7" name="updateBtn">Modifier informations</a>
                </div>

                <?php if (isset($_GET['value'])) { ?>
                    <form id="updateUser" class="m-5" method="POST" action="">
                        <ul class="list-group list-group-flush border-0 w-100 p-3">
                            <ul class="list-group list-group-horizontal">
                                <label for="updateUsername" class="form-label col-sm-5">Nouveau Pseudo</label>
                                <input type="text" class="form-control" name="updateUsername" id="updateUsername" value="<?= isset($_POST['dataUpdateUser']) ? $_POST['updateUsername'] : $readUser->username ?>"></li>
                                <span class="text-danger"><?= isset($errors['updateUsername']) ? $errors['updateUsername'] : '' ?></span>
                            </ul>
                            <ul class="list-group list-group-horizontal">
                                <label for="updateEmail" class="form-label col-sm-5">Nouveau email</label>
                                <input type="text" class="form-control" name="updateEmail" id="updateEmail" value="<?= isset($_POST['dataUpdateUser']) ? $_POST['updateEmail'] : $readUser->email ?>"></li>
                                <span class="text-danger"><?= isset($errors['updateEmail']) ? $errors['updateEmail'] : '' ?></span>
                            </ul>
                        </ul>
                        <div class="vstack align-items-center mx-auto mt-4 mb-5">
                            <button type="submit" class="btn btn-info col-sm-8 mb-4" name="dataUpdateUser">Modifier</button>
                        </div>
                    </form>
                <?php } ?>
                <div class="text-center mb-4">
                    <a href="profilUser.php?idDelete=<?= $readUser->id ?>" type="button " class="card-link btn btn-info col-sm-7 col align-self-center" name="deleteBtn">Supprimer le Compte définitivement</a>
                </div>
                <div class="text-center mb-4">
                    <a href="createArticle.php?idAuthor=<?= $readUser->id ?>" type="button " class="card-link btn btn-info col-sm-7 col align-self-center" name="createArticleBtn">Proposer un article</a>
                </div>
            </div>
            <div class="card-body col align-self-center mt-5 w-100">
                <div class="text-center mb-4">
                    <!-- <a href="profilUser.php?id=<?= $articleByUser->id ?>&value=articleListbyUser" class="card-link btn btn-info col-sm-7" name="updateBtn">LISTE DE VOS ARTICLES</a> -->
                </div>
            <div class="text-center mb-4">
                <h5>LISTE DES ARTICLES PUBLIES</h5>
                <?php foreach ($readArticleByUser as $articleByUser) { ?>
                    <ul clas="list-group list-group-flush border-0 w-100 p-3">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item col-sm-12"><?= $articleByUser->title ?></li>
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

