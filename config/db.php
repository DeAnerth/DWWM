<?php
require_once 'config/config-model.php';
/** Class allowing the connection to our database
 * 
 * This class stores the PDO connector allowing us to interact with the database.
 * It isn't meant to be used on its own, but to be inherited by other classes.
 * 
 * @access public
 * */
class Database
{
    protected PDO $pdo;
    /** Methode magique de PHP
     * Permet la connexion à la BDD
     */
    public function __construct()
    {
        $this->pdo = Database::instantiatePDO();
    }
    public static function instantiatePDO(): PDO
    {
        try {
            /** @var PDO $pdo  
             * Instance de l'objet PDO
             */
            $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASSWORD);
            /**
             * PDO::ATTR_ERRMODE et PDO::ERRMODE_EXCEPTION permettent de spécifier à PDO que l'on veux des Exceptions à la place des erreurs PHP. Cela va permettre de les attraper dans le catch.
             */
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die('Erreur de connexion à la base de données: ' . $error->getMessage());
        }
        return $pdo;
    }
    /**
     * Cette methode est protected. Elle ne peut être appelé que dans la classe et ses enfants. Elle permet d'executer la requête SQL et de retourner le jeu de résultats.
     * @param [type] $query
     * @return array
     */
    protected function getQueryResult($query): array
    {
        /**
         * $queryResult devient une instance de l'objet PDOStatement
         * $pdo->query() execute la requête SQL
         */
        $queryResult = $this->pdo->query($query);
        /**
         * Le fetchAll permet de récupérer un tableau avec les valeurs de la BDD
         * Le paramètre PDO::FETCH_OBJ permet de spécifier que le tableau de retour doit contenir un objet avec des attributs correspondant aux champs de la BDD.
         */
        $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
