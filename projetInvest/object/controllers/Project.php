<?php
// Ce fichier repertorie toute les actions concernant le Projet d'un utilisateur

namespace Controllers;
use App\ModelProject;


require_once ("/Users/kingbarry/Desktop/projetInvest/object/models/ModelProject.php");

class Project extends ModelProject
{
    protected $table = "project"; // table avec laquelle nous allons travailler
    public $success;

    // Affichage de tout les élements de la table
    public function show() {
        $project = $this->selectAll();
        return $project;
    }

    public function showUserPost() {
        
    }
    // Projet favoris d'un utilisateur
    // Affichage Nouveau projet
    // Affichage page unique d'un projet
    // Supprimer Projet
    // Modifier Projet
}