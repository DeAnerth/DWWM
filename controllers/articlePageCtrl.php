<?php
session_start();
session_regenerate_id(true);

require_once 'models/User.php';
require_once 'models/Article.php';

?>
<?php
if (isset($_GET['idArticle'])) {
    $idArticle = $_GET['idArticle'];
} elseif (isset($_GET['idUpdateArticle'])) {
    $idArticle = $_GET['idUpdateArticle'];
} else {
    $idArticle = $_GET['idArticleDelete'];
} 
$article = new Article();

if (isset($idArticle) && (is_numeric($idArticle)) && ($article->isIdArticleExist($idArticle))) {
    var_dump($idArticle);
    $readArticle = $article->readArticleByIdArticle($idArticle);
}
