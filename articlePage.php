<?php
$page = 'articlePage.php';
require_once 'controllers/articlePageCtrl.php';
require_once 'controllers/createCommentCtrl.php';
require_once 'controllers/updateArticleCtrl.php';
require_once 'controllers/deleteArticleCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';

?>
<section class="mt-5 mb-5">
    <article>
        <h2><?= $readArticle->title ?></h2>
        <img src="assets/img/<?php echo $readArticle->photo1 ?>" alt="photo de <?= $readArticle->title ?>">
        <p><?= $readArticle->text1 ?></p>
        <img src="assets/img/<?php echo $readArticle->photo2 ?>" alt="deuxième photo de <?= $readArticle->title ?>">
        <p><?= $readArticle->text2 ?></p>
        <p>Date de création: <?= $readArticle->dateCreateArticle ?></p>
        <p>Auteur: <?= $readArticle->username ?></p>
    </article>
    <article>
        <?php if (!empty($errors)) {
            foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php }
            var_dump($_POST);
        } elseif ($success) { ?>
            <div class="alert alert-success">OK</div>
        <?php } ?>
        <div class="text-center mb-4">
            <a href="articlePage.php?idArticle=<?= $readArticle->id ?>&value=createComment" id="createCommentBtn" class="card-link btn btn-bkgd-black text-white-yellow-btn col-sm-7" name="createComment">Laisser un commentaire</a>
                <div id="createCommentToggle" class="createCommentClick">
                <form id="createComment" class="m-5" method="POST" action="">
                    <fieldset class="row d-flex justify-content-center mb-5">
                        <div class="form-label d-flex justify-content-center row mb-5">
                            <label id="commentLabel" for="text1" class="form-label col-md-0"></label>
                            <div class="col-md-10 ">
                                <textarea class="form-control" name="text1" id="comment" aria-label="Commentaire de l'article" aria-describedby="comment-label" value=""></textarea>
                                <span class="text-danger"><?= $errorText1 ?></span>
                            </div>
                    </fieldset>
                    <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                        <button type="submit" class="btn btn-bkgd-black text-white-yellow-btn col-md-5 mb-4" name="createCommentSubmit">Soumettre</button>
                    </div>
                </form> 
                </div>
            </div>
    </article>
    <article>
        <div class="text-center mb-4">
            <h3>COMMENTAIRES</h3>
            <?php foreach ($readCommentByArticle as $commentByArticle) { ?>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col-md-4"><?= $commentByArticle->text1 ?></li>
                    <li class="list-group-item col-md-4"><?= $commentByArticle->dateCreateComment ?></li>
                    <li class="list-group-item col-md-4"><?= $commentByArticle->idAuthor ?></li>
                </ul>
                </ul>
            <?php } ?>
        </div>
    </article>
    <article>
        <div class="text-center mb-4">
            <a href="articlePage.php?idUpdateArticle=<?= $readArticle->id ?>&value=updateArticle" id="updateArticleBtn" class="card-link btn btn-bkgd-black text-white-yellow-btn col-sm-7" name="updateArticle">Modifier l'article</a>
                <div id="updateArticleToggle" class="<?= isset($_GET['value'])? '': 'updateArticleClick' ?>">
                <form id="idUpdateArticle" class="m-5" method="POST" action="" enctype="multipart/form-data">
                    <fieldset class="row mb-5">
                        <legend class="mb-5">Article</legend>
                        <div class="form-label row mb-5">
                            <label id="usernameLabel" for="updateTitle" class="form-label col-sm-3">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="updateTitle" id="updateTitle" value="<?= $updateTitle ?>" aria-label="Titre de l'article" aria-describedby="article-title-label">
                                <span class="text-danger"><?= $errorUpdateTitle ?></span>
                            </div>
                        </div>
                        <div class="form-label row mb-5">
                            <label id="updatePhoto1Label" for="updatePhoto1" class="form-label col-sm-3">Photo1</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="updatePhoto1" id="updatePhoto1" value="<?= $photo1 ?>" aria-label="première photo à téléverser" aria-describedby="updatePhoto1Label">
                                <span class="text-danger"><?= $errorPhoto1 ?></span>
                            </div>
                        </div>
                        <div class="form-label row mb-5">
                            <label id="updateText1Label" for="updateText1" class="form-label col-sm-3">Descriptif 1</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="updateText1" id="updateText1" value="<?= $updateText1 ?>" aria-label="première description à téléverser" aria-describedby="updateText1Label" rows="5"></textarea>
                                <span class="text-danger"><?= $errorUpdateText1 ?></span>
                            </div>
                        </div>
                        <div class="form-label row mb-5">
                            <label id="updatePhoto2Label" for="updatePhoto2" class="form-label col-sm-3">Photo2</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="updatePhoto2" id="updatePhoto2" value="<?= $photo2 ?>" aria-label="deuxième photo facultative à téléverser" aria-describedby="updatePhoto2Label">
                                <span class="text-success"><?= $exceptionPhoto2 ?></span>
                            </div>
                        </div>
                        <div class="form-label row mb-5">
                            <label id="updateText2Label" for="updateText2" class="form-label col-sm-3">Descriptif 2</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="updateText2" id="updateText2" value="<?= $updateText2 ?>" aria-label="deuxième description facultative à téléverser" aria-describedby="updateText2Label" rows="5"></textarea>
                                <span class="text-success"><?= $exceptionUpdateText2 ?></span>
                            </div>
                        </div>
                        <div class="form-label row mb-5">
                            <label id="updatePhoneLabel" for="updatePhone" class="form-label col-sm-3">Téléphone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="updatePhone" id="updatePhone" value="<?= $updatePhone ?>" aria-label="Numéro de téléphone" aria-describedby="updatePhoneLabel">
                                <span class="text-success"><?= $exceptionUpdatePhone ?></span>
                            </div>
                        </div>
                        <div class="form-label row mb-5">
                            <label id="websiteLabel" for="updateWebsite" class="form-label col-sm-3">Site internet</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="updateWebsite" id="updateWebsite" value="<?= $updateWebsite ?>" aria-label="Site internet" aria-describedby="website-label">
                                <span class="text-success"><?= $exceptionUpdateWebsite ?></span>
                            </div>
                        </div>
                    </fieldset>
                    <article class="row mb-5">
                        <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                            <button type="submit" class="btn btn-bkgd-black text-white-yellow-btn btn-back col-md-5 mb-4" name="updateArticleSubmit" aria-label="bouton pour soumettre la proposition d'article">Soumettre</button>
                        </div>
                    </article>
                </form>
                </div>
        </div>
    </article>
    <article>
        <div class="text-center mb-4" aria-roledescription="suppression article" aria-label="bouton pour supprimer l'article">
            <a href="articlePage.php?idArticleDelete=<?= $readArticle->id ?>" class="card-link btn btn-bkgd-black text-white-yellow-btn col-sm-7 col align-self-center" name="deleteArticle" aria-label="lien pour suppresion de l'article compte">Supprimer l'article et ses commentaires définitivement</a>
        </div>
    </article>

    <div class="text-center mb-4 mt-5">
        <a href=javascript:history.go(-1) class="btn btn-back btn-bkgd-black text-white-yellow-btn col-sm-2 d-flex justify-content-start" aria-label="Lien vers la page précédente">Retour</a>
    </div>

</section>
<script src="assets/js/articlePage.js"></script>


<?php include 'includes/footer.php' ?>