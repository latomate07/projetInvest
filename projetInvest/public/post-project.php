<?php 
use Model\Users;

require_once ('functions.php');
require_once('Object/controllers/Project.php');
require_once('Object/models/Users.php');
require_once ('Modules/UserProject/actions.php'); // Fichier incluant la logique de cette page

$user = new Users();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_title(); ?></title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://kit.fontawesome.com/1ba83f2b65.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="container">
        <?php 
           include('header.php');  // Inclure le Header
           if ($user->user_is_logged() && $user->getUserRole($find->id) == "Entreprise") :  // SI l'utilisateur est connecté et qu'il a le rôle Entreprise, Afficher le formulaire
        ?> 

        <h1 class="title">Publier un projet</h1>
        <div class="formDiv">
            <form action="" method="post" class="postArticle">
                <!-- Response -->
                <?php if (isset($success)) : ?>
                      <p class="success"><?= $success; ?></p>
                <?php elseif (isset($erreur)) : ?>
                    <p class="error"><?= $erreur; ?></p>
                <?php endif ?>
                <!-- End -->

                <input type="text" name="postName" placeholder="Le nom de votre projet" class="smallInput" required>
                <select name="categorie"  class="select"  required>
                    <option value="">Choisir une catégorie</option>
                    <option value="artisanat" class="postCategorie">Artisanat</option>
                    <option value="commerce" class="postCategorie">Commerce</option>
                    <option value="football" class="postCategorie">Football</option>
                    <option value="autres" class="postCategorie">Autres</option>
                </select>
                <textarea name="projectDescription" cols="30" rows="10" class="postContentBlock" required></textarea>
                <input type="number" name="postAmount" placeholder="Le montant souhaité" class="smallInput" required>
                <input type="number" name="tauxdeprofit" placeholder="Taux qu'aura l'investisseur" class="smallInput" required>
                <label for="postvduRoi">Choisissez un délai du retour de l'investissement par</label>
                <select name="vduRoi" class="select" required>
                    <option value="Trimestre">Trimestre</option>
                    <option value="An">An</option>
                </select>
                <input type="submit" value="Publier" class="inputBtn" name="submit">
            </form>
        </div>

        <?php elseif ($user->user_is_logged() && $user->getUserRole($find->id) == "Entreprise") : ?> 
        <div class="notInvited">
            <h1 style="text-align:center;"> Vous devez avoir le rôle d'Entreprise afin de pouvoir publier un projet ! </h1>
            <a class="btn">Changer de rôle</a>
            <p>Ou</p>
            <a class="btn">Créer un nouveau compte</a>
        </div>
        <?php else : ?> <!-- Si l'utilisateur n'est pas connecté, Cacher le formulaire ! -->
        <div class="notInvited">
            <h1 style="text-align:center;"> Vous devez vous connecter pour publier un projet ! </h1>
        </div>  
        <?php endif ?>  <!-- Fin de la vérification -->
    </div>
</body>
</html>