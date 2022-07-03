<?php 
namespace App;

require_once ('../object/models/Users.php');
require_once('functions.php');
require_once('../modules/authentification/auth.php');

$user = new Users();

// Vérifier si utilisateur déjà connecté
if ($user->user_is_logged()) { 
    redirect('../../index.php');
} 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_title() ?></title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/authentification/auth.js"></script>
    <script src="https://kit.fontawesome.com/1ba83f2b65.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <?php include('header.php'); ?>
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
            <h2>Connexion</h2>
            </div>
            <div class="row clearfix">
            <div class=""> 
                <form method="post" action="">
                    <?php
                     // Affichage statut après validation
                    if (isset($success)) : ?>
                        <p class="success"><?= $success ?></p>
                    <?php elseif(isset($erreur)) : ?>
                        <p class="error"><?= $erreur ?></p>
                    <?php endif ?>

                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="userPseudo" placeholder="Nom d'utilisateur ou E-mail" required />
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Mot de passe" required />
                    </div>

                    <input class="button" type="submit" value="Se connecter" name="login"/>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

