<?php 
require 'controllers/connexionCtrl.php';
?>

<?php 
include 'includes/header.php'; 
?>

<main class="container mt-3">
    <?php if(!empty($errors)) {
        foreach($errors as $error) { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php }
    } ?>

    <?php if(isset($_SESSION['message'])) { ?>
        <div class="alert alert-warning"><?= $_SESSION['message'] ?></div>
    <?php } ?>

    <form action="" method="POST">
        <h1 class="mb-3">Connexion</h1>

        <div class="input-group mb-3">
            <label class="input-group-text" id="username-label" for="username">Nom d'utilisateur</label>
            <input type="text" 
                value="<?= $username; ?>" 
                class="form-control" placeholder="" aria-label="Nom d'utilisateur" aria-describedby="username-label" id="username" name="username" />
        </div>
        
        <div class="input-group mb-3">
            <label class="input-group-text" id="password-label" for="password">Mot de passe</label>
            <input type="password" class="form-control" aria-label="Mot de passe" aria-describedby="password-label" id="password" name="password" />
        </div>

        <button type="submit" class="btn btn-success" name="submit">Enregistrer</button>

    </form>

</main>

<?php include 'includes/footer.php'; ?>
