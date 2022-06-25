<?php 
use Model\Users;
$user = new Users();

require_once('../../functions.php');

// Register Condtion
if (isset($_POST['register'])) {
    $userFullName = htmlspecialchars($_POST['userFullName']);
    $userPseudo = htmlspecialchars($_POST['userPseudo']);
    $userMail = htmlspecialchars($_POST['email']);
    $userRole = htmlspecialchars($_POST['userRole']);
    $userPassword =  password_hash($_POST['password'], PASSWORD_DEFAULT);
    $userjoindate = showTime();

    // Tentative d'insertion de l'utilisateur 
    $query = $user->signin($userFullName, $userPseudo, $userMail, $userRole, $userPassword, $userjoindate);
    
    // Si retourne vraie, alors affiché message success et rediriger vers page d'accueil
    if ($query) {
        $success = "Inscription réussie !";
        // Ajouter l'id de l'utilisateur dans la session
        
        redirect('../../index.php');
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