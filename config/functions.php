<?php

//*****  DEBUG  ********/
/**    Allows a debug display 
 *     and a shortcut for var_dump
 */
function debug($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    die;
}
//*****  CONTROLLER  ********/
/**    Enables data security
 *     against SQL injunctions by three php functions 
 *     specifically for the $_POST method
 */
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//*****  IMAGES  ********/
/**    function to save an image in a database
 */
function convertImage3($photo)
{
    $uploads_dir = 'assets/img/';
    $tmp_name = $photo['tmp_name'];
    $name = basename($photo['name']);
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
    return $name;
}

/** Function under construction 
 * Allows you to convert an image
 * according to a specific size 
 */
function convertImage($em)
{
    //https://lesdocs.fr/gestion-des-images-avec-php/
    $img = $em;
    $taille = getimagesize($_FILES['photo1']['tmp_name']);
    $largeur = $taille[0];
    $hauteur = $taille[1];
    $largeur_miniature = 600;
    $hauteur_miniature = $hauteur / $largeur * $largeur_miniature;
    $im_miniature = imagecreatetruecolor(
        $largeur_miniature,
        $hauteur_miniature
    );
    imagecopyresampled($im_miniature, $img, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
    $uploads_dir = 'assets/img/';
    $tmp_name = $_FILES['photo1']['tmp_name'];
    $name = basename($_FILES['photo1']['name']);
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
    imagejpeg($im_miniature, 'assets/img/' . $_FILES['photo1']['name'], 90);
}

//*****  DATE  ********/

/**    Allows you to format a recorded date 
 *     input size  $formatInput 
 *     output size $formatOuput
 */

function changeDate(string $date, string $formatInput, string $formatOutput): string
{
    $d = DateTimeImmutable::createFromFormat($formatInput, $date);
    return $d->format($formatOutput);
}
/**    Allows you to check the validity of a date
 *     first check if the date is valid
 *     then check the date format
 */

function validateDate($date, $format)
{
    $d = DateTimeImmutable::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

//******* TRYS  ********/
// $filename = 'test.jpg';
 
// // Définition de la largeur et de la hauteur maximale
// $width = 200;
// $height = 200;
 
// // Content type
// header('Content-Type: image/jpeg');
 
// // Cacul des nouvelles dimensions
// list($width_orig, $height_orig) = getimagesize($filename);
 
// $ratio_orig = $width_orig/$height_orig;
 
// if ($width/$height > $ratio_orig) {
//    $width = $height*$ratio_orig;
// } else {
//    $height = $width/$ratio_orig;
// }
 
// // Redimensionnement
// $image_p = imagecreatetruecolor($width, $height);
// $image = imagecreatefromjpeg($filename);
// imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
 
// // Affichage
// imagejpeg($image_p, null, 100);
// 
