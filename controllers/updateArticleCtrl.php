<?php

require_once 'models/Article.php';
require_once 'models/Category.php';
require_once 'config/functions.php';
require_once 'config/regex.php';
require_once 'controllers/articlePageCtrl.php';

?>
<?php
$errors = [];
$exceptions = [];

if (isset($_GET['idArticle'])) {
    $idUpdateArticle = $_GET['idArticle'];
} elseif (isset($_GET['idUpdateArticle'])) {
    $idUpdateArticle = $_GET['idUpdateArticle'];
} elseif (isset($_GET['idArticleDelete'])) {
    $idUpdateArticle = $_GET['idArticleDelete'];
} else {
    $idUpdateArticle = $_GET['idArticleDeleteConfirmation'];
}


// Call the Class
$article = new Article();

if (isset($idUpdateArticle) && (is_numeric($idUpdateArticle)) && ($article->isIdArticleExist($idUpdateArticle))) {
    $updateArticle = $idUpdateArticle;
    $toIdentifyIdAuthor = $article->readArticleByIdArticle($idUpdateArticle);
    $idAuthor = $toIdentifyIdAuthor->idAuthor;
}

// Variable to display what been write in form
$updateTitle = isset($_POST['updateTitle']) ? $_POST['updateTitle'] : '';
$updateText1 = isset($_POST['updateText1']) ? $_POST['updateText1'] : '';
$updateText2 = isset($_POST['updateText2']) ? $_POST['updateText2'] : '';
$photo1 = isset($_POST['photo1']) ? $_POST['photo1'] : '';
$photo2 = isset($_POST['photo2']) ? $_POST['photo2'] : '';
$updatePhone = isset($_POST['updatePhone']) ? $_POST['updatePhone'] : '';
$updateWebsite = isset($_POST['updateWebsite']) ? $_POST['updateWebsite'] : '';


// Vérify if form button will be submit and be .........
if (isset($_POST['updateArticleSubmit'])) {
    if ($userSession == NULL) {
        $errors['updateArticle'] = 'Il faut être connecté pour modifier un article';
    }
    if ($userSession != $idAuthor) {
        $errors['updateArticle'] = 'Vous n\'êtes pas l\'auteur de cet article et ne pouvez donc pas le modifier';
    }
    if (!empty($_POST['updateTitle'])) {
        if (strlen($_POST['updateTitle']) <= 150) {
            if (!preg_match($regex, $_POST['updateTitle'])) {
                $errors['updateTitle'] = 'Le champ du titre ne doit comporter que des lettres minuscules/majuscules/chiffres';
            } else {
                $article->title = $_POST['updateTitle'];
            }
        } else {
            $errors['updateTitle'] = 'Le champ du titre doit comporter au maximum 150 caractères';
        }
    } else {
        $errors['updateTitle'] = 'Le champ du titre doit être rempli';
    }

    if (!empty($_POST['updateText1'])) {
        $article->text1 = $_POST['updateText1'];
    } else {
        $errors['updateText1'] = 'Le champ du premier descriptif doit être rempli';
    }

    if (!empty($_POST['updateText2'])) {
        $article->text2 = htmlspecialchars($_POST['updateText2']);
    } else {
        $exceptions['updateText2'] = 'Champs vide non obligatoire mais souhaitable';
    }

    if ((isset($_FILES['updatePhoto1']['tmp_name'])) && (!empty($_FILES['updatePhoto1']['tmp_name']))) {
        $imageType = exif_imagetype($_FILES['updatePhoto1']['tmp_name']);
        $image = $_FILES['updatePhoto1']['tmp_name'];
        $imageY = $_FILES['updatePhoto1'];
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
                $errors['updatePhoto1'] = 'Le champ photo doit être rempli';
        }
    } else {
        $errors['updatePhoto1'] = 'Le champ photo doit être rempli';
    }

    if ((isset($_FILES['updatePhoto2']['tmp_name'])) && (!empty($_FILES['updatePhoto2']['tmp_name']))) {
        $imageType = exif_imagetype($_FILES['updatePhoto2']['tmp_name']);
        $image = $_FILES['updatePhoto2']['tmp_name'];
        $imageX = $_FILES['updatePhoto2'];
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
                $exceptions['updatePhoto2'] = 'Le champ photo2 n\'est pas obligatoire';
        }
    }

    if (isset($_POST['updatePhone'])) {
        if (empty($_POST['updatePhone'])) {
            $exceptions['updatePhone'] = "Champs vide non obligatoire mais souhaitable";
        } elseif (!preg_match('/^0[13-79][0-9]{8}$/', $_POST['updatePhone'])) {
            $exceptions['updatePhone'] = "Format de numéro de téléphone incorrect";
        } else {
            $article->phone = $_POST['updatePhone'];
        }
    }
    if (isset($_POST['updateWebsite'])) {
        if (empty($_POST['updateWebsite'])) {
            $exceptions['updateWebsite'] = "Champs vide non obligatoire mais souhaitable";
        } elseif (!filter_var($_POST['updateWebsite'], FILTER_VALIDATE_URL)) {
            $exceptions['updateWebsite'] = "Format d'URL incorrect";
        } else {
            $article->website = $_POST['updateWebsite'];
        }
    }

    if (empty($errors)) {
        $article->dateUpdateArticle = date('Y-m-d');
        $article->updateArticle($updateArticle);
        $article->readArticleByIdArticle($idUpdateArticle);

        header("Location: articlePage.php");

    }
}

$errorUpdateTitle = isset($errors['updateTitle']) ? $errors['updateTitle'] : '';
$errorUpdateText1 = isset($errors['updateText1']) ? $errors['updateText1'] : '';
$exceptionUpdateText2 = isset($exceptions['updateText2']) ? $exceptions['updateText2'] : '';
$errorUpdatePhoto1 = isset($errors['updatePhoto1']) ? $errors['updatePhoto1'] : '';
$exceptionUpdatePhoto2 = isset($exceptions['updatePhoto2']) ? $exceptions['updatePhoto2'] : '';
$exceptionUpdatePhone = isset($exceptions['updatePhone']) ? $exceptions['updatePhone'] : '';
$exceptionUpdateWebsite = isset($exceptions['updateWebsite']) ? $exceptions['updateWebsite'] : '';
$errorUpdateArticle = isset($errors['updateArticle']) ? $errors['updateArticle'] : '';
