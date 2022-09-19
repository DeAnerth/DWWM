<?php
require_once 'models/User.php';
require_once 'models/Article.php';

?>
<?php
$article = new Article();
$idArticle = $_GET['idArticle'];
var_dump($idArticle);

if (isset($idArticle) && (is_numeric($idArticle)) && ($article->isIdArticleExist($idArticle))) {
    $readArticle = $article->readArticleByIdArticle($idArticle);
    var_dump($readArticle);
}

