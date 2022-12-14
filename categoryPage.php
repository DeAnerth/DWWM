<?php
require_once 'controllers/categoryPageCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';


?>
<main id="mainBody">
    <h1 id="h1">SORTIR A VERSAILLES</h1>
    <h2 class="titleMiddle">Sortir à Versailles, bars, restaurants, boulangeries.</h2>
    <section class="categorieArticle">
        <?php foreach ($readArticleByNameCategory as $keyarticle => $article) { 
            ?>
            <article class="categorieArticleContainer" aria-label="article sur <?= $article->title ?>">
                <a href="articlePage.php?idArticle=<?= $article->articleId ?>" class="figureMainCategoryArticlesLink" >
                    <figure class="figureMainCategoryArticles">
                        <header class="figureHeader">
                            <h2 class="titleMiddleCategoryArticles"><?= $article->title ?></h2>
                        </header>
                        <img class="imgMainCategoryArticles" src="assets/img/<?php echo $article->photo1 ?>" alt="Photo <?= $article->title ?> de la catégorie <?= $article->name?> ">
                        <figcaption class="figcaptionMainCategoryArticles">
                            <p><?= substr_replace($article->text1, '...', 80) ?></p>
                        </figcaption>
                        <div class="btn figcaptionBtn">Cliquez</div>
                    </figure>
                </a>
            </article>
        <?php } ?>
    </section>
    <div class="text-center mb-4 mt-5 ">
        <a href=javascript:history.go(-1) class="col d-flex justify-content-center"><button class="btn btn-back col-sm-2 categoryBtnRetour">Retour</button></a>
    </div>
</main>

<?php include 'includes/footer.php' ?>