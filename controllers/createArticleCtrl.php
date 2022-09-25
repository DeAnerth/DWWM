<?php
session_start();
require_once 'models/Article.php';
require_once 'models/Category.php';
require_once 'config/functions.php';
require_once 'config/regex.php';

?>

<?php
$errors = [];
$userSession = $_SESSION['id'];

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
    if (isset($_FILES['photo1']['tmp_name'])) {
            $imageType = exif_imagetype($_FILES['photo1']['tmp_name']);
            $image = $_FILES['photo1']['tmp_name'];
    // IMAGETYPE_JPEG (2) IMAGETYPE_PNG (3) IMAGETYPE_WEBP (18) IMAGETYPE_GIF (1)
    switch (true) {
        case ($imageType === 1):
            convertImage(imagecreatefromgif($_FILES['photo1']['tmp_name']));
            $article->photo1 = ($_FILES['photo1']['name']);
            break;
        case (($imageType === 2)):
            convertImage(imagecreatefromjpeg($_FILES['photo1']['tmp_name']));
            $article->photo1 = ($_FILES['photo1']['name']);
            break;
        case ($imageType === 3):
            convertImage(imagecreatefrompng($_FILES['photo1']['tmp_name']));
            $article->photo1 = ($_FILES['photo1']['name']);
            break;
        case (($imageType === 18)):
            convertImage(imagecreatefromwebp($_FILES['photo1']['tmp_name']));
            $article->photo1 = ($_FILES['photo1']['name']);
            break;
        case (empty($image)):
            $errors['photo1'] = 'Le champ photo doit être rempli';
        }
    }

    if (empty($errors)) {
        $article->text2 = $_POST['text2'];
        $article->dateCreateArticle = date('Y-m-d');
        $article->idAuthor = $userSession ;
        $article->createArticle();
        header("Location: profilUser.php");
    } else {
        $errors[] = 'Il y a des PROBLEMES';
    }
var_dump($article);
}


    // if (isset($_FILES['photo1']['tmp_name'])) {
//     $imageType = exif_imagetype($_FILES['photo1']['tmp_name']);
//     $image = $_FILES['photo1']['tmp_name'];
//     // IMAGETYPE_JPEG (2) IMAGETYPE_PNG (3) IMAGETYPE_WEBP (18) IMAGETYPE_GIF (1)
//     switch (true) {
//         case ($imageType === 1):
//             convertImage(imagecreatefromgif($_FILES['photo1']['tmp_name']));
//             break;
//         case (($imageType === 2)):
//             convertImage(imagecreatefromjpeg($_FILES['photo1']['tmp_name']));
//             break;
//         case ($imageType === 3):
//             convertImage(imagecreatefrompng($_FILES['photo1']['tmp_name']));
//             break;
//         case (($imageType === 18)):
//             convertImage(imagecreatefromwebp($_FILES['photo1']['tmp_name']));
//             break;
//         case (empty($image)):
//             $errors['photo1'] = 'Le champ photo doit être rempli';
//         }
// }

$errorTitle = isset($errors['title']) ? $errors['title'] : '';
$errorCategory = isset($errors['category']) ? $errors['category'] : '';
$errorText1 = isset($errors['text1']) ? $errors['text1'] : '';
$errorPhoto1 = isset($errors['photo1']) ? $errors['photo1'] : '';
