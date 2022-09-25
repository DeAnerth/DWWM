<?php
session_start();
session_regenerate_id(true);

require_once 'models/User.php';
require_once 'models/Article.php';

?>
<?php
$article = new Article();
$idArticle = $_GET['idArticle'];

if (isset($_GET['idArticle']) && (is_numeric($_GET['idArticle'])) && ($article->isIdArticleExist($_GET['idArticle']))) {
    $readArticle = $article->readArticleByIdArticle($_GET['idArticle']);
}
