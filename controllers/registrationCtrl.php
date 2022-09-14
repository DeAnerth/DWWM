<?php
require_once 'models/User.php';
require_once 'config/regex.php';

?>

<?php
$errors = [];
$success = false;

$user = new User();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$passwordConfirmation = isset($_POST['passwordConfirmation']) ? $_POST['passwordConfirmation'] : '';




//on vérifie que le formulaire a bien été soumis
if (isset($_POST['registrationUserSubmit'])) {
    if (!empty($_POST['username'])) {
        if (strlen($_POST['username']) <= 150) {
            if (!preg_match($regex, $_POST['username'])) {
                $errors['username'] = 'Le champ Pseudo ne doit comporter que des lettres minuscules/majuscules/chiffres';
            } elseif ($user->isUsernameExist()) {
                $errors['username'] = 'Votre Pseudo existe déjà';
            } else {
                $user->username = $_POST['username'];
                var_dump($user->username);
            }
        } else {
            $errors['username'] = 'Le champ Pseudo doit comporter au maximum 150 caractères';
        }
    } else {
        $errors['username'] = 'Le champ Pseudo doit être rempli';
    }
    if (!empty($_POST['email'])) {
        if (!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Le champ Email ne respecte par les caractèristiques d\'un mail';
            $user->email = ($_POST['email']);
        } elseif ($user->isEmailExist()) {
            $errors['email'] = 'Ce mail est déjà enregistré';
        } else {
            $user->email = ($_POST['email']);
        }
    } else {
        $errors['email'] = 'Le champ Email doit être rempli';
    }
    if (empty($_POST['password']) || empty($_POST['passwordConfirmation'])) {
        $errors['password'] = "Merci de renseigner un mot de passe";
        $errors['passwordConfirmation'] = "Merci de confirmer votre mot de passe";
    } else if ($_POST['password'] != $_POST['passwordConfirmation']) {
        $errors[] = "Le mot de passe et sa confirmation ne concordent pas";
    } else {
        $user->password = $_POST['password'];
    }

    if (empty($errors)) {
            $user->dateCreateUser = date('Y-m-d');
            var_dump($user->dateCreateUser);
            $user->createUser();
            $success = true;
            header("Location: connexion.php");
        } else {
            $errors[] = 'Le patient existe déjà';
        }
    }

$errorUsername= isset($errors['username']) ? $errors['username'] : '';
$errorEmail= isset($errors['email']) ? $errors['email'] : '';
$errorPassword= isset($errors['password']) ? $errors['password'] : '';
$errorPasswordConfirmation= isset($errors['passwordConfirmation']) ? $errors['passwordConfirmation'] : '';