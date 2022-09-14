<?php
require_once 'controllers/registrationCtrl.php';

?>
<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
<main class="container mt-3">
    <?php if(!empty($errors)) {
        foreach($errors as $error) { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php }
        var_dump($_POST);
    } 
    else if($success) { ?>
        <div class="alert alert-success">Le compte utilisateur a bien été créé.</div>
    <?php }
    ?>


<div class="mx-5 mt-5 px-3 bg-light">
    <h1 id="registrationTitleUsers" class="d-flex justify-content-center mt-5">INSCRIPTION UTILISATEUR</h1>
    <p class="bg-danger" id="patientRegister"><?= isset($errors['patientRegister']) ? $errors['patientRegister'] : '' ?></p>
    <form id="registrationUsers" class="m-5" method="POST" action="">
        <fieldset class="row mb-5">
            <legend class="mb-5">DETAILS PERSONNELS</legend>
            <div class="form-label row mb-5">
                <label id="usernameLabel" for="username" class="form-label col-sm-3">Pseudo</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" id="username" aria-label="Pseudo" aria-describedby="username-label" value="<?= $username ?>" placeholder="username">
                    <span class="text-danger"><?= $errorUsername ?></span>
                </div>
            </div>
            <div class="form-label row mb-5">
                <label id="emailLabel" for="email" class="form-label col-sm-3">Adresse courriel</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" aria-label="Email" aria-describedby="email-label" value="<?= $mail ?>" placeholder="name@example.com">
                    <span class="text-danger"><?= $errorEmail ?></span>
                </div>
            </div>
            <div class="form-label row mb-5">
                <label id="passwordLabel" for="password" class="form-label col-sm-3">Mot de Passe</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password" aria-label="Mot de passe" aria-describedby="password-label" value="<?= $password ?>">
                    <span class="text-danger"><?= $errorPassword ?></span>
                </div>
            </div>
            <div class="form-label row mb-5">
                <label id="passwordConfirmationLabel" for="passwordConfirmation" class="form-label col-sm-3">Confirmer votre Mot de Passe</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="passwordConfirmation" id="passwordConfirmation" aria-label="Confirmation Mot de Passe" aria-describedby="passwordConfirmation-label" value="<?= $passwordConfirmation ?>">
                    <span class="text-danger"><?= $errorPasswordConfirmation ?></span>
                </div>
            </div>
        </fieldset>
        <article class="row mb-5">
            <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                <button type="submit" class="btn btn-primary col-md-5 mb-4" name="registrationUserSubmit">Inscrire</button>
            </div>
        </article>
    </form>
</div>

<?php include 'includes/footer.php' ?>