<?php
require_once 'models/Article.php';
require_once 'models/Comment.php';
require_once 'controllers/articlePageCtrl.php';

$errors = [];

if (isset($_GET['idArticleDelete'])) {
    $idDelete = $_GET['idArticleDelete'];
}   

$user = new User;
$article = new Article;
$comment = new Comment;

if (isset($idDelete) && (is_numeric($idDelete)) && ($article->isIdArticleExist($idDelete))) {
    $idArticleDelete = $idDelete;
    $toIdentifyIdAuthor = $article->readArticleByIdArticle($idDelete);
    $idAuthor = $toIdentifyIdAuthor->idAuthor;

?>
    <div id="modalBodyDelete" class="modal text-center w-25 mx-auto">
        <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermeture"></button>

            <p class="modal-text">LA SUPPRESSION DE L'ARTICLE ENTRAINERA LA SUPPRESSION AUSSI DE TOUS SES COMMENTAIRES.</p>
            <a href="profilUser.php?idArticleDeleteConfirmation=<?= $idArticleDelete ?>" class="modal-link btn btn-danger">Confirmez suppression</a>
        </div>
    </div>
<?php }

if (isset($idArticleDelete)) {
    if ($userSession == NULL) {
    $errors['deleteArticle'] = 'Il faut être connecté pour supprimer un article';
    } elseif ($userSession != $idAuthor) {
    $errors['deleteArticle'] = 'Vous n\'êtes pas l\'auteur de cet article et ne pouvez donc pas le supprimer';
    } else {
    $article->deleteArticle($idArticleDelete);
    $comment->deleteCommentsOfArticle($idArticleDelete);

    header("Location: index.php");

    }}

$errorDeleteArticle = isset($errors['deleteArticle']) ? $errors['deleteArticle'] : '';
