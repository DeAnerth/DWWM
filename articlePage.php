<?php
$page = 'articlePage.php';
require_once 'controllers/articlePageCtrl.php';
require_once 'controllers/createCommentCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';

?>
<div>
    <article>
    <h2><?= $readArticle->title ?></h2>
        <img src="assets/img/<?php echo $readArticle->photo1 ?>">
        <p><?= $readArticle->text1 ?></p>
        <img src="assets/img/<?php echo $readArticle->photo2 ?>">
        <p><?= $readArticle->text1 ?></p>
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
    <a href="articlePage.php?idArticle=<?= $readArticle->id ?>&value=createComment" class="card-link btn btn-info col-sm-7" name="createComment">Laisser un commentaire</a>
    </div>
    <div>
    <?php if (isset($_GET['value'])) { ?>
        <form id="createComment" class="m-5" method="POST" action="">
            <fieldset class="row mb-5">
            <legend class="mb-5">Laisser un commentaire</legend>
                <div class="form-label row mb-5">
                    <label id="commentLabel" for="text1" class="form-label col-sm-3"></label>
                    <div class="col-sm-9">
                    <textarea class="form-control" name="text1" id="comment" aria-label="Commentaire de l'article" aria-describedby="comment-label" value=""></textarea>
                    <span class="text-danger"><?= $errorText1 ?></span>
                </div>
            </fieldset>
            <div class="vstack align-items-center col-md-5 mx-auto mb-5">
            <button type="submit" class="btn btn-primary col-md-5 mb-4" name="createCommentSubmit">Soumettre</button>
            </div>
        </form> <?php } ?>
    </div>
    </article>
    <article>
        <div class="text-center mb-4">
            <h3>COMMENTAIRES</h3>
            <?php if (is_null($readCommentByArticle)) { ?>
                <p>pas de commentaires trouvés</p> 
               <?php } else { foreach ($readCommentByArticle as $commentByArticle) { ?>
                <ul clas="list-group list-group-flush border-0 w-100 p-3">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item col-sm-4"><?= $commentByArticle->text1 ?></li>
                        <li class="list-group-item col-sm-4"><?= $commentByArticle->dateCreateComment ?></li>
                        <li class="list-group-item col-sm-4"><?= $commentByArticle->idAuthor ?></li>
                    </ul>
                </ul>
                <?php }}; ?>
        </div>
</article>
<div class="text-center mb-4 mt-5">
    <a href=javascript:history.go(-1) class="col align-self-center"><button class="btn btn-primary col-sm-7">Retour</button></a>
</div>
</div>


<?php include 'includes/footer.php' ?>