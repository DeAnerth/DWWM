<?php
require_once 'models/Article.php';
require_once 'models/Comment.php';
require_once 'config/regex.php';

$errors = [];

if (isset($_GET['idArticleDelete'])) {
    $idDelete = $_GET['idArticleDelete'];
}   

$user = new User;
$article = new Article;
$comment = new Comment;

if (isset($idDelete) && (is_numeric($idDelete)) && ($article->isIdArticleExist($idDelete))) {
    $idArticleDelete = $idDelete;
?>
    <div class="card text-center w-25 mx-auto">
        <div class="card-body">
            <p class="card-text">LA SUPPRESSION DE L'ARTICLE ENTRAINERA LA SUPPRESSION AUSSI DE TOUS SES COMMENTAIRES.</p>
            <a href="profilUser.php?idArticleDeleteConfirmation=<?= $idArticleDelete ?>" class="card-link btn btn-danger">Confirmez suppression</a>
        </div>
    </div>
<?php }
if (isset($idArticleDelete)) {
    var_dump($idArticleDelete);
    $article->deleteArticle($idArticleDelete);
    $comment->deleteCommentsOfArticle($idArticleDelete);
    }