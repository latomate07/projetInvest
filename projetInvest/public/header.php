<?php 
use Model\Users;
require_once('Object/models/Users.php');

$user = new Users();
$user_id = $user->getId();

if (!empty($_SESSION['user_id'])) {
        $current_id = $_SESSION['user_id'];
        $find = $user->findById($current_id);
} 

// $userData = $user->selectById($user_id);

?>
<header>
    <div class="headerContainer">
                <!-- Visible uniquement sur mobile -->
                <div class="burgerMenu authAction">
                    <i class="fa fa-bars"></i>
                </div>

                <div class="logoDiv">
                     <h1><a href="http://localhost:8888/public/">Logo</a></h1>
                </div>
                <div class="searchBar">
                    <input type="search" placeholder="Trouver un projet..." class="searchInput" id="seatchInput">
                    <button type="submit" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" class="crayons-icon c-btn__icon" focusable="false"><path d="m18.031 16.617 4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"></path></svg></button>
                </div>
                
                <?php if ($user->user_is_logged() == false) : ?>
                <!-- Show this when user is not connected -->
                <div class="auth">
                        <a class="noBtn" href="http://localhost:8888/public/modules/authentification/connexion.php">Connexion</a>
                        <a class="btn" href="http://localhost:8888/public/modules/authentification/inscription.php">Inscription</a>
                </div>

                <?php elseif ($user->user_is_logged()) : ?>
                <!-- Show this when user is connected -->
                <div class="auth authAction">
                        <a href="#" class="notifications"><i class="fa fa-bell"></i></a>
                        <a href="#" class="viewMore"><i class="fa fa-compass"></i></a>
                        <div class="block-content">
                           <ul class="tools-list">
                               <li><a><i class="fa fa-user"></i><h5>Profil</h5></a></li>
                               <li><a><i class="fa fa-file-signature"></i><h5>Contrat</h5></a></li>
                               <li><a><i class="fa fa-users"></i><h5>Inviter un ami</h5></a></li>
                               <li><a><i class="fa fa-gear"></i><h5>Paramètre</h5></a></li>
                               <li><a><i class="fa fa-bolt"></i><h5>Abonnement</h5></a></li>
                               <li><a><i class="fa fa-info"></i><h5>Centre d'aide</h5></a></li>
                           </ul>
                           <a class="logoutBtn" href="logout.php">Déconnexion</a>
                        </div>

                        <?php  if(!empty($user->get_user_avatar($find->id))) : ?>
                                <a href="#" class="userLink"><img src="<?php $find->userLogo; ?>"  alt="photo de profil" width="30px" height="30px" class="userLogo"><h4 class="userName">Barry</h4></a>
                        <?php  elseif ($user->get_user_avatar($_SESSION['user_id']) == NULL) : ?>
                                <a href="#" class="userLink"><img src="http://localhost:8888/public/media/avatar.png"  alt="photo de profil" width="30px" height="30px" class="userLogo"><h4 class="userName"><?= $find->userPseudo ; ?></h4></a>      
                        <?php endif ?>                      
                </div>

                <?php endif; ?>
        </div>
</header>
