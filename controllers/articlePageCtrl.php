<?php
require_once 'models/User.php';
require_once 'models/Category.php';
require_once 'models/Article.php';
require_once 'models/Comment.php';

?>
<?php
$article = new Article();
$category = new Category();
// $readCategoryByArticle = $category->readCategoryByArticle();

$readUser = $user->readUser('1');//pour voir si cela fonctionne
$readArticleByUser = Article::readArticleByUser($readUser->id);
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
if (isset($id) && (is_numeric($id)) && ($user->isIdUserExist($id))) {
    $readUser = $user->readUser($id);
} 

if (isset($_GET[''])) {

}
