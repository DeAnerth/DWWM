<?php
session_start();
session_regenerate_id(true);

require_once 'models/Article.php';
require_once 'models/Category.php';
require_once 'config/functions.php';
require_once 'config/regex.php';

?>

<?php
$errors = [];
$exceptions = [];
$userSession = $_SESSION['id'];

$title = isset($_POST['title']) ? $_POST['title'] : '';
$text1 = isset($_POST['text1']) ? $_POST['text1'] : '';
$text2 = isset($_POST['text2']) ? $_POST['text2'] : '';
$photo1 = isset($_POST['photo1']) ? $_POST['photo1'] : '';
$photo2 = isset($_POST['photo2']) ? $_POST['photo2'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$website = isset($_POST['website']) ? $_POST['website'] : '';


$article = new Article();
$category = new Category();
$readCategoryList = $category->readCategoryList();

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
                $errors['title'] = 'Le champ du titre ne doit comporter que des lettres minuscules/majuscules/tiret';
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

    if (!empty($_POST['text2'])) {
        $article->text2 = htmlspecialchars($_POST['text2']);
    } else {
        $exceptions['text2'] = 'Champs vide non obligatoire mais souhaitable';
    }
    if ((isset($_FILES['photo1']['tmp_name'])) && (!empty($_FILES['photo1']['tmp_name']))) {
        $imageType = exif_imagetype($_FILES['photo1']['tmp_name']);
        $image = $_FILES['photo1']['tmp_name'];
        $imageY = $_FILES['photo1'];
        // IMAGETYPE_JPEG (2) IMAGETYPE_PNG (3) IMAGETYPE_WEBP (18) IMAGETYPE_GIF (1)
        switch (true) {
            case ($imageType === 1):
                $article->photo1 = convertImage3($imageY);;
                break;
            case (($imageType === 2)):
                $article->photo1 = convertImage3($imageY);
                break;
            case ($imageType === 3):
                $article->photo1 = convertImage3($imageY);
                break;
            case (($imageType === 18)):
                $article->photo1 = convertImage3($imageY);
                break;
            case (empty($image)):
                $errors['photo1'] = 'Le champ photo doit être rempli';
        }
    } else {
        $errors['photo1'] = 'Le champ photo doit être rempli';
    }

    if ((isset($_FILES['photo2']['tmp_name'])) && (!empty($_FILES['photo2']['tmp_name']))) {
        $imageType = exif_imagetype($_FILES['photo2']['tmp_name']);
        $image = $_FILES['photo2']['tmp_name'];
        $imageX = $_FILES['photo2'];
        // IMAGETYPE_JPEG (2) IMAGETYPE_PNG (3) IMAGETYPE_WEBP (18) IMAGETYPE_GIF (1)
        switch (true) {
            case ($imageType === 1):
                $article->photo2 = convertImage3($imageX);;
                break;
            case (($imageType === 2)):
                $article->photo2 = convertImage3($imageX);
                break;
            case ($imageType === 3):
                $article->photo2 = convertImage3($imageX);
                break;
            case (($imageType === 18)):
                $article->photo2 = convertImage3($imageX);
                break;
            case (empty($image)):
                $exceptions['photo2'] = 'Le champ photo2 n\'est pas obligatoire';
        }
    }

    if (isset($_POST['phone'])) {
        if (empty($_POST['phone'])) {
            $exceptions['phone'] = "Champs vide non obligatoire mais souhaitable";
        } elseif (!preg_match('/^0[13-79][0-9]{8}$/', $_POST['phone'])) {
            $exceptions['phone'] = "Format de numéro de téléphone incorrect";
        } else {
            $article->phone = $_POST['phone'];
        }
    }
    if (isset($_POST['website'])) {
        if (empty($_POST['website'])) {
            $exceptions['website'] = "Champs vide non obligatoire mais souhaitable";
        } elseif (!filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
            $exceptions['website'] = "Format d'URL incorrect";
        } else {
            $article->website = $_POST['website'];
        }
    }

    if (empty($errors)) {
        $article->dateCreateArticle = date('Y-m-d');
        $article->idAuthor = $userSession;
        $article->createArticle();
        header("Location: profilUser.php");
    } else {
        $errors[] = 'Il y a des PROBLEMES';
    }
}

$title = isset($_POST['title']) ? $_POST['title'] : '';

$errorTitle = isset($errors['title']) ? $errors['title'] : '';
$errorCategory = isset($errors['category']) ? $errors['category'] : '';
$errorText1 = isset($errors['text1']) ? $errors['text1'] : '';
$errorPhoto1 = isset($errors['photo1']) ? $errors['photo1'] : '';
$exceptionPhoto2 = isset($exceptions['photo2']) ? $exceptions['photo2'] : '';
$exceptionWebsite = isset($exceptions['website']) ? $exceptions['website'] : '';
$exceptionPhone = isset($exceptions['phone']) ? $exceptions['phone'] : '';
$exceptionText2 = isset($exceptions['text2']) ? $exceptions['text2'] : '';
