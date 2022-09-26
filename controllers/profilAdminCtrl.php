<?php
session_start();
session_regenerate_id(true);
require_once 'models/User.php';
require_once 'models/Article.php';
require_once 'models/Comment.php';
require_once 'config/regex.php';

$errors = [];
$user = new User;
$article = new Article;
$comment = new Comment;


if (isset($userSession) && (is_numeric($userSession)) && ($user->isIdUserExist($userSession))) {
    $readUser = $user->readUser($userSession);
}
// $readArticleList = $article->readArticlesList();
// $readArticleByUser = $article->getArticlesListByOrderDateAndByIdUser($userSession);

$readAllUsers = User::readAllUsers();
// $displayUsername = isset($_POST['dataUpdateUser']) ? $_POST['updateUsername'] : $readUser->username;
// $displayEmail = isset($_POST['dataUpdateUser']) ? $_POST['updateEmail'] : $readUser->username;

// fonction pour afficher user avec
//condition vérification si l'URL envoyée contient bien une ID, une ID entier, une ID existante
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} elseif (isset($_GET['idDelete'])) {
    $id = $_GET['idDelete'];
}
if (isset($id) && (is_numeric($id)) && ($user->isIdUserExist($id))) {
    $readUserById = $user->readUser($id);
}

// fonction pour modifier user avec controller
if (isset($_POST['dataUpdateUser'])) {
    if (!empty($_POST['updateUsername'])) {
        if (strlen($_POST['updateUsername']) <= 150) {
            if (!preg_match($regex, $_POST['updateUsername'])) {
                $errors['updateUsername'] = 'Le champ Pseudo ne doit comporter que des lettres minuscules/majuscules/chiffres';
            } elseif ($user->isUsernameExist()) {
                $errors['updateUsername'] = 'Votre Pseudo existe déjà';
            } else {
                $user->username = $_POST['updateUsername'];
            }
        } else {
            $errors['updateUsername'] = 'Le champ Pseudo doit comporter au maximum 150 caractères';
        }
    } else {
        $errors['updateUsername'] = 'Le champ Pseudo doit être rempli';
    }
    if (!empty($_POST['updateEmail'])) {
        if (!filter_var(($_POST['updateEmail']), FILTER_VALIDATE_EMAIL)) {
            $errors['updateEmail'] = 'Le champ email ne respecte par les caractèristiques d\'un mail';
            $user->email = ($_POST['updateEmail']);
        } elseif ($user->isEmailExist()) {
            $errors['updateEmail'] = 'Ce mail est déjà enregistré';
        } else {
            $user->email = ($_POST['updateEmail']);
        }
    } else {
        $errors['updateEmail'] = 'Le champ email doit être rempli';
    }
    if (empty($errors)) {
        $user->updateUser($userSession);
        header("Location: profilUser.php");
    } else {
        $errors['userRegister'] = 'Le user existe déjà';
    }
}
if (isset($_GET['idDelete']) && (is_numeric($_GET['idDelete'])) && ($user->isIdUserExist($_GET['idDelete']))) {
    $idDelete = ($_GET['idDelete']);
?>
    <div class="card text-center w-25 mx-auto">
        <div class="card-body">
            <p class="card-text">LA SUPPRESSION DE L'UTILISATEUR ENTRAINERA LA SUPPRESSION DE SON COMPTE ET DE SES ARTICLES ET COMMENTAIRES.</p>
            <a href="profilUser.php?idDeleteConfirmation=<?= $idDelete ?>" class="card-link btn btn-danger">Confirmez suppression</a>
        </div>
    </div>
<?php }
if (isset($_GET['idDeleteConfirmation'])) {
    var_dump($_GET['idDeleteConfirmation']);
    $user->deleteUser($_GET['idDeleteConfirmation']);
    $article->deleteArticle(($_GET['idDeleteConfirmation']));

    header("Location: index.php");
}
//****************** */ Function for pagination ONLY FOR users
$offsetPaginationUsersList;

$nbUsers = $user->countUsersList();
$pageLimitPaginationUsersList = 5;
if (isset($_GET['pageUsers']) && !empty($_GET['pageUsers'])) {
    $currentPageUsers = htmlspecialchars($_GET['pageUsers']);
} else {
    $currentPageUsers = 1;
}
//nb de page par rapport au nb de patients
$nbPageUsers = ceil($nbUsers / $pageLimitPaginationUsersList);
$offsetPaginationUsersList = ($currentPageUsers * $pageLimitPaginationUsersList) - $pageLimitPaginationUsersList;
$usersListWithLimitAndOffsetForPagination = $user->usersListWithLimitAndOffsetForPagination($offsetPaginationUsersList, $pageLimitPaginationUsersList);

//******************* */ Function for pagination ONLY FOR articles
$offsetPaginationArticlesList;

$nbArticles = $article->countArticlesList();
$pageLimitPaginationArticlesList = 5;
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = htmlspecialchars($_GET['page']);
} else {
    $currentPage = 1;
}
//nb de page par rapport au nb d'articles
$nbPage = ceil($nbArticles / $pageLimitPaginationArticlesList);
$offsetPaginationArticlesList = ($currentPage * $pageLimitPaginationArticlesList) - $pageLimitPaginationArticlesList;
$articlesListWithLimitAndOffsetForPagination = $article->articlesListWithLimitAndOffsetForPagination($offsetPaginationArticlesList, $pageLimitPaginationArticlesList);
