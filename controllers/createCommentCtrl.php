<?php
require_once 'models/Comment.php';
require_once 'config/regex.php';

?>
<?php
$errors = [];
$comment = new Comment();

//on vérifie que le formulaire a bien été soumis
if (isset($_POST['commentSubmit'])) {
    if (!empty($_POST['text1'])) {
        $comment->text1 = $_POST['text1'];
    } else {
        $errors['text1'] = 'Le champ du commentaire doit être rempli';
    }
    if (empty($errors)) {
        $comment->dateCreatecomment = date('Y-m-d');
        var_dump($comment->dateCreatecomment);
        $comment->createComment();
        header("Location: profilUser.php");
    } else {
        $errors[] = 'PROBLEME';
    }
}


$errorText1 = isset($errors['text1']) ? $errors['text1'] : '';
