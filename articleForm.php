<?php
require_once 'commun/header.php';
require_once '.models/Form_TER.php';
require_once '.models/Controller.php';
require_once '.models/Datas.php';
require_once '.config/functions.php';

$validator = new Controller($_POST);

$controls = array (
    'email' => array (
        'minlength' => 8,
        'maxlength' => 20,
        'email' => true
    )
);
$validator->check($controls);

?>

<div class="mx-5 mt-5 px-3 bg-light">
    <h1 id="pageFormTitle" class="d-flex justify-content-center mt-5">CREER UN ARTICLE</h1>
<?php 
$form = new Form($validator);

echo $form->form('formArticle', 'm-5', 'POST', 'articleForm.php', 'multipart/form-data');
echo $form->fieldsetBefore('row mb-4');
echo $form->legend('mb-5','Article');
echo $form->comment('Vous pouvez créer ici vos propres articles.');
echo $form->input('text', 'title', 'form-label col-sm-3', 'form-control', '', 'Titre');
echo $form->textarea('comment', 'form-label col-sm-3', 'form-control', '', 'Descriptif', '4');
echo $form->comment('Vous devez insérer une image aux formats JPEG, PNG, GIF');
echo $form->input('text', 'title', 'form-label col-sm-3', 'form-control', '', 'nom de l\'image');
echo $form->input('file', 'photo', 'form-label col-sm-3', 'form-control', '', '');
echo $form->fieldsetAfter('');
echo $form->submit('submit', 'dataFormValid', 'vstack align-items-center col-md-5 mx-auto mb-5', 'btn btn-primary mb-4', 'Valider la création de l\'article');
echo $form->formEnd('');

?>

    </form>
</div>
<pre>
    <?php var_dump($validator->getErrors()); ?>
    
    <?php /*
    if (isset($_FILES['photo']['tmp_name'])) {  
        $retour = copy($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';
            echo '<img src="' . $_FILES['photo']['name'] . '">';
        }
    }
    if (isset($_FILES['photo']['tmp_name'])) {  
        $taille = getimagesize($_FILES['photo']['tmp_name']);
        $largeur = $taille[0];
        $hauteur = $taille[1];
        $largeur_miniature = 300;
        $hauteur_miniature = $hauteur / $largeur * $largeur_miniature;
        $im = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
        $im_miniature = imagecreatetruecolor($largeur_miniature
        , $hauteur_miniature);
        imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
        imagejpeg($im_miniature, 'miniatures/'.$_FILES['photo']['name'], 90);
        echo '<img src="miniatures/' . $_FILES['photo']['name'] . '">';
    }; */
    if (isset($_FILES['photo']['tmp_name'])) {  
        $imageType = exif_imagetype($_FILES['photo']['tmp_name']);
        $image = $_FILES['photo']['tmp_name'];
        // IMAGETYPE_JPEG (2) IMAGETYPE_PNG (3) IMAGETYPE_WEBP (18) IMAGETYPE_GIF (1)
        switch (true) {
            case ($imageType === 1):
            convertImage(imagecreatefromgif($_FILES['photo']['tmp_name']));
            break;
            case (($imageType === 2)):
            convertImage(imagecreatefromjpeg($_FILES['photo']['tmp_name']));
            break;
            case ($imageType === 3):
            convertImage(imagecreatefrompng($_FILES['photo']['tmp_name']));
            break;
            case (($imageType === 18)):
            convertImage(imagecreatefromwebp($_FILES['photo']['tmp_name']));
            break;
            case (empty($image)):
            echo 'Téléverser une image/photo';
        }}
    ?>
</pre>
