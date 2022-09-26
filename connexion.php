<?php
$page = 'connexion.php';
require_once 'controllers/connexionCtrl.php';
require_once 'controllers/registrationCtrl.php';
?>

<?php

?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-warning"><?= $_SESSION['message'] ?></div>
<?php } ?>
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body col-12">
                <button type="button" class="btn-close mb-4" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php if (!empty($errors)) {
                    foreach ($errors as $error) { ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                <?php }
                } else {
                }
                ?>
                <h3 class="mb-5">S'identifier</h3>
                <form action="" method="POST">
                    <div class="row mb-3">
                        <label class="col-sm-3" id="username-label" for="username">Pseudo</label>
                        <div class="col-sm-9">
                            <input type="text" value="<?= $username; ?>" class="form-control" placeholder="" aria-label="Nom d'utilisateur" aria-describedby="username-label" id="username" name="username" />
                            <span class="text-danger"><?= $errorUsername ?></span>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label class="col-sm-3" id="password-label" for="password">Mot de passe</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" aria-label="Mot de passe" aria-describedby="password-label" id="password" name="password" />
                            <span class="text-danger"><?= $errorPassword ?></span>
                        </div>
                    </div>
                    <div class=" align-items-center mb-5">
                        <button type="submit" class="btn btn-bkgd-black text-white-yellow-btn col-12" name="submit">Enregistrer</button>
                    </div>
                </form>
                <h3 class="mb-5">S'inscrire</h3>
                <div>
                    <button class="btn btn-bkgd-black text-white-yellow-btn col-12 mb-3" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Créer un compte</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content col-12">
            <div class="modal-body">
                <button type="button" class="btn-close mb-5" data-bs-dismiss="modal" aria-label="Close"></button>
                <h3 class="mb-5">S'inscrire</h3>
                <?php if (!empty($errorsRegistration)) {
                    foreach ($errorsRegistration as $error) { ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php }
                } else if ($success) { ?>
                    <div class="alert alert-success">Le compte utilisateur a bien été créé.</div>
                <?php }
                ?>
                <form id="registrationUsers" method="POST" action="">
                    <fieldset class="row">
                        <div class="form-label row mb-3">
                            <label id="usernameLabel" for="username" class="form-label col-sm-4">Pseudo</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" id="username" aria-label="Pseudo" aria-describedby="username-label" value="<?= $username ?>" placeholder="username">
                                <span class="text-danger"><?= $errorRegistrationUsername ?></span>
                            </div>
                        </div>
                        <div class="form-label row mb-3">
                            <label id="emailLabel" for="email" class="form-label col-sm-4">Adresse courriel</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" id="email" aria-label="Email" aria-describedby="email-label" value="<?= $mail ?>" placeholder="name@example.com">
                                <span class="text-danger"><?= $errorRegistrationEmail ?></span>
                            </div>
                        </div>
                        <div class="form-label row mb-3">
                            <label id="passwordLabel" for="password" class="form-label col-sm-4">Mot de Passe</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" id="password" aria-label="Mot de passe" aria-describedby="password-label" value="<?= $password ?>">
                                <span class="text-danger"><?= $errorRegistrationPassword ?></span>
                            </div>
                        </div>
                        <div class="form-label row mb-5">
                            <label id="passwordConfirmationLabel" for="passwordConfirmation" class="form-label col-sm-4">Confirmer votre Mot de Passe</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="passwordConfirmation" id="passwordConfirmation" aria-label="Confirmation Mot de Passe" aria-describedby="passwordConfirmation-label" value="<?= $passwordConfirmation ?>">
                                <span class="text-danger"><?= $errorRegistrationPasswordConfirmation ?></span>
                            </div>
                        </div>
                    </fieldset>
                    <article class="row">
                        <div class="vstack align-items-center col-md-5 mx-auto">
                            <button type="submit" class="btn btn-bkgd-black text-white-yellow-btn col-12" name="registrationUserSubmit">Inscrire</button>
                        </div>
                    </article>
                </form>
            </div>
            <div class="modal-footer align-items-center mt-3 mb-2">
                <button class="btn btn-bkgd-black text-white-yellow-btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Retour</button>
            </div>
        </div>
    </div>
</div>

