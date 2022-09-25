<?php
session_start();
session_regenerate_id(true);

require_once 'models/Category.php';
require_once 'models/Article.php';
$page = ($_GET['name']);

?>
<?php 

$article = new Article();

if (isset($_GET['name'])) {
    $readArticleByNameCategory = $article->readArticleByNameCategory($_GET['name']);
}

