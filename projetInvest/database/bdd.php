<?php 
$bdd = new PDO('mysql:host=localhost:8889;dbname=investproject;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Requête vers base de données

if (!function_exists('getPdo')) {
    function getPdo() {
        $bdd = new PDO('mysql:host=localhost:8889;dbname=investproject;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $pdo = $bdd;
    
        return $pdo;
    }
}

?>