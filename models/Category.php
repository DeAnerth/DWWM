<?php
require_once 'config/db.php';

class Category extends Database
{
    public int $id;
    public string $name;
    
    /**********  CRUD ********************/
    /**
     * Method to read all articles
     * @return array
     * @access public
     */
    public function readCategoryList(): array
    {
        $query = 'SELECT `id`, `name` FROM `category`';
        $queryResult = $this->pdo->query($query);
        $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }


    /**********  CONTROL METHODS ********************/
    /**
     * method to verify existence of category'id
     *@return bool true if another category'id is found, false otherwise 
     *@access public 
     */
    public function isIdCategoryExist(int $id): bool
    {
        $query = 'SELECT `id` FROM `category` WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        $result = $stmt->fetch();

        if ($result == false) {
            return false;
        }
        return true;
    }

}

