<?php
$page = 'createComment.php';
require_once 'controllers/createArticleCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php' 
?>
<!-- <main class="container mt-3">
    <?php if (!empty($errors)) {
        foreach ($errors as $error) { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php }
        var_dump($_POST);
    } else if ($success) { ?>
        <div class="alert alert-success">OK</div>
    <?php }
    ?>
    <div class="mx-5 mt-5 px-3 bg-light"> -->
<form id="createComment" class="m-5" method="POST" action="">
    <fieldset class="row mb-5">
        <legend class="mb-5">Laisser un commentaire</legend>
        <div class="form-label row mb-5">
            <label id="commentLabel" for="text1" class="form-label col-sm-3"></label>
            <div class="col-sm-9">
                <textarea class="form-control" name="text1" id="comment" aria-label="Commentaire de l'article" aria-describedby="comment-label" value=""></textarea>
                <span class="text-danger"><?= $errorText1 ?></span>
            </div>
        </div>
    </fieldset>
    <div class="vstack align-items-center col-md-5 mx-auto mb-5">
        <button type="submit" class="btn btn-primary col-md-5 mb-4" name="commentSubmit">Soumettre</button>
    </div>
    </article>

</form>


<?php include 'includes/footer.php' ?>