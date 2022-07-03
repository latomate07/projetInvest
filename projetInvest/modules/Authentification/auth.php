<?php
namespace App;

$user = new Users();

require_once('../public/functions.php');
require_once ('../object/models/Notifications.php');

// Envoyer une notification à l'utlisateur
$notification = new Notifications(); 

// Register Condtion
if (isset($_POST['register'])) {
    $userFullName = htmlspecialchars($_POST['userFullName']);
    $userPseudo = htmlspecialchars($_POST['userPseudo']);
    $userMail = htmlspecialchars($_POST['email']);
    $userRole = htmlspecialchars($_POST['userRole']);
    $userPassword =  password_hash($_POST['password'], PASSWORD_DEFAULT);
    $userCountry = htmlspecialchars($_POST['userCountry']);
    $userjoindate = showTime();

    // Tentative d'insertion de l'utilisateur 
    $query = $user->signin($userFullName, $userPseudo, $userMail, $userRole, $userPassword, $userjoindate, $userCountry);
    
    // Si retourne vraie, alors affiché message success et rediriger vers page d'accueil
    if ($query) {
        $success = "Inscription réussie !";
        // Ajouter l'id de l'utilisateur dans la session
        
        redirect('../../index.php');

        // Préparer la notification
        $sujet = "Bienvenu(e) sur TahirouTest.com";
        $contenu = "Pour pouvoir effectuer des actions sur la plateforme, veuillez à remplir votre profil depuis le tableau de bord.";
        $user_id = $_SESSION["user_id"];
        $date = date("d/m/Y");
        $seen = 0;

        // Envoyer la notification
        $notification->sendNotifications($sujet, $contenu, $user_id, $date, $seen);
    } else {
        $erreur = $user->errors;
    }
}

// Login Condition

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['userPseudo']);
    $userPassword =  htmlspecialchars($_POST['password']); // Récupérer la version non haché pour la comparer 

    // Insérer les éléments du formulaire et les traiter
    $query = $user->login($username, $userPassword);
    // Si retourne vraie, alors affiché message success et rediriger vers page d'accueil

    if ($query) {
        $success = "Bon retour parmi nous !";
        redirect('../../index.php');

    } else {
        $erreur = $user->errors;
    }
}