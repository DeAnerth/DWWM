<?php
$page = 'createArticle.php';
require_once 'controllers/createArticleCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';
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
<h1 id="formRegistrationTitleUsers" class="d-flex justify-content-center mt-5">CREER VOTRE ARTICLE</h1>
<form id="createArticle" class="m-5" method="POST" action="" enctype="multipart/form-data" aria-roledescription="formulaire creation article" aria-label="formulaire de création d'un article">
    <fieldset class="row mb-5">
        <legend class="mb-5">Article</legend>
        <div class="form-label row mb-5">
            <label for="category" class="form-label col-sm-3">Séléctionner une categorie</label>
            <div class="col-sm-9">
                <select class="form-control" name="category" required>
                    <option disabled selected>Selectionnez</option>
                    <?php foreach ($readCategoryList as $category) { ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?= $errorCategory ?></span>
            </div>
        </div>

        <div class="form-label row mb-5">
            <label id="usernameLabel" for="title" class="form-label col-sm-3">Titre</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="title" id="title" value="<?= $title ?>" aria-label="Titre de l'article" aria-describedby="usernameLabel" value="">
                <span class="text-danger"><?= $errorTitle ?></span>
            </div>
        </div>
        <div class="form-label row mb-5">
            <label id="photo1Label" for="photo1" class="form-label col-sm-3">Photo1</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="photo1" id="photo1"  aria-label="première photo à téléverser" aria-describedby="photo1Label">
                <span class="text-danger"><?= $errorPhoto1 ?></span>
            </div>
        </div>
        <div class="form-label row mb-5">
            <label id="text1Label" for="text1" class="form-label col-sm-3">Descriptif 1</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="text1" id="text1" aria-label="première description à téléverser" aria-describedby="text1Label" rows="5"><?= $text1 ?></textarea>
                <span class="text-danger"><?= $errorText1 ?></span>
            </div>
        </div>
        <div class="form-label row mb-5">
            <label id="photo2Label" for="photo2" class="form-label col-sm-3">Photo2</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="photo2" id="photo2" aria-label="deuxième photo facultative à téléverser" aria-describedby="photo2Label">
                <span class="text-success"><?= $exceptionPhoto2 ?></span>
            </div>
        </div>
        <div class="form-label row mb-5">
            <label id="text2Label" for="text2" class="form-label col-sm-3">Descriptif 2</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="text2" id="text2"  aria-label="deuxième description facultative à téléverser" aria-describedby="text2Label" rows="5"><?= $text2 ?></textarea>
                <span class="text-success"><?= $exceptionText2 ?></span>
            </div>
        </div>
        <div class="form-label row mb-5">
            <label id="phoneLabel" for="phone" class="form-label col-sm-3">Téléphone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone ?>" aria-label="Numéro de téléphone" aria-describedby="phoneLabel">
                <span class="text-success"><?= $exceptionPhone ?></span>
            </div>
        </div>
        <div class="form-label row mb-5">
            <label id="websiteLabel" for="website" class="form-label col-sm-3">Site internet</label>
            <div class="col-sm-9">
                <input type="url" class="form-control" name="website" id="website" value="<?= $website ?>" aria-label="Site internet" aria-describedby="websiteLabel">
                <span class="text-success"><?= $exceptionWebsite ?></span>
            </div>
        </div>
    </fieldset>
    <article class="row mb-5">
        <div class="vstack align-items-center col-md-5 mx-auto mb-5">
            <button type="submit" class="btn btn-bkgd-black text-white-yellow-btn btn-back col-md-5 mb-4" name="articleSubmit" aria-label="bouton pour soumettre la proposition d'article">Soumettre</button>
        </div>
    </article>
</form>
<!-- </div> -->
<div class="text-center mb-4 mt-5">
    <a href=javascript:history.go(-1) class="btn btn-back col-sm-2 categoryBtnRetour" aria-label="Lien vers la page précédente">Retour</a>
</div>
<?php include 'includes/footer.php' ?>