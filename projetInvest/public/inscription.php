<?php 
namespace App;

require_once ('../object/models/Users.php');
require_once('functions.php');
require_once('../modules/authentification/auth.php');

$user = new Users();

// Vérifier si utilisateur déjà connecté
if ($user->user_is_logged()) {
    redirect('index.php');
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
            <h2>Inscription</h2>
            </div>
            <div class="row clearfix">
            <div class=""> 
                <form method="post" action="">

                <?php 
                // Affichage statut après validation
                if (isset($success)) : ?>
                    <p class="success"><?= $success; ?></p>
                <?php elseif(isset($erreur)) : ?>
                    <p class="error"><?= $erreur; ?></p>
                <?php endif ?>

                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Email" required />
                </div>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Mot de passe" required />
                </div>
                <div class="row clearfix">
                    <div class="col_half">
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="userFullName" placeholder="Nom complet" />
                    </div>
                    </div>
                    <div class="col_half">
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="userPseudo" placeholder="Nom d'utilisateur" required />
                    </div>
                    </div>
                </div>
                    <div class="input_field radio_option">
                        <h5>Type d'utilisateur : </h5>
                        <input type="radio" name="userRole" id="rd1" value="Entreprise" checked>
                        <label for="rd1">Entreprise</label>
                        <input type="radio" name="userRole" id="rd2" value="Investisseur">
                        <label for="rd2">Investisseur</label>
                    </div>
                    <div class="input_field select_option">
                        <select name="userCountry">
                        <option>Selectionnez un pays</option>
                        <option value="France">France</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Canada">Canada</option>
                        <option value="Suisse">Suisse</option>
                        <option value="Maroc">Maroc</option>
                        <option value="Algérie">Algérie</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Afrique du sud">Afrique du sud</option>
                        </select>
                        <div class="select_arrow"></div>
                    </div>
                    <!-- <div class="input_field checkbox_option">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">J'accepte les termes et conditions</label>
                    </div>
                    <div class="input_field checkbox_option">
                        <input type="checkbox" id="cb2">
                        <label for="cb2">Je veux recevoir la newsletter</label>
                    </div>-->
                <input class="button" type="submit" value="S'inscrire" name="register"/>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
