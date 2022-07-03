<?php
namespace App;
use PDO;

//require_once ('../../database/bdd.php');
require_once("/Users/kingbarry/Desktop/projetInvest/database/bdd.php");
abstract class Model 
{
    protected $pdo;
    protected $table; // La table souhaité => EXEMPLE => $table = users
    protected $orderBy;
    public array $data;
    protected array $sensibleData;

    // Propriété pour enregistrer  les erreurs 
    public $errors;

    // Statut de la requête
    public string $status;

    // Constanntes 
    const USER_IS_LOGGED = "Utilisateur connecté !";
    const USER_ISNOT_LOGGED = "Utilisateur non connecté !";

    /* Lister toutes les informations de l'utilisateur 
     * Séparer en 2 catégories [data & sensibleData]
    */
    public function __construct() {
        $this->pdo = getPdo();

        $this->data = [
            'id',
            'name',
            'email',
            'join_date',
            'logo',
            'cover_picture',
            'description',
            'location',
            'Adress',
            'country'
        ];
        $this->sensibleData = [
            'identityCard',
            'password',
            'bank_details',
        ];
    }

    /* Sélectionner toutes les informations de la table 
    * Condition facultatives => Recevoir un DESC ou ASC en premier paramètre, Recevoir un OrderBy en deudième paramètre
    */
    public function selectAll() {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table}");
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    /* Sélectionner des élements dans une table 
     * Condition => Recevoir les élements à traiter sous forme de tableau
    */ 
    public function selectElements(array $tableElements) {
        $tableElements = implode (", " , $tableElements); // implode (string $separator, $array)

        $query = $this->pdo->prepare("SELECT {$tableElements} FROM {$this->table}");
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    /* Find Element => Trouver n'importe quel élement 
     * Condition => Recevoir ID de l'élement
     * orderBy => À déclarer si besoin
    */
    public function findById(int $id) {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE (id = ?)");
        $query->execute([$id]);

        $data = $query->fetch(PDO::FETCH_OBJ);

        return $data;
    }
    
    /* Find ID => Trouve ID d'un utilisateur
    */
    public function getId()  {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id");
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_OBJ);

        if (!empty($data)) { // Si l'ID de l'utilisateur n'est pas vide, retourne l'ID
            foreach ($data as $userId) {
                return $userId->id;
            }
        }
    }

    /* Delete Element => Supprimer n'importe quel élement
     * Condition => Recevoir ID de l'élement
    */
    public function delete(int $id) {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ? ");
        $query->execute([$id]);

        $data = $query->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

      /* Insert Element => Ajouter n'importe quel élement
       * Condition => Recevoir les informations à introduire sous forme de tableau 
      */

      public function insert(array $tableElements, array $values) {
        $tableElements = implode (", " , $tableElements); // implode (string $separator, $array)
        $values = implode (", " , $values);

        $query = $this->pdo->prepare("INSERT INTO {$this->table} (:tableElements) VALUES (:values) ");
        $query->execute(['tableElements' => $tableElements, 'values' => $values]);
    }

   /* public function anonymeValues($element = "?", $total) {
        for ($i=0; $i <= $total; $i++) {
            $i = $element;
        }
    } */

   /* public function selectById($id) {
        $query = $this->pdo->prepare("SELECT id FROM {$this->table} WHERE (id = ?)");
        $query->execute([$id]);

        $data = $query->fetchAll();

        return $data;
    } */


 /*   public function selectTest($id) {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $query->execute([$id]);

        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
*/
}