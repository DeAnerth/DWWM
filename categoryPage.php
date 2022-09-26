<?php
require_once 'controllers/categoryPageCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';


?>
<section>
    <?php foreach ($readArticleByNameCategory as $keyarticle => $article) { ?>
        <article>
            <a href="articlePage.php?idArticle=<?= $article->articleId ?>" class="figureMainCategoryArticlesLink">
                <figure class="figureMainCategoryArticles">
                    <h2 class="titleMiddleCategoryArticles"><?= $article->title ?></h2>
                    <img class="imgMainCategoryArticles" src="assets/img/<?php echo $article->photo1 ?>">
                    <figcaption class="figcaptionMainCategoryArticles">
                        <p><?= substr($article->text1, 0, 30) ?></p>
                    </figcaption>
                    <button class="figcaptionBtnCategoryArticles">Cliquez</button>
                </figure>
            </a>
        </article>
    <?php } ?>
</section>
<div class="text-center mb-4 mt-5 ">
    <a href=javascript:history.go(-1) class="col d-flex justify-content-end"><button class="btn btn-bkgd-black text-white-yellow-btn btn-back col-sm-2">Retour</button></a>
</div>


<?php include 'includes/footer.php' ?>