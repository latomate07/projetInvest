<?php
namespace App;

require_once ('functions.php');
require_once('../object/controllers/Project.php');
require_once('../object/models/Users.php');
require_once ('project/actions.php'); // Fichier incluant la logique de cette page

$user = new Users();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_title() ?></title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/app.js" defer></script>
    
    <?php if ($user->user_is_logged()) : // Chargé les fichiers suivant uniquement lorsque l'utilisateur est connecté !?> 
        <script src="assets/js/postProject/script.js" defer></script>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <?php endif; ?>

    <script src="https://kit.fontawesome.com/1ba83f2b65.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="container">
        <?php 
            include_once('header.php'); 
            if ($user->user_is_logged()  && $user->getUserRole($find->id) == "Entreprise") :  // SI l'utilisateur est connecté et qu'il a le rôle Entreprise, Afficher le formulaire
        ?>
        <div class="post-project">
            <h2 class="title" style="text-align:center;">Publier un projet</h2>
            <div class="nav-bar">
                <ul class="list">
                    <li class="stepActive" id="step-1"><span class="step">1</span><h5 class="title">Préface</h5></li>
                    <li class="" id="step-2"><span class="step">2</span><h5 class="title">Avantages</h5></li>
                    <li class="" id="step-3"><span class="step">3</span class="step"><h5 class="title">Description</h5></li>
                    <li class="" id="step-4"><span class="step">4</span class="step"><h5 class="title">Médias</h5></li>
                </ul>
            </div>
            
            <div class="forms">
                <form id="postProject">

                    <!-- Étape 1 -->

                    <div id="stepOne">
                        <div class="topContent">
                            <h2 class="title">Rédigez l'introduction de votre projet</h2>
                            <p class="subtitle">Faites une bonne première impression, présentez les objectifs de votre projet et incitez les gens à en savoir plus et à y investir.</p>
                        </div>

                        <!-- Conteneur de statuts -->
                        <span id="stepOneError" class="error" style="display:none">Veuillez remplir tout les champs !</span>

                        <div class="inputArea">
                            <label for="postName" class="bold">Titre</label>
                            <input type="text" placeholder="Ex: Financement du stock de l'entreprise" class="inputs" name="postName" id="postName" required>
                             <!-- Conteneur de statuts -->
                            <span id="titleMinLength" style="display:none; color:red; margin-bottom:10px;">Votre titre doit contenir plus de 20 caractères !</span>
                            
                            <label for="categorie" class="bold">Catégorie</label>
                            <select class="inputs" name="categorie" id="categorie" required>
                                <option value="">Choisir une catégorie</option>
                                <option value="Immobilier">Immobilier</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Informatique">Informatique</option>
                                <option value="Alimentation">Alimentation</option>
                                <option value="Industrie">Industrie</option>
                                <option value="Santé">Santé</option>
                                <option value="Autres">Autres</option>
                            </select>

                            <label for="postPlace" class="bold">Lieu du projet</label>
                            <input type="text" placeholder="Ajouter une ville ou un pays" class="inputs" name="postPlace" id="postPlace" required>

                            <label for="postAmount" class="bold">Objectif Financier (€)</label>
                            <input type="number" step="any" placeholder="Montant de l'objectif fixé" class="inputs" name="postAmount" id="postAmount" required>
                        </div>

                        <div class="actions">
                            <a href="javascript:void(0)"class="submitBtn next" id="submitFirstStep">Suivant<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <!-- Étape 2 -->

                    <div id="stepTwo" class="stepInactive">
                        <div class="topContent">
                            <h2 class="title">Créez les avantages de la contribution</h2>
                            <p class="subtitle">Les avantages sont des intérêts versés aux investisseurs en échange de leur soutien financier.</p>
                        </div>
                        
                        <!-- Conteneur de statuts -->
                        <span id="stepTwoError" class="error" style="display:none">Veuillez remplir tout les champs !</span>

                        <div class="inputArea">

                            <label for="tauxdeprofit" class="bold">Intérêts que bénéficiera l'investisseur (en %)</label>
                            <input type="number" step="any" placeholder="Pourcentage de l'intérêt" class="inputs" name="tauxdeprofit" id="tauxdeprofit" required>

                            <label for="vduRoi" class="bold">Délai du retour de l'investissement</label>
                            <select name="vduRoi"  id="vduRoi" required>
                                <option value="Trimestre">Chaque Trimestre</option>
                                <option value="Semestre">Chaque Semestre</option>
                                <option value="Année">Chaque Année</option>
                            </select>

                            <label for="campaignTime" class="bold">Durée de la campagne</label>
                            <select name="campaignTime"  id="campaignTime"required>
                                <option value="6 mois">6 mois</option>
                                <option value="12 mois">12 mois</option>
                                <option value="18 mois">18 mois</option>
                                <option value="24 mois">24 mois</option>
                                <option value="30 mois">30 mois</option>
                                <option value="36 mois">36 mois</option>
                            </select>

                            <label for="minInvest" class="bold">Montant minimum d'investissement (€)</label>
                            <input type="number" step="any" placeholder="Montant minimum" class="inputs" name="minInvest" id="minAmount" required>
                        </div>

                        <div class="actions">
                            <a href="javascript:void(0)"class="submitBtn return" id="returnSecondStep"><i class="fa fa-arrow-left"></i>Précédent</a>
                            <a href="javascript:void(0)"class="submitBtn next" id="submitSecondStep">Suivant<i class="fa fa-arrow-right"></i></a>
                        </div>

                    </div>
                    
                    <!-- Étape 3 -->
                    <div id="stepThree" class="stepInactive">
                        <div class="topContent">
                            <h2 class="title">Expliquez clairement l'objectif de votre projet</h2>
                            <p class="subtitle">Fournissez des détails qui inciteront les gens à investir. Une bonne description est convaincante, informative et facile à comprendre.</p>
                        </div>

                        <div class="inputArea" id="description">
                            <label for="projectDescription" class="bold">Décrivez votre projet (3000 mots max)</label>
                            <textarea name="projectDescription" cols="30" rows="10" class="inputs" id="projectDescription" required></textarea>
                        </div>

                        <!-- Conteneur de statuts -->
                        <span id="stepThreeError" class="error" style="display:none">Veuillez remplir la description !</span>
                        <span id="descMinLength" style="display:none; color:red;">Votre description doit contenir au moins 500 caractères !</span>
                        <span id="descMaxLength" style="display:none; color:red;">Votre description ne doit pas dépasser 3000 caractères !</span>

                        <div class="actions">
                            <a href="javascript:void(0)"class="submitBtn return" id="returnThirdStep"><i class="fa fa-arrow-left"></i>Précédent</a>
                            <a href="javascript:void(0)"class="submitBtn next" id="submitThirdStep">Suivant<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>  
                    
                    <!-- Étape 4 -->
                    <div id="stepFour" class="stepInactive">
                        <div class="topContent">
                            <h2 class="title">Illustrez votre projet avec une image et/ou vidéo</h2>
                            <p class="subtitle">Ajoutez une vidéo et/ou une image qui apparaîtra en haut de la page de votre campagne. Les campagnes ayant des vidéos recueillent 2000% de plus que les campagnes sans vidéos. Durée idéale de votre vidéo : 2-3 minutes.</p>
                        </div>

                        <div class="upload-tool">
                            <div class="topContent">
                                <img src="https://campoal.com/peace/wp-content/themes/campoal/images/image-placeholder-drop.svg" width="128" class="illustation-svg">
                                <input type="file" class="fileInput inputs" multiple id="image">

                                <!-- Conteneur de statuts -->
                                <span id="stepFourError" class="error" style="display:none">Veuillez ajouter au moins une photo !</span>
                                
                            </div>

                            <input type="text" placeholder="https://liendemavideoyoutube.com" class="inputs" name="youtubeVideo" id="video">
                        </div>

                        <div class="actions">
                            <a href="javascript:void(0)"class="submitBtn return" id="returnFourStep"><i class="fa fa-arrow-left"></i>Précédent</a>
                            <input type="submit" class="submitBtn" value="publier" id="submitAll" name="submit">
                        </div>
                    </div>

                    <!-- Terminé -->
                    <div id="successForm" class="stepInactive">
                            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_uu0x8lqv.json"  background="transparent"  style="margin:0 auto;" speed="1"  style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                            <h4 style="text-align:center">Votre projet a été soumis avec succès.</h4>
                            <!-- <a href="javascrip:void(0)" class="btn">Voir le projet</a> -->
                    </div>

                    <?php if (isset($pdoErreur) && !empty($pdoErreur)) : // Si une erreur s'est produite, afficher le contenu suivant?> 
                        <!-- Erreur -->
                        <div id="errorForm" class="stepInactive">
                        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_0pgmwzt3.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; margin:0 auto;"  loop  autoplay></lottie-player>
                                <h4 style="text-align:center"><?= $pdoErreur; ?></h4>
                                <button href="javascrip:void(0)" class="btn" onclick="returnToHome()">Retourner à la page d'accueil</button>
                        </div>
                    <?php endif ?>

                </form> <!-- Fin du formulaire -->
            </div>
        </div>

        <?php elseif ($user->user_is_logged() && $user->getUserRole($find->id) == "Investisseur") : ?> 
        <div class="notInvited">
            <h1 style="text-align:center;"> Vous devez avoir le rôle d'Entreprise afin de pouvoir publier un projet ! </h1>
            <div class="actions" style="display:flex; align-items:center; margin:10px; justify-content:center;">
                <a class="btn">Changer de rôle</a>
                <p style="margin:0 10px;">Ou</p>
                <a class="btn">Créer un nouveau compte</a>
            </div>
        </div>
        <?php else : ?> <!-- Si l'utilisateur n'est pas connecté, Cacher le formulaire ! -->
        <div class="notInvited">
            <h1 style="text-align:center;"> Vous devez vous connecter pour publier un projet ! </h1>
        </div>  
        <?php endif ?>  <!-- Fin de la vérification -->

        <footer>
            <?php include_once('footer.phtml'); ?>
        </footer>

    </div>
</body>
</html>