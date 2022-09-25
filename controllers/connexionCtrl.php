<?php

require_once 'config/config-model.php';
require_once 'models/User.php';

$errors = [];
$success = false;

$user = new User();
$username = isset($_POST["username"]) ? $_POST["username"] : "";

// Vérification de l'envoi du formulaire
if(isset($_POST['submit'])) {

    // Vérification du nom d'utilisateur
    if(!isset($_POST['username'])) {
        $errors['username'] = "Merci de renseigner un nom d'utilisateur";
    }
    else {
        $user->username = htmlspecialchars($_POST['username']);
    }

    // Vérification du mot de passe
    if(!isset($_POST['password'])) {
        $errors['password'] = "Merci de renseigner un mot de passe";
    }
    else {
        $user->password = $_POST['password'];
    }

    if(empty($errors)) {
        // Vérification des données de l'utilisateur
        if(!$user->connexionSession()) {
            $errors[] = "Les informations de connexion sont incorrectes";
        }
        else {
            $_SESSION['username'] = $user->username;
            $recupIdSessionByName = $user->getUserByUsername($user->username);
            $_SESSION['id'] = $recupIdSessionByName->id;
            $_SESSION['role'] = $recupIdSessionByName->role;
            if ($_SESSION['role'] == 1) {
                header('Location: profilUserAdmin.php');
            } else {
                header('Location: profilUser.php');
            }
            var_dump($recupIdSessionByName);
        }
    }
}
$errorUsername= isset($errors['username']) ? $errors['username'] : '';
$errorPassword= isset($errors['password']) ? $errors['password'] : '';


?>
