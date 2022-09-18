<?php
require_once 'config/db.php';

class User extends Database
{
    public ?int $id;
    public ?string $email;
    public ?string $password;
    public ?string $username;
    public ?string $dateCreateUser;

    /**********  LOGIN TO USER SESSION ********************/
    /**
     * Méthod to verify and login to User Session
     * @return bool
     * @access public
     */

    public function connexionSession(): bool
    {
        $query = 'SELECT * FROM user WHERE username = :username';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $stmt->fetch();

        if ($result == false) {
            return false;
        }
        return password_verify($this->password, $result->password);
    }

    /**********  CRUD ********************/
    /**
     * Method to create user
     * @return void
     * @access public
     */
    public function createUser(): void
    {
        $query = 'INSERT INTO `user` (`username`, `email`, `password`, `dateCreateUser`) VALUES (:username, :email, :password, :dateCreateUser)';
        $stmt = $this->pdo->prepare($query);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->username = htmlspecialchars($this->username);
        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
        $stmt->bindParam(':dateCreateUser', $this->dateCreateUser, PDO::PARAM_STR);
        $stmt->execute();
    }
    /** 
     * Method to read all the existing users in the database
     * @return array array of users
     * @access public 
     * @static
     * */
    public static function readAllUsers(): array
    {
        $query = 'SELECT `id`, `username`, `email`, `dateCreateUser` FROM user';
        $stmt = Database::instantiatePDO()->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $stmt->fetchAll();
        return $result;
    }
    /**
     * Method to read a user datas by id in the database
     * @return class class User
     * @access public 
     * @static
     */
    public static function readUser(int $id): ?User
    {
        $query = 'SELECT `id`, `username`, `email`, `dateCreateUser` FROM `user` WHERE `id`= :idUser';
        $stmt = Database::instantiatePDO()->prepare($query);
        $stmt->bindParam(':idUser', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $stmt->fetch();

        if ($result == false) {
            return null;
        }
        return $result;
    }
        /**
     * Method to read a user datas by id in the database
     * @return class class User
     * @access public 
     * @static
     */
    public static function getUserByUsername(string $username): ?User
    {
        $query = 'SELECT `id`, `username`, `email`, `dateCreateUser` FROM `user` WHERE `username`= :username';
        $stmt = Database::instantiatePDO()->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $stmt->fetch();

        if ($result == false) {
            return null;
        }
        return $result;
    }

    /**
     * Method to update user datas by id in the database
     * @return 
     * @access public 
     */
    public function updateUser(int $id)
    {
        $query = 'UPDATE `user` SET `username` = :updateUsername, `email` = :updateEmail  WHERE `id` = :idUpdateUser';
        $stmt = $this->pdo->prepare($query);
        $this->username = htmlspecialchars($this->username);
        $stmt->bindParam(':idUpdateUser', $id, PDO::PARAM_INT);
        $stmt->bindParam(':updateUsername', $this->username, PDO::PARAM_STR);
        $stmt->bindParam(':updateEmail', $this->email, PDO::PARAM_STR);
        $stmt->execute();
    }
    /**
     * Method to delete user by id in the database
     * @param int $id 
     * @return 
     * @access public 
     */
    public function deleteUser(int $id)
    {
        $query = 'DELETE FROM `user`  WHERE `id` = :idDeleteUser';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idDeleteUser', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**********  CONTROL METHODS ********************/
    /**
     * method to verify existence of user'id
     *@param int $id 
     *@return bool true if another user'id is found, false otherwise 
     *@access public 
     */
    public function isIdUserExist(int $id): bool
    {
        $query = 'SELECT `id` FROM `user` WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $stmt->fetch();

        if ($result == false) {
            return false;
        }
        return true;
    }
    /**
     * method to verify existence of user'username
     *@param int $id 
     *@return int if result equal to 0, the user'username don't exist
     *@access public 
     */
    public function isUsernameExist(): int
    {
        $query = 'SELECT COUNT(*) AS `number` FROM `user` WHERE `username` = :username';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result->number;
    }
    /**
     * method to verify existence of user'mail
     *@return int if result equal to 0, the user'mail don't exist
     *@access public 
     */
    public function isEmailExist()
    {
        $query = 'SELECT COUNT(*) AS `number` FROM `user` WHERE `email` = :email';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result->number;
    }

    /**********  METHOD TO SEARCH BY USERNAME  ********************/
    /**
     * Method to search a username
     * @param string $searchUsername
     * @return 
     * @access public
     * @static?
     */

    public function searchUsername(string $searchUsername)
    {
        $query = 'SELECT `id`, `username` FROM `user` WHERE `username` LIKE :searchUsername';
        $stmt = Database::instantiatePDO()->prepare($query);
        $searchUsername = '%' . $searchUsername . '%';
        $stmt->bindParam(':searchUsername', $searchUsername, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $stmt->fetchAll();

        if ($result == false) {
            return null;
        }
        return $result;
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
    public function usersListWithLimitAndOffsetForPagination(int $pageOffSet, int $pageLimit)
    {
        $query = 'SELECT `id`, `username`, `email`, `dateCreateUser` FROM `user` ORDER BY `username` DESC LIMIT :pageOffSet, :pageLimit ';
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
    public function countPatientsList(): int
    {
        $query = 'SELECT COUNT(`id`) AS `number` FROM `user`';
        //on demande à PDO de préparer la requete et de la stocker dans la variable $stmt (statement)
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        //notre objectif retourner le nombre actuel d'utilisateurs
        return $result->number;
}

}