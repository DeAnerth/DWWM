<?php

session_start();

require 'config/config-model.php';

require 'models/User.php';

$errors = [];
$success = false;

$user = new User();

$username = isset($_POST["username"]) ? $_POST["username"] : "";

// Vérification de l'envoi du formulaire
if(isset($_POST['submit'])) {

    // Vérification du nom d'utilisateur
    if(!isset($_POST['username'])) {
        $errors[] = "Merci de renseigner un nom d'utilisateur";
    }
    else {
        $user->username = htmlspecialchars($_POST['username']);
    }

    // Vérification du mot de passe
    if(!isset($_POST['password'])) {
        $errors[] = "Merci de renseigner un mot de passe";
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
            header('Location: index.php');
        }
        
    }

}


?>
