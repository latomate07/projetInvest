<?php
use App\Users;

require_once ('/Users/kingbarry/Desktop/projetInvest/object/models/Users.php');

$user = new Users();
$user_id = !empty($_SESSION["user_id"]) ? $_SESSION["user_id"] : "";

if (!empty($user_id)) {
    $find = $user->findById($user_id);
}


// Submit form UserProject

//if (isset($_POST['submit'])) {
    if (!empty($_POST['postName']) && !empty($_POST['categorie']) && !empty($_POST['projectDescription'])  && !empty($_POST['postAmount']) && !empty($_POST['tauxdeprofit']) && !empty($_POST['vduRoi'])) {
        $projectName = htmlspecialchars($_POST['postName']);
        $projectCategorie = $_POST['categorie'];
        $projectDescription = htmlspecialchars($_POST['projectDescription']);
        $projectAmount = htmlspecialchars($_POST['postAmount']);
        $tauxDeRendement = htmlspecialchars($_POST['tauxdeprofit']);
        $vduRoi = htmlspecialchars($_POST['vduRoi']); // vduRoi veut dire => Versement du Return On Investissment
        $username = $find->userPseudo; // Nom de celui qui publie
        $projectPlace = htmlspecialchars($_POST['postPlace']); // Lieu du projet
        $campaignTime = htmlspecialchars($_POST['campaignTime']); // Durée de la campagne
        $minInvest = htmlspecialchars($_POST['minInvest']); // Prix minimum d'investissement

        // $userLogo = !empty($_SESSION['user_id']) && $find->userLogo !== NULL ? $find->userLogo : $user->defaultLogo;

        
        // Récupérer la date 
        $dateTime = new DateTime('now', new DateTimeZone('Europe/Paris')); 
        $displayTime = $dateTime->format("d/m/y à H:i"); 

        // Add in database
        try {
            $addPost = $bdd->prepare('INSERT INTO project (projectName, projectCategorie, projectDescription, projectAmount, projectPostDate, tauxdeprofit, vduROI, userName, projectPlace, campaignTime, minInvest ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ');
            $addPost->execute(
                [
                    $projectName, 
                    $projectCategorie, 
                    $projectDescription,
                    $projectAmount,
                    $displayTime,
                    $tauxDeRendement,
                    $vduRoi,
                    $username,
                    $projectPlace,
                    $campaignTime,
                    $minInvest
                ]
            );
    
            // Success 
            $success = "Parfait !";
        } catch (PDOException $e) {
            $pdoErreur = "Ouups ! une erreur s'est produite, nous avons été notifié <br> Nous allons arranger cela très rapidement.";
        }

        // redirect

        // redirect('index.php');

    } else {
        $erreur = "Vous devez remplir tout les champs !";
    }
//}

/* Envoyer le statut du traitement 

if (isset($success)) {
    echo json_encode($success);
} elseif (isset($erreur)) {
    echo json_encode($erreur);
}

*/