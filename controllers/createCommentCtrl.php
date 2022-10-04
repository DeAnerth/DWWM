<?php
require_once 'models/Comment.php';
require_once 'config/regex.php';

?>
<?php
$errors = [];
$userSession = isset($_SESSION['id'])? $_SESSION['id']: NULL;

if (isset($_GET['idArticle'])) {
    $idCreateComment = $_GET['idArticle'];
} elseif (isset($_GET['idUpdateArticle'])) {
    $idCreateComment = $_GET['idUpdateArticle'];
} elseif (isset($_GET['idArticleDelete'])) {
    $idCreateComment = $_GET['idArticleDelete'];
} else {
    $idCreateComment = $_GET['idArticleDeleteonfirmation'];
}

$comment = new Comment();

if (isset($_POST['createCommentSubmit'])) {
    if (!empty($_POST['comment1'])) {
        $comment->text1 = $_POST['comment1'];
    } elseif ($userSession == NULL) {
        $errors['comment1'] = 'Il faut vous connecter pour laisser un commentaire';
    } else {
        $errors['comment1'] = 'Le champ du commentaire doit être rempli';
    }
    if (empty($errors)) {
        $comment->dateCreateComment = date('Y-m-d');
        $comment->idAuthor = $userSession;
        $comment->idArticleOfComment = ($idCreateComment);
        $comment->createComment();
    }
} 

$errorComment1 = isset($errors['comment1']) ? $errors['comment1'] : '';

if (isset($idCreateComment) && (is_numeric($idCreateComment)) && ($article->isIdArticleExist($idCreateComment))) {
    $readCommentByArticle = Comment::readCommentByArticle($idCreateComment);
}
