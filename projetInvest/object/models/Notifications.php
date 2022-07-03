<?php
namespace App;

use PDO;

require_once ('Model.php');
// Cette classe contiendra tout les stockages, traitement et controlleurs du système de notification du site 


class Notifications extends Model
{
    protected $table = "notifications";
    public $type = "Système"; // Par défaut le type de notifications est le système

   public function sendNotifications(mixed $object, mixed $message, int $receiver_id, mixed $date, int $seen) {
         // Insérer et stocker la notification
         $query = $this->pdo->prepare("INSERT INTO {$this->table} (subject, message, receiver_id, time, seen) VALUES (?, ?, ?, ?, ?) ");
         $query->execute([
            $object, 
            $message,
            $receiver_id,
            $date,
            $seen
         ]);

         // Ajouter statut par défault
         $this->status = "Non lu";
         // Type de notification
         $this->type = "Système";
    }
    public function findNotifications(int $receiver_id) {
        // Requête vers la bdd pour vérifier s'il existe une notification avec l'ID de l'utilisateur
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE (receiver_id = ?)");
        $query->execute([$receiver_id]);

        $data = $query->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }
}