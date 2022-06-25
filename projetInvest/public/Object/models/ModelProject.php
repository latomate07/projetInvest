<?php
use Model\Model;

require_once('Model.php');

class ModelProject extends Model {

    // Vérifier s'il existe des projets dans la base de données 
    public function hasPost() {
        $findProject = $this->pdo->prepare('SELECT * FROM project');
        $findProject->execute();
        $project = $findProject->fetch();

        if ($project->rowCount() !== 0) { // Si le résultat de la requête n'est pas vide
            $statement = true;
            return $statement; // Retourne les projets
        }

        return false;
    }
}