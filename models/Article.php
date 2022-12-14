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
    public ?string $photo1;
    public ?string $photo2;
    public ?int $idAuthor;
    public ?int $idCategory;
    public ?string $phone;
    public ?string $website;


    /**********  CRUD ********************/
    /**
     * Method to create article
     * @return void
     * @access public
     */
    public function createArticle(): void
    {
        $query = 'INSERT INTO `article` (`title`, `text1`, `photo1`, `text2`, `photo2`, `phone`, `website`, `dateCreateArticle`, `dateUpdateArticle`, `idAuthor`, `idCategory`) VALUES (:title, :text1, :photo1, :text2, :photo2, :phone, :website, :dateCreateArticle, :dateUpdateArticle, :idAuthor, :idCategory)';
        $stmt = $this->pdo->prepare($query);
        $this->title = htmlspecialchars($this->title);
        $this->text1 = htmlspecialchars($this->text1);
        $this->idCategory = htmlspecialchars($this->idCategory);
        $this->idAuthor = htmlspecialchars($this->idAuthor);
        $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindParam(':text1', $this->text1, PDO::PARAM_STR);
        $stmt->bindParam(':photo1', $this->photo1, PDO::PARAM_STR);
        $stmt->bindParam(':text2', $this->text2, PDO::PARAM_STR);
        $stmt->bindParam(':photo2', $this->photo2, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $stmt->bindParam(':website', $this->website, PDO::PARAM_STR);
        $stmt->bindParam(':dateCreateArticle', $this->dateCreateArticle, PDO::PARAM_STR);
        $stmt->bindParam(':dateUpdateArticle', $this->dateUpdateArticle, PDO::PARAM_STR);
        $stmt->bindParam(':idAuthor', $this->idAuthor, PDO::PARAM_INT);
        $stmt->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
        $stmt->execute();
    }
    /**
     * Method to read all articles
     * @return array
     * @access public
     */
    public function readArticlesList(): array
    {
        $query = 'SELECT `id`, `title`, `text1`, `text2`,`dateCreateArticle`, `dateUpdateArticle`, `idAuthor`, `idCategory`, `phone`, `website` FROM `article`';
        $queryResult = $this->pdo->query($query);
        $commentsList = $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $commentsList;
    }
        /**
     * Method to read one or more articles by user in the database
     * with limits for pagination
     * @params int $id 
     * @return class class Article
     * @access public 
     * @static
     */
    public static function readArticleByUser(int $id): ?Article
    {
        $query = 'SELECT `art`.`id` AS `art`.`idArticle`, `art`.`title`, `art`.`text1`, `art`.`photo1`, `art`.`text2`, `art`.`photo2`, `art`.`dateCreateArticle`, `art`.`dateUpdateArticle`, `art`.`idAuthor`, `art`.`idCategory`, `art`.`phone`, `art`.`website`, `user`.`id`, `user`.`username`, `user`.`email`, `user`.`dateCreateUser` FROM `article` AS `art` INNER JOIN `user` AS `user` ON `art`.`idAuthor` = `user`.`id` WHERE `art`.`idAuthor` = :id';
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
     * Method to read article by idArticle
     * @params int $id 
     * @return object
     * @access public
     */
    public function readArticleByIdArticle(int $id): object
    {
        $query = 'SELECT `art`.`id`, `art`.`title`, `art`.`text1`, `art`.`photo1`, `art`.`text2`, `art`.`photo2`, `art`.`dateCreateArticle`, `art`.`dateUpdateArticle`, `art`.`idAuthor`, `art`.`idCategory`, `art`.`phone`, `art`.`website`, `user`.`username`, `user`.`email`, `user`.`dateCreateUser` FROM `article` AS `art` LEFT JOIN `user` AS `user` ON `art`.`idAuthor` = `user`.`id` WHERE `art`.`id` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    /**
     * Method to read article by idCategory
     * @params string $name
     * @return array
     * @access public
     */
    public function readArticleByNameCategory(string $name):array
    {
        $query = 'SELECT `art`.`id` AS `articleId`, `art`.`title`, `art`.`text1`, `art`.`photo1`, `art`.`text2`, `art`.`photo2`, `art`.`dateCreateArticle`, `art`.`dateUpdateArticle`, `art`.`idAuthor`, `art`.`idCategory`, `art`.`phone`, `art`.`website`, `cat`.`id`,`cat`.`name` FROM `article` AS `art` INNER JOIN `category` AS `cat` ON `art`.`idCategory` = `cat`.`id` WHERE `cat`.`name` = :name';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /**
     * Method to read article by idCategory
     * @params int $id
     * @return 
     * @access public
     */
    public function getArticlesListByOrderDateAndByIdUser(int $id)
    {
        $query = 'SELECT `art`.`id`, `art`.`title`, `art`.`text1`, `art`.`photo1`, `art`.`text2`, `art`.`photo2`, `art`.`dateCreateArticle`, `art`.`dateUpdateArticle`, `art`.`idAuthor`, `art`.`idCategory`, `user`.`username`, `user`.`email`, `user`.`dateCreateUser` FROM `article` AS `art` INNER JOIN `user` AS `user` ON `art`.`idAuthor` = `user`.`id` WHERE `art`.`idAuthor` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * Method to update article by id in the database
     * @params int $id
     * @return 
     * @access public 
     */
    public function updateArticle(int $id)
    {
        $query = 'UPDATE `article` SET `title` = :updateTitle, `text1` = :updateText1, `text2` = :updateText2, `dateUpdateArticle` = :updatedateUpdateArticle, `photo1` = :updatePhoto1, `photo2` = :updatePhoto2, `phone` = :updatePhone, `website` = :updateWebsite WHERE `id` = :idUpdateArticle' ; 
        $stmt = $this->pdo->prepare($query);
        $this->title = htmlspecialchars($this->title);
        $this->text1 = htmlspecialchars($this->text1);
        $stmt->bindParam(':idUpdateArticle', $id, PDO::PARAM_INT);
        $stmt->bindParam(':updateTitle', $this->title, PDO::PARAM_STR);
        $stmt->bindParam(':updateText1', $this->text1, PDO::PARAM_STR);
        $stmt->bindParam(':updateText2', $this->text2, PDO::PARAM_STR);
        $stmt->bindParam(':updatedateUpdateArticle', $this->dateUpdateArticle, PDO::PARAM_STR);
        $stmt->bindParam(':updatePhoto1', $this->photo1, PDO::PARAM_STR);
        $stmt->bindParam(':updatePhoto2', $this->photo2, PDO::PARAM_STR);
        $stmt->bindParam(':updatePhone', $this->phone, PDO::PARAM_STR);
        $stmt->bindParam(':updateWebsite', $this->website, PDO::PARAM_STR);

        $stmt->execute();
    }
    /**
     * Method to delete article by id in the database
     * @params int $id
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
    public function deleteAllArticles(int $id) 
    {
        $query = 'DELETE FROM `article`  WHERE `idAuthor` = :idDeleteAllArticles'; 
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idDeleteAllArticles', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


    /**********  CONTROL METHODS ********************/
    /**
     * method to verify existence of comment'id
     * @params int $id
     * @return bool true if another comment'id is found, false otherwise 
     * @access public 
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
        /**********  METHOD TO HAVE PAGINATION USER LIST  ********************/

    /** 
     * Method need to have two parameters ($pageOffSet, $pageLimit) for configure the pagination
     * needed to the function of pagination in controller
     *@param int $pageOffSet 
     *@param int $pageLimit 
     *@return 
     *@access public 
     *@static
     * */
    public function articlesListWithLimitAndOffsetForPagination(int $pageOffSet, int $pageLimit)
    {
        $query = 'SELECT `id`, `title`, `idAuthor`, `dateCreateArticle` FROM `article` ORDER BY `dateCreateArticle` DESC LIMIT :pageOffSet, :pageLimit ';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':pageLimit', $pageLimit, PDO::PARAM_INT);
        $stmt->bindParam(':pageOffSet', $pageOffSet, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /** 
     * Method to count thne number of users in database needed to the function of pagination in controller
     *@param int $pageOffSet 
     *@param int $pageLimit 
     *@return 
     *@access public 
     *@static
     * */
    public function countArticlesList(): int
    {
        $query = 'SELECT COUNT(`id`) AS `number` FROM `article`';
        //on demande ?? PDO de pr??parer la requete et de la stocker dans la variable $stmt (statement)
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        //notre objectif retourner le nombre actuel d'utilisateurs
        return $result->number;
}

}
