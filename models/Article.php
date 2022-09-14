<?php
require_once 'config/db.php';

class Article extends Database
{
    public ?int $id;
    public ?string $title;
    public ?string $text1;
    public ?string $text2;
    public ?string $dateCreateArticle;
    public ?string $dateUpdateArticle;
    public ?string $idAuthor;
    public ?string $idCategory;


    /**********  CRUD ********************/
    /**
     * Method to read all articles
     * @return array
     * @access public
     */
    public function readArticlesList(): array
    {
        $query = 'SELECT `id`, `title`, `text1`, `text2`,`dateCreateArticle`, `dateUpdateArticle`, `idAuthor`, `idCategory` FROM `article`';
        $queryResult = $this->pdo->query($query);
        $commentsList = $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $commentsList;
    }
    /**
     * Method to create article
     * @return void
     * @access public
     */
    public function createArticle(): void
    {
        $query = 'INSERT INTO `article` (`title`, `text1`, `text2`,`dateCreateArticle`, `dateUpdateArticle`, `idAuthor`, `idCategory`) VALUES (:title, :text1, :text2,:dateCreateArticle, :dateUpdateArticle, :idAuthor, :idCategory)';
        $stmt = $this->pdo->prepare($query);
        $this->title = htmlspecialchars($this->title);
        $this->text1 = htmlspecialchars($this->text1);
        $this->text2 = htmlspecialchars($this->text2);
        $this->idCategory = htmlspecialchars($this->idCategory);
//pour les autres est ce nécessaire?
        $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindParam(':text1', $this->text1, PDO::PARAM_STR);
        $stmt->bindParam(':text2', $this->text2, PDO::PARAM_STR);
        $stmt->bindParam(':dateCreateArticle', $this->dateCreateArticle, PDO::PARAM_STR);
        $stmt->bindParam(':dateUpdateArticle', $this->dateUpdateArticle, PDO::PARAM_STR);
        $stmt->bindParam(':idAuthor', $this->idAuthor, PDO::PARAM_INT);
        $stmt->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
        $stmt->execute();
    }
        /**
     * Method to read one or more articles by user in the database
     * with limits for pagination
     * @return class class Article
     * @access public 
     * @static
     */
    public static function readArticleByUser(int $id): ?Article
    {
        $query = 'SELECT `art`.`id`, `art`.`title`, `art`.`text1`, `art`.`text2`, `art`.`dateCreateArticle`, `art`.`dateUpdateArticle`, `art`.`idAuthor`, `art`.`idCategory`, `user`.`id`, `user`.`username`, `user`.`email`, `user`.`dateCreateUser` FROM `user` AS `user` INNER JOIN `article` AS `art` ON `art`.`idAuthor` = `user`.`id` WHERE `user`.`id` = :id ORDER BY `art`.`dateCreateArticle` OR `art`.`dateUpdateArticle` DESC LIMIT 5, 5';
        $stmt = Database::instantiatePDO()->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
        $result = $stmt->fetchAll();

        if ($result == false) {
            return null;
        }
        return $result;
    }
    /**
     * Method to update article by id in the database
     * @return 
     * @access public 
     */
    public function updateArticle(int $id)
    {
        $query = 'UPDATE `article` SET `title` = :updateTitle, `text1` = :updateText1, `text2` = :updateText2, `dateUpdateArticle` = :updatedateUpdateArticle,  WHERE `id` = :idUpdateArticle' ; 
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idUpdateArticle', $id, PDO::PARAM_INT);
        $stmt->bindParam(':updateTitle', htmlspecialchars($this->title), PDO::PARAM_STR);
        $stmt->bindParam(':updateText1', htmlspecialchars($this->text1), PDO::PARAM_STR);
        $stmt->bindParam(':updateText2', htmlspecialchars($this->text2), PDO::PARAM_STR);
        $stmt->bindParam(':updatedateUpdateArticle', htmlspecialchars($this->dateUpdateArticle), PDO::PARAM_STR);
        $stmt->execute();
    }
    /**
     * Method to delete article by id in the database
     * @return 
     * @access public 
     */
    public function deleteArticle(int $id) 
    {
        $query = 'DELETE FROM `article`  WHERE `id` = :idDeleteArticle'; 
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idDeleteArticle', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**********  CONTROL METHODS ********************/
    /**
     * method to verify existence of comment'id
     *@return bool true if another comment'id is found, false otherwise 
     *@access public 
     */
    public function isIdArticleExist(int $id): bool
    {
        $query = 'SELECT `id` FROM `article` WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
        $result = $stmt->fetch();

        if ($result == false) {
            return false;
        }
        return true;
    }
}
