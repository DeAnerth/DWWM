<?php
class Form
{
    private $data;
    private $controller;


    private function getValue($name)
    {
        return $this->data[$name] ?? null;
    }
    /**
     * Methodes permettant de construire un formulaire
     */
    //PARTIE FORMULAIRE
    public function form($id, $attributs, $method, $action, $enctype)
    {
        return '<form id="' . $id . '" class="' . $attributs . '" method="' . $method . '" action="' . $action . '" enctype="' . $enctype . '">';
    }
    public function formEnd()
    {
        return '</form>';
    }
    //PARTIE CHAMPS FIELDSET
    public function fieldsetBefore($attributs)
    {
        return '<fieldset class="' . $attributs . '">';
    }
    public function fieldsetAfter()
    {
        return '</fieldset>';
    }
    //PARTIE LEGEND = TITRE DU FIELDSET
    public function legend($attributs, $title)
    {
        return '<legend class="' . $attributs . '">' . $title . '</legend>';
    }
    //PARTIE TEXTE/COMMENT via balise <p>
    public function comment($text)
    {
        return '<p>' . $text . '</p>';
    }

    //PARTIE INPUT avec un SPAN $errors qui affiche les erreurs & TEXTAREA
    public function input($type, $name, $attributsLabel, $attributsInput, $text, $labelText, array $options = [])
    {
        $errors = $this->controller->getError($name);
        echo '<div class="form-label row mb-3">
        <label for="' . $name . '" id="' . $name . '" class="' . $attributsLabel . '">' . $labelText . '</label>
        <div class="col-sm-9">
        <input type="' . $type . '" class="' . $attributsInput . '"  name="' . $name . '" value="' . $this->getValue($name) . '" placeholder="' . $text . '">';
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<span class="small text-danger">';
                echo $error;
                echo '</span>';
            }
        }
        echo '</div></div>';
    }
    public function textarea($name, $attributsLabel, $attributsTextarea, $text, $labelText, $rows, array $options = [])
    {
        $errors = $this->controller->getError($name);
        echo '<div class="form-label row mb-3">
        <label for="' . $name . '" id="' . $name . '" class="' . $attributsLabel . '">' . $labelText . '</label>
        <div class="col-sm-9">
        <textarea class="' . $attributsTextarea . '"  name="' . $name . '" value="' . $this->getValue($name) . '" rows="' . $rows . '" placeholder="' . $text . '"></textarea>';
        echo '</div></div>';
    }
    //PARTIE BOUTONS ici un bouton type submit
    public function submit($type, $name, $attributsDiv, $attributsButton, $text)
    {
        echo '<div class="' . $attributsDiv . '">
    <button type="' . $type . '" id="' . $name . '" class="' . $attributsButton . '" name="' . $name . '">' . $text . '</button>';
    }

    //PARTIE DIVERS 
    //fonction pour terminer une div (nécessaire pour regrouper des éléments)
    public function divEnd()
    {
        return '</div>';
    }
}
