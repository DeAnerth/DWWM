<?php
require 'controllers/connexionCtrl.php';
?>

<?php

?>

<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-warning"><?= $_SESSION['message'] ?></div>
<?php } ?>
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php if (!empty($errors)) {
                    foreach ($errors as $error) { ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                <?php }
                } else {

                }
                ?>
                <form action="" method="POST">
                    <h1 class="mb-3">S'identifier</h1>
                    <div class="row mb-3">
                        <label class="col-sm-3" id="username-label" for="username">Pseudo</label>
                        <div class="col-sm-9">
                            <input type="text" value="<?= $username; ?>" class="form-control" placeholder="" aria-label="Nom d'utilisateur" aria-describedby="username-label" id="username" name="username" />
                            <span class="text-danger"><?= $errorUsername?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3" id="password-label" for="password">Mot de passe</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" aria-label="Mot de passe" aria-describedby="password-label" id="password" name="password" />
                            <span class="text-danger"><?= $errorPassword ?></span>
                        </div>
                    </div>
                    <div class=" align-items-center mb-5">
                        <button type="submit" class="btn btn-success col-12" name="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary col-12" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Créer un compte</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Retour</button>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>