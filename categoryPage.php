<?php
require_once 'controllers/categoryPageCtrl.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';


?>
<section>
    <?php foreach ($readArticleByNameCategory as $keyarticle => $article) { 
        var_dump($article);
    ?>
    
    <article class="mt-5 mb-5">
    <h2><?= $article->title ?><h2>
    <img src="assets/img/<?php echo $article->photo1 ?>">
    <p><?= $article->text1 ?></p>
    <a href="articlePage.php?idArticle=<?= $article->articleId ?>"><?= $article->articleId ?></a></li>
    </article>
    <?php } ?>


    
    <?php include 'includes/footer.php' ?>