<?php
use Controllers\Project;
use Model\Users;
require_once('Object/controllers/Project.php');

   $project = new Project();
   $result = $project->show();
   $user = new Users();
   $user_id = $user->getId();
  // $user_id = $_SESSION['user_id'];

   if (!empty($user_id)) {
        $find = $user->findById($user_id); // To get user Info 
   }
?>

<?php 
foreach ($result as $post) : 
?> 
 <!-- Start POST TEMPLATE -->
 <div class="project">
                <div class="topContent">
                <div class="left">

                <?php  // if(!empty($user->get_user_avatar($find->id))) : ?>
                   <!--  <img src="<?php // $post->userLogo; ?>" width="50px" height="50px" class="userLogo"> -->
                <?php  // elseif (empty($user->get_user_avatar($find->id))) : ?>
                    <a href="#" class="userLink"><img src="http://localhost:8888/public/media/avatar.png"  alt="photo de profil" width="50px" height="50px" class="userLogo"></a>
                <?php  // endif ?>                      
                    <div class="usersInformation">
                    <h3 class="username"> <?=  $post->userName; ?> </h3>
                    <p class="publishdate">Publié le : <?= $post->projectPostDate; ?></p>
                    </div>
                </div>
                <div class="right">
                    <h5 class="viewProfil"><a class="btn" href="#">Voir le profil</a></h5>
                </div>
                </div>
                <div class="projectContent">
                <h3 class="title"><?= $post->projectName; ?></h3>
                <p class="content"><?= $post->projectDescription; ?></p>
                </div>
                <hr> <!-- Separateur -->
                <div class="projectInfo">
                <div class="item">
                    <h5 class="item-info">Montant Souhaité : <?= $post->projectAmount; ?> <span class="currency">€</span></h5>
                </div>
                <div class="item">
                    <h5 class="item-info">Intérêt : <?= $post->tauxdeprofit; ?> %</h5>
                </div>
                <div class="item">
                    <h5 class="item-info">Versement du ROI par : <?= $post->vduROI; ?></h5>
                </div>
                </div>
                <div class="reaction">
                <div class="like">
                    <p><a class="reactionBtn" href="#"><i class="fa fa-thumbs-up" style="margin-right:5px"></i>J'aime</a></p>
                </div>
                <div class="investir">
                    <p><a class="reactionBtn" href="/public/single-project.php?id=<?= $post->id; ?>"><i class="fa fa-chart-pie" style="margin-right:5px"></i>Investir</a></p>
                </div>
                <div class="discuss">
                    <p><a class="reactionBtn" href="#"><i class="fa fa-comments-dollar" style="margin-right:5px;"></i>Contacter</a></p>
                </div>
                </div>
 </div>

<?php
 endforeach; 
?>