<?php
require_once 'models/Article.php';
require_once 'models/Category.php';
require_once 'config/regex.php';

?>

<?php
$errors = [];
$article = new Article();
$category = new Category();
$readCategoryList = $category->readCategoryList();

$title = isset($_POST['title']) ? $_POST['title'] : '';

//on vérifie que le formulaire a bien été soumis
if (isset($_POST['articleSubmit'])) {
    if (!empty($_POST['category'])) {
        if ($category->isIdCategoryExist($_POST['category'])) {
            $article->idCategory = $_POST['category'];
        }
    } else {
        $errors['category'] = 'Vous devez remplir la catégorie de l\'article';
    }
    if (!empty($_POST['title'])) {
        if (strlen($_POST['title']) <= 150) {
            if (!preg_match($regex, $_POST['title'])) {
                $errors['title'] = 'Le champ du titre ne doit comporter que des lettres minuscules/majuscules/chiffres';
            } else {
                $article->title = $_POST['title'];
            }
        } else {
            $errors['title'] = 'Le champ du titre doit comporter au maximum 150 caractères';
        }
    } else {
        $errors['title'] = 'Le champ du titre doit être rempli';
    }
    if (!empty($_POST['text1'])) {
        $article->text1 = $_POST['text1'];
    } else {
        $errors['text1'] = 'Le champ du premier descriptif doit être rempli';
    }
    if (empty($errors)) {
        $article->text2 = $_POST['text2'];
        $article->dateCreateArticle = date('Y-m-d');
        var_dump($article->dateCreateArticle);
        $article->createArticle();
        header("Location: profilUser.php");
    } else {
        $errors[] = 'Le patient existe déjà';
    }
}

$errorTitle = isset($errors['title']) ? $errors['title'] : '';
$errorCategory = isset($errors['category']) ? $errors['category'] : '';
$errorText1 = isset($errors['text1']) ? $errors['text1'] : '';
