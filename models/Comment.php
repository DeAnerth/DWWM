<?php
require_once 'config/db.php';

class Comment extends Database
{
    public ?int $id;
    public ?string $text1;
    public ?string $dateCreateComment;
    public ?string $dateUpdateComment;
    public ?string $idAuthor;
    public ?string $idArticleOfComment;


    /**********  CRUD ********************/
    /**
     * Method to create comment
     * @return void
     * @access public
     */
    public function createComment(): void
    {
        $query = 'INSERT INTO `comment` (`text1`, `dateCreateComment`, `dateUpdateComment`, `idAuthor`, `idArticleOfComment`) VALUES (:text1, :dateCreateComment, :dateUpdateComment, :idAuthor, :idArticleOfComment)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':text1', $this->text1, PDO::PARAM_STR);
        $stmt->bindParam(':dateCreateComment', $this->dateCreateComment, PDO::PARAM_STR);
        $stmt->bindParam(':dateUpdateComment', $this->dateUpdateComment, PDO::PARAM_STR);
        $stmt->bindParam(':idAuthor', $this->idAuthor, PDO::PARAM_INT);
        $stmt->bindParam(':idArticleOfComment', $this->idArticleOfComment, PDO::PARAM_INT);
        $stmt->execute();
    }
    /**
     * Method to read one or more comments by user in the database
     * with limits for pagination
     * @return class class Comment
     * @access public 
     * @static
     */
    public static function readCommentByUser(int $id): ?Comment
    {
        $query = 'SELECT `com`.`text1`, `com`.`dateCreateComment`, `com`.`dateUpdateComment`, `com`.`idAuthor`, `com`.`idArticleOfComment`, `user`.`id`, `user`.`username`, `user`.`email`, `user`.`dateCreateUser` FROM `comment` AS `com` INNER JOIN `user` AS `user` ON `com`.`id` = `user`.`id` WHERE `com`.`id` = :id ORDER BY `com`.`dateCreateComment` OR `com`.`dateUpdateComment` DESC LIMIT 5, 5';
        $stmt = Database::instantiatePDO()->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
        $result = $stmt->fetchAll();

        if ($result == false) {
            return null;
        }
        return $result;
    }
    /**
     * Method to read one or more comments by article in the database 
     * with limits for pagination
     * @return array
     * @access public 
     * @static
     */
    public static function readCommentByArticle(int $id): array
    {
        $query = 'SELECT `com`.`text1`, `com`.`dateCreateComment`, `com`.`dateUpdateComment`, `com`.`idAuthor`, `com`.`idArticleOfComment`, `art`.`id` FROM `comment` AS `com` INNER JOIN `article` AS `art` ON `com`.`idArticleOfComment` = `art`.`id` WHERE `com`.`idArticleOfComment` = :id ORDER BY `com`.`dateCreateComment`';
        $stmt = Database::instantiatePDO()->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
        $result = $stmt->fetchAll();

        return $result; 
    }
    /**
     * Method to update comment datas by id in the database
     * @return 
     * @access public 
     */
    public function updateComment(int $id)
    {
        $query = 'UPDATE `comment` SET `text1` = :updateText1, `dateCreateComment` = :updatedateCreateComment, `dateUpdateComment` = :updatedateUpdateComment =  WHERE `id` = :idUpdateComment';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idUpdateComment', $id, PDO::PARAM_INT);
        $stmt->bindParam(':updateText1', $this->text1, PDO::PARAM_STR);
        $stmt->bindParam(':updatedateUpdateComment', $this->dateUpdateComment, PDO::PARAM_STR);
        $stmt->execute();
    }
    /**
     * Method to delete comment datas by id in the database
     * @return 
     * @access public 
     */
    public function deleteArticle($id)
    {
        $query = 'DELETE FROM `comment`  WHERE `id` = :idDeleteComment';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idDeleteComment', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**********  CONTROL METHODS ********************/
    /**
     * method to verify existence of comment'id
     *@return bool true if another comment'id is found, false otherwise 
     *@access public 
     */
    public function isIdCommentExist(int $id): bool
    {
        $query = 'SELECT `id` FROM `comment` WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
        $result = $stmt->fetch();

        if ($result == false) {
            return false;
        }
        return true;
    }

    /**********  METHOD TO SEARCH EVENTUALLY INSULTS  ********************/
    /**
     * Method to search eventually insults
     * @return object
     * @access public
     * @static?
     */
    public function searchComment(string $searchComment)
    {
        /**
         * Création de la requête SQL
         */
        $query = 'SELECT `id`, `text1` FROM `comment` WHERE `text1` LIKE :searchComment';
        $stmt = Database::instantiatePDO()->prepare($query);
        $searchComment = '%' . $searchComment . '%';
        $stmt->bindParam(':searchComment', $searchComment, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
        $result = $stmt->fetchAll();

        if ($result == false) {
            return null;
        }
        return $result;
    }
}
