<?php
use Model\Users;

require_once ('/Users/kingbarry/Desktop/projetInvest/public/Object/models/Users.php');

$user = new Users();
$user_id = $_SESSION['user_id'];

$find = $user->findById($user_id);

// Submit form UserProject

if (isset($_POST['submit'])) {
    if (!empty($_POST['postName']) && !empty($_POST['categorie']) && !empty($_POST['projectDescription'])  && !empty($_POST['postAmount']) && !empty($_POST['tauxdeprofit']) && !empty($_POST['vduRoi'])) {
        $projectName = htmlspecialchars($_POST['postName']);
        $projectCategorie = $_POST['categorie'];
        $projectDescription = htmlspecialchars($_POST['projectDescription']);
        $projectAmount = htmlspecialchars($_POST['postAmount']);
        $tauxDeRendement = htmlspecialchars($_POST['tauxdeprofit']);
        $vduRoi = htmlspecialchars($_POST['vduRoi']); // vduRoi veut dire => Versement du Return On Investissment
        $username = $find->userPseudo; // Nom de celui qui publie

        // $userLogo = !empty($_SESSION['user_id']) && $find->userLogo !== NULL ? $find->userLogo : $user->defaultLogo;

        // Récupérer la date 
        $dateTime = new DateTime('now', new DateTimeZone('Europe/Paris')); 
        $displayTime = $dateTime->format("d/m/y à H:i"); 

        // Add in database
        $addPost = $bdd->prepare('INSERT INTO project (projectName, projectCategorie, projectDescription, projectAmount, projectPostDate, tauxdeprofit, vduROI, userName ) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ');
        $addPost->execute(
            [
                $projectName, 
                $projectCategorie, 
                $projectDescription,
                $projectAmount,
                $displayTime,
                $tauxDeRendement,
                $vduRoi,
                $username
            ]
        );

        // Success 
        $success = "Parfait !";

        // redirect

        // redirect('index.php');

    } else {
        $erreur = "Vous devez remplir tout les champs !";
    }
}