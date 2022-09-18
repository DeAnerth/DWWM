<?php
require_once 'models/User.php';
require_once 'config/regex.php';

?>

<?php
$errorsRegistration = [];
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
                $errorsRegistration['username'] = 'Le champ Pseudo ne doit comporter que des lettres minuscules/majuscules/chiffres';
            } elseif ($user->isUsernameExist()) {
                $errorsRegistration['username'] = 'Votre Pseudo existe déjà';
            } else {
                $user->username = $_POST['username'];
            }
        } else {
            $errorsRegistration['username'] = 'Le champ Pseudo doit comporter au maximum 150 caractères';
        }
    } else {
        $errorsRegistration['username'] = 'Le champ Pseudo doit être rempli';
    }
    if (!empty($_POST['email'])) {
        if (!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $errorsRegistration['email'] = 'Le champ Email ne respecte par les caractèristiques d\'un mail';
            $user->email = ($_POST['email']);
        } elseif ($user->isEmailExist()) {
            $errorsRegistration['email'] = 'Ce mail est déjà enregistré';
        } else {
            $user->email = ($_POST['email']);
        }
    } else {
        $errorsRegistration['email'] = 'Le champ Email doit être rempli';
    }
    if (empty($_POST['password']) || empty($_POST['passwordConfirmation'])) {
        $errorsRegistration['password'] = "Merci de renseigner un mot de passe";
        $errorsRegistration['passwordConfirmation'] = "Merci de confirmer votre mot de passe";
    } else if ($_POST['password'] != $_POST['passwordConfirmation']) {
        $errorsRegistration[] = "Le mot de passe et sa confirmation ne concordent pas";
    } else {
        $user->password = $_POST['password'];
    }

    if (empty($errorsRegistration)) {
            $user->dateCreateUser = date('Y-m-d');
            $user->createUser();
            $success = true;
            header("Location: index.php");
        } else {
            $errorsRegistration[] = 'PROBLEME';
        }
    }

$errorRegistrationUsername= isset($errorsRegistration['username']) ? $errorsRegistration['username'] : '';
$errorRegistrationEmail= isset($errorsRegistration['email']) ? $errorsRegistration['email'] : '';
$errorRegistrationPassword= isset($errorsRegistration['password']) ? $errorsRegistration['password'] : '';
$errorRegistrationPasswordConfirmation= isset($errorsRegistration['passwordConfirmation']) ? $errorsRegistration['passwordConfirmation'] : '';