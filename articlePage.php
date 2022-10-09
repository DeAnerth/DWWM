<?php
$page = 'articlePage.php';
require_once 'controllers/articlePageCtrl.php';
require_once 'controllers/createCommentCtrl.php';
require_once 'controllers/updateArticleCtrl.php';
require_once 'controllers/deleteArticleCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';

?>
<main id="mainArticlePage">
    <section class="mt-5 mb-5">
        <article>
            <div class="titleArticlePage">
                <h2><?= $readArticle->title ?></h2>
            </div>
            <picture class="imgArticlePageContainer">
                <img src="assets/img/<?php echo $readArticle->photo1 ?>" class="imgArticlePage" alt="photo de <?= $readArticle->title ?>">
            </picture>
            <div class="texArticlePageContainer">
                <p><?= $readArticle->text1 ?></p>
            </div>
            <?php if (isset($readArticle->photo2)) { ?>
                <picture class="imgArticlePageContainer">
                    <img src="assets/img/<?php echo $readArticle->photo2 ?>" class="imgArticlePage" alt="deuxième photo de <?= $readArticle->title ?>">
                </picture>
            <?php } ?>
            <div class="texArticlePageContainer">
                <p><?= $readArticle->text2 ?></p>
            </div>
            <div class="texArticlePageContainer">
                <p>Date de création: <time><?= $readArticle->dateCreateArticle ?></time></p>
            </div>
            <div class="texArticlePageContainer">
                <p>Auteur: <?= $readArticle->username ?></p>
            </div>
            <div class="btnArticlePageContainer">
                <div class="phoneArticlePageContainer mb-3 mt-5">
                    <a href="tel:<?= isset($readArticle->phone) ? $readArticle->phone : '' ?>" class="btn btn-bkgd-black text-white-yellow-btn col-md-12">Téléphonez <?= $readArticle->phone ?></a>
                </div>
                <div class="websiteArticlePageContainer mb-3 mt-3">
                    <a href="<?= isset($readArticle->website) ? $readArticle->website : '' ?>" target="_blanck" class="btn btn-bkgd-black text-white-yellow-btn col-md-12">Site internet</a>
                </div>
                <?php if (isset($userSession)) { ?>
                <div class="mb-3 mt-3">
                    <a href="articlePage.php?idArticle=<?= $readArticle->id ?>&value=createComment" id="createCommentBtn" class="card-link btn btn-bkgd-black text-white-yellow-btn col-md-12" name="createComment">Laisser un commentaire</a>
                </div>
                <?php } ?>
            </div>
        </article>
        <article>
            <div class="text-center mb-4">
                <div id="createCommentToggle" class="createCommentClick">
                    <form id="createComment" class="m-5" method="POST" action="">
                        <fieldset class="row d-flex justify-content-center mb-5">
                            <div class="form-label d-flex justify-content-center row mb-5">
                                <label id="commentLabel" for="text1" class="form-label col-md-0"></label>
                                <div class="col-md-10 ">
                                    <textarea class="form-control" name="comment1" id="comment" aria-label="Commentaire de l'article" aria-describedby="comment-label" value=""></textarea>
                                    <span class="text-danger"><?= $errorComment1 ?></span>
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
                <h3>Commentaires</h3>
                <?php foreach ($readCommentByArticle as $commentByArticle) { ?>
                    <ul class="articlePageCommentBlock">
                        <li class="articlePageCommentText"><?= $commentByArticle->text1 ?></li>
                        <li class="articlePageCommentDate"><?= $commentByArticle->dateCreateComment ?></li>
                    </ul>
                    </ul>
                <?php } ?>
            </div>
        </article>
        <?php if ((isset($userSession)) && ($userSession == $idAuthor)) { ?>
        <article>
            <div class="text-center mb-4">
                <div>
                    <a href="articlePage.php?idUpdateArticle=<?= $readArticle->id ?>&value=updateArticle" id="updateArticleBtn" class="card-link btn btn-bkgd-black text-white-yellow-btn col-sm-7" name="updateArticle">Modifier l'article</a>
                </div>
                <span class="text-danger"><?= $errorUpdateArticle ?></span>
                <div id="updateArticleToggle" class="<?= isset($_GET['value']) ? '' : 'updateArticleClick' ?>">
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
                                    <span class="text-danger"><?= $errorUpdatePhoto1 ?></span>
                                </div>
                            </div>
                            <div class="form-label row mb-5">
                                <label id="updateText1Label" for="updateText1" class="form-label col-sm-3">Descriptif 1</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="updateText1" id="updateText1" aria-label="première description à téléverser" aria-describedby="updateText1Label" rows="5"><?= $updateText1 ?></textarea>
                                    <span class="text-danger"><?= $errorUpdateText1 ?></span>
                                </div>
                            </div>
                            <div class="form-label row mb-5">
                                <label id="updatePhoto2Label" for="updatePhoto2" class="form-label col-sm-3">Photo2</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="updatePhoto2" id="updatePhoto2" value="<?= $photo2 ?>" aria-label="deuxième photo facultative à téléverser" aria-describedby="updatePhoto2Label">
                                    <span class="text-success"><?= $exceptionUpdatePhoto2 ?></span>
                                </div>
                            </div>
                            <div class="form-label row mb-5">
                                <label id="updateText2Label" for="updateText2" class="form-label col-sm-3">Descriptif 2</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="updateText2" id="updateText2" aria-label="deuxième description facultative à téléverser" aria-describedby="updateText2Label" rows="5"><?= $updateText2 ?></textarea>
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
            <div class="text-center">
                <span class="text-danger"><?= $errorDeleteArticle ?></span>
            </div>
        </article>
        <?php } ?>
    </section>
</main>
<div class="text-center mb-4 mt-5">
    <a href=javascript:history.go(-1) class="btn btn-back col-sm-2 categoryBtnRetour" aria-label="Lien vers la page précédente">Retour</a>
</div>

<script src="assets/js/articlePage.js"></script>


<?php include 'includes/footer.php' ?>