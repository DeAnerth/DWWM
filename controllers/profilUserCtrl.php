<?php

require_once 'models/User.php';
require_once 'models/Article.php';
require_once 'config/regex.php';

$errors = [];
$user = new User;
$readUser = $user->readUser('1');
$readArticleByUser = Article::readArticleByUser($readUser->id);
$displayUsername = isset($_POST['dataUpdateUser']) ? $_POST['updateUsername'] : $readUser->username;
$displayEmail = isset($_POST['dataUpdateUser']) ? $_POST['updateEmail'] : $readUser->username;

// fonction pour afficher user avec
//condition vérification si l'URL envoyée contient bien une ID, une ID entier, une ID existante
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
// } elseif (isset($_GET['idDelete'])) {
//     $id = $_GET['idDelete'];
// } else {
//     $id = $_GET['idDeleteConfirmation'];
// }
$id = 1;

if (isset($id) && (is_numeric($id)) && ($user->isIdUserExist($id))) {
    $readUser = $user->readUser($id);
} 
if (isset($_GET['idDelete']) && (is_numeric($_GET['idDelete'])) && ($user->isIdUserExist($_GET['idDelete']))) {
    $idDelete = ($_GET['idDelete']);
?>
    <div class="card text-center w-25 mx-auto">
        <div class="card-body">
            <p class="card-text">LA SUPPRESSION DU user ENTRAINERA LA SUPPRESSION DE TOUS SES RDVS.</p>
            <a href="profilUser.php?idDeleteConfirmation=<?= $idDelete ?>" class="card-link btn btn-danger">Confirmez suppression</a>
        </div>
    </div>
<?php }


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
            $user->updateuser($_GET['id']);
            header("Location: profilUser.php");
            } else {
            $errors['userRegister'] = 'Le user existe déjà';
            }
        }
        


