<?php 
namespace App;

require_once ('functions.php');
require_once('../object/models/Users.php');

$user = new Users();

if ($user->user_is_logged() && !empty($_SESSION['user_id'])) :
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_title() ?></title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="Assets/js/dashboard/script.js" defer></script>
    <script src="Assets/js/app.js" defer></script>
    <script src="https://kit.fontawesome.com/1ba83f2b65.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="container">
       <?php include('header.php'); ?>
        <div class="dashboard-container">
            <nav class="dashboard-nav">
                <ul class="nav-list">
                <li><a href="#" class="nav-link">Tableau de bord</a></li>
                <li><a href="#" class="nav-link active">Compte</a></li>
                </ul>
            </nav>
            <div class="wherearewe">
                <h2 class="title">Mon compte</h2>
                <h4 class="userRegistrated">
                Membre depuis <span class="colorThis">Juin 2022</span>
                </h4>
            </div>
            <div class="top-content">
                <div class="synth-infos">
                
                    <div class="left-content">
                        <div class="left-side">
                            <img class="userLogo" src="media/avatar.png" width="70px" height="70px">
                        </div>
                        <div class="right-side">
                            <h4><a href="#">Barry</a></h4>
                            <a class="userMail" href="#">lmtahirou@gmail.com</a>
                        </div>
                    </div>

                    <div class="middle-content">
                        <div class="top-elements">
                            <i class="fa fa-x"></i>
                            <p class="info">profil <strong>non validé</strong></p>
                        </div>
                        <div class="middle-elements">
                            <i class="fa fa-phone"></i>
                            <p class="info">0678787878</p>
                        </div>
                        <div class="bottom-elements">
                            <i class="fa fa-x"></i>
                            <p class="info">newsletter <strong>active</strong></p>
                        </div>
                    </div>

                    <!-- Visible pour les investisseurs -->
                    <div class="right-content">
                        <strong>Complétez ces étapes avant d'investir</strong>
                        <div class="top-elements">
                            <i class="fa fa-id-card"></i>
                            <p class="info">complétez vos données personnelles</p>
                        </div>
                        <div class="middle-elements">
                            <i class="fa fa-check"></i>
                            <p class="info">Indiquez le type d'investisseur</p>
                        </div>
                    </div>

                </div>

                <div class="nav-pages">
                    <ul class="list">
                    <li><a href="#" class="active">Mes données</a></li>
                    <li><a href="#">Accès</a></li>
                    <li><a href="#">Investir</a></li>
                    <li><a href="#">Préférences</a></li>
                    </ul>
                </div>
            </div> <!-- Fin synth-infos -->
            
            <div class="bottom-content"> <!-- Élements du bas, change en fonction de la navigation -->
                <div class="left">
                    <div class="step-content firstStep">
                        <span class="step stepOne active">1</span>
                        <p class="infos">Compléter vos informations</p>
                    </div>
                    <div class="step-content secondStep">
                        <span class="step stepTwo inactive">2</span>
                        <p class="infos">Vérifier l'identité et l'adresse</p>
                    </div>
                    <div class="step-content thirdStep">
                        <span class="step stepThird inactive">3</span>
                        <p class="infos">Ajouter un compte bancaire</p>
                    </div>
                    <div class="step-content fourStep">
                        <span class="step stepFour inactive">4</span>
                        <p class="infos">Lutte anti-blanchiment</p>
                    </div>
                </div>
                
                <div class="right"> <!-- Contenu flexible en fonction de la navigation -->
                    <form id="step-1">
                        <h3 class="title">Compléter vos données personnelles</h3>
                        <div class="sectionContainer">
                            <div class="left-content">
                                <label for="userFullName">Nom complet</label>
                                <input type="text" value="Barry le roi" name="userFullName">
                                <label for="userResidence">Ville de naissance</label>
                            <select name="userNationality">
                                <option value="France">France</option>
                                <option value="Belgique">Belgique</option>
                                <option value="Suisse">Suisse</option>
                                <option value="Maroc">Maroc</option>
                                <option value="Niger">Niger</option>
                                </select>
                            
                                <label for="userNationality">Nationalité</label>
                                <select name="userNationality">
                                <option value="France">France</option>
                                <option value="Belgique">Belgique</option>
                                <option value="Suisse">Suisse</option>
                                <option value="Maroc">Maroc</option>
                                <option value="Niger">Niger</option>
                                </select>
                            </div>
                            <div class="right-content">
                                <label for="userBirdResidence">Pays de naissance</label>
                                <select name="userBirdResidence">
                                <option value="France">France</option>
                                <option value="Belgique">Belgique</option>
                                <option value="Suisse">Suisse</option>
                                <option value="Maroc">Maroc</option>
                                <option value="Niger">Niger</option>
                                </select>
                                <label for="userBirthday">Date de naissance</label>
                                <input type="date" name="userBirthday">
                                <label for="userGenre">Genre</label>
                                <select name="userGenre">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn" value="Continuer">
                    </form> 

                    <form id="step-2" class="hiddenBlock">
                        <h3 class="title">Vérification de votre identité et votre adresse</h3>
                        <div class="sectionContainer">
                            <div class="left-content">
                                <label for="userAdress">Adresse postale</label>
                                <input type="text" placeholder="Votre adresse postale" name="userAdress">
                                <label for="userCity">Ville</label>
                                <input type="text" placeholder="Votre ville" name="userCity">
                                <label for="userAdressFile">Justificatif de domicile</label>
                                <input type="file" name="userAdressFile">
                            </div>
                            <div class="right-content">
                                <label for="userFamily">Personne à contacter en cas de décès</label>
                                <input type="text" placeholder="Indiquez le nom de la personne" name="userFamily">
                                <label for="userFamily">Adresse de la personne à contacter en cas de décès</label>
                                <input type="text" placeholder="Indiquez l'adresse de la personne" name="userFamily">
                                <label for="userFamily">Numéro de téléphone de la personne à contacter en cas de décès</label>
                                <input type="text" placeholder="Indiquez le numéro de téléphone de la personne" name="userFamily">
                            </div>
                        </div>
                        <input type="submit" class="btn" value="Continuer">
                    </form>

                    <form id="step-3" class="hiddenBlock">
                        <h3 class="title">Ajouter un compte bancaire</h3>
                        <div class="sectionContainer">
                            <div class="left-content">
                                <label for="userBankOwner">Nom du détenteur</label>
                                <input type="text" placeholder="Le nom du détenteur" name="userBankOwner">
                                <label for="userBankOwner">Prénom du détenteur</label>
                                <input type="text" placeholder="Le prénom du détenteur" name="userBankOwner">
                            </div>
                            <div class="right-content">
                                <label for="userBankName">Nom de la banque</label>
                                <input type="text" placeholder="Nom de votre banque" name="userBankName">
                                <label for="userBankDetails">IBAN</label>
                                <input type="text" name="userBankDetails" placeholder="Votre IBAN">
                            </div>
                        </div>
                        <input type="submit" class="btn" value="Continuer">
                    </form>

                    <form id="step-4" class="hiddenBlock">
                        <h3 class="title">Lutte anti-blanchiment</h3>
                        <div class="sectionContainer">
                            <div class="left-content">
                                <label for="userBankOwner">D'où proviennent vos revenues ?</label>
                                <input type="text" placeholder="Rédigez en quelques mots, d'où proviennent vos revenues" name="userBanOwner">
                                <label for="userBankOwner">Justificatif (Ajouter une fiche de paie ou autres justificatif)</label>
                                <input type="file" name="userRevenues">
                            </div>
                        </div>
                        <input type="submit" class="btn" value="Continuer">
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Fin container -->

    <footer>
            <?php  // Inclure le footer
            include_once('footer.phtml');
            ?>
    </footer>
</body>
</html>

<?php elseif (empty($_SESSION['user_id'])) : // Si utilisateur non connecté, rediriger vers la page de connexion
      redirect('Modules/Authentification/connexion.php'); endif ?>           
