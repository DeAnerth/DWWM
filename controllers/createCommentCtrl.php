<?php
require_once 'models/Comment.php';
require_once 'config/regex.php';

?>
<?php
$errors = [];
$userSession = $_SESSION['id'];

$comment = new Comment();
$idArticle = $_GET['idArticle'];


if (isset($_GET['idArticle']) && (is_numeric($_GET['idArticle'])) && ($article->isIdArticleExist($_GET['idArticle']))) {
    $readCommentByArticle = Comment::readCommentByArticle($_GET['idArticle']);
}

//on vérifie que le formulaire a bien été soumis
if (isset($_POST['createCommentSubmit'])) {
    if (!empty($_POST['text1'])) {
        $comment->text1 = $_POST['text1'];
    } else {
        $errors['text1'] = 'Le champ du commentaire doit être rempli';
    }
    if (empty($errors)) {
        $comment->dateCreateComment = date('Y-m-d');
        $comment->idAuthor = $userSession;
        $comment->idArticleOfComment = ($_GET['idArticle']);
        $comment->createComment();
    } else {
        $errors[] = 'PROBLEME';
    }
}


$errorText1 = isset($errors['text1']) ? $errors['text1'] : '';
