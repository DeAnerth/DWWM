<?php
require_once 'header.php';
require_once './Form_TER.php';
require_once './Controller.php';
require_once './Datas.php';

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
    <button type="button" class="btn-close" aria-label="Close"></button>
    <h1 id="pageFormTitle" class="d-flex justify-content-center mt-5">LAISSER UN COMMENTAIRE</h1>
<?php 
$form = new Form($validator);

echo $form->form('formArticle', 'm-5', 'POST', 'articleForm.php', 'multipart/form-data');
echo $form->fieldsetBefore('row mb-4');
echo $form->legend('mb-5','Commentaires');
echo $form->comment('Ecrivez votre commentaire:');
echo $form->input('text', 'title', 'form-label col-sm-3', 'form-control', '', 'Titre');
echo $form->textarea('comment', 'form-label col-sm-3', 'form-control', '', 'Descriptif', '4');
echo $form->fieldsetAfter('');
echo $form->submit('submit', 'dataFormValid', 'vstack align-items-center col-md-5 mx-auto mb-5', 'btn btn-primary mb-4', 'Valider la création du commentaire');
echo $form->formEnd('');

?>

    </form>
</div>
<pre>
    <?php var_dump($validator->getErrors()); ?>
</pre>
