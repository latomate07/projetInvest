<?php

if (isset($_SESSION['user_id'])) {
      $find = $user->findById($_SESSION['user_id']);
}

?>

<aside class="aside-block">
                <!-- Visible pour les utilisateurs non connecté -->
                <?php if ($user->user_is_logged() == false) : ?>
                <div class="card calltoaction">
                    <h2 class="subtitle"><span class="colorThis">TahirouTest</span> est une communauté qui ne vise que la réussite ! </h2>
                    <p class="content">Nous sommes le premier réseau social dédié à l'investissement.</p>
                    <div class="calltoaction">
                        <a class="btn" href="http://localhost:8888/inscription.php">S'inscrire</a>
                        <a class="noBtn" href="http://localhost:8888/connexion.php">Se connecter</a>
                    </div>
                </div> 

                <?php elseif ($user->user_is_logged() && $user->getUserRole($find->id) == "Investisseur" ) : ?>
                <!-- Visible pour les utilisateurs connecté et ayant un rôle d'INVESTISSEUR-->
                <div class="card calltoaction">
                    <h2 class="subtitle">Bonjour, <span class="colorThis"><?= $find->userPseudo ?></span></h2>
                    <!-- Si profil utilisateur est rempli afficher ce qui suit -->
                    <p class="content">Alors, on investi dans quoi aujourd'hui ?</p>
                    <!-- Sinon Demander le remplissage de celui-ci -->
                    <!-- <p class="content">Votre profil n'est pas rempli, veuillez le remplir afin d'investir sur <span class="colorThis">TahirouTest</span></p> -->
                    <div class="calltoaction">
                        <!-- Si profil utilisateur rempli => afficher ce qui suit -->
                        <a class="btn" href="#">Commencer</a>
                        <!-- SInon -->
                        <!-- <a class="btn" href="#">Remplir le profil</a> -->
                    </div>
                </div>

                <?php elseif ($user->user_is_logged() && $user->getUserRole($find->id) == "Entreprise" ) : ?>
                <!-- Visible pour les utilisateurs connecté et ayant un rôle d'INVESTISSEUR-->
                <div class="card calltoaction">
                    <h2 class="subtitle">Bonjour, <span class="colorThis"><?= $find->userPseudo ?></span></h2>
                    <!-- Si profil utilisateur est rempli afficher ce qui suit -->
                    <p class="content">Alors, quel projet souhaitez-vous réaliser aujourd'hui ?</p>
                    <!-- Sinon Demander le remplissage de celui-ci -->
                    <!-- <p class="content">Votre profil n'est pas rempli, veuillez le remplir afin d'investir sur <span class="colorThis">TahirouTest</span></p> -->
                    <div class="calltoaction">
                        <!-- Si profil utilisateur rempli => afficher ce qui suit -->
                        <a class="btn" href="/post-project.php">Commencer</a>
                        <!-- SInon -->
                        <!-- <a class="btn" href="#">Remplir le profil</a> -->
                    </div>
                </div>
                <?php endif ?>

                <div class="aside-block card">
                <!-- Categorie list -->
                <h2 class="subtitle">Nos secteurs</h2>
                <ul class="catList">
                    <li><a class="listItem" href="#"><i class="fa fa-igloo" style="font-size:20px; margin-right:5px;"></i>Immobilier</a></li>
                    <li><a class="listItem" href="#"><i class="fa fa-dumpster-fire" style="font-size:20px; margin-right:5px;"></i>Commerce</a></li>
                    <li><a class="listItem" href="#"><i class="fa fa-desktop" style="font-size:20px; margin-right:5px;"></i>Informatique</a></li>
                    <li><a class="listItem" href="#"><i class="fa fa-utensils" style="font-size:20px; margin-right:5px;"></i>Alimentation</a></li>
                    <li><a class="listItem" href="#"><i class="fa fa-industry" style="font-size:20px; margin-right:5px;"></i>Industrie</a></li>
                    <li><a class="listItem" href="#"><i class="fa fa-plus" style="font-size:20px; margin-right:5px;"></i>Autres</a></li>
                </ul>
                <!-- Useful Link and Help --->
                <h2 class="subtitle forUsefulLinks">Informations & Aide</h2>
                <ul class="usefulLinks">
                    <li><a class="listItem" href="#"><i class="fa fa-arrow-right" style="font-size:20px; margin-right:5px;"></i>Qui sommes-nous ?</a></li>
                    <li><a class="listItem" href="#"><i class="fa fa-arrow-right" style="font-size:20px; margin-right:5px;"></i>Mentions légales</a></li>
                    <li><a class="listItem" href="#"><i class="fa fa-arrow-right" style="font-size:20px; margin-right:5px;"></i>Confidentialité</a></li>
                    <li><a class="listItem" href="#"><i class="fa fa-arrow-right" style="font-size:20px; margin-right:5px;"></i>Devenir Investisseur</a></li>
                    <li><a class="listItem" href="#"><i class="fa fa-arrow-right" style="font-size:20px; margin-right:5px;"></i>Aide & Support</a></li>
                </ul>
                </div>
                <!-- End Category -->   
</aside>