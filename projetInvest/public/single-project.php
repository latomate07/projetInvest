<?php
namespace App;

use Controllers\Project;

require_once('../object/controllers/Project.php');

$project = new Project();
$projectId = $_GET['id'];

$result = $project->findById($projectId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/app.js" defer></script>
    <script src="assets/js/singleProject/script.js" defer></script>
    <script src="https://kit.fontawesome.com/1ba83f2b65.js" crossorigin="anonymous"></script> 
    <title><?= $result->projectName; ?></title>
</head>
<body id="sg-body"> <!-- Single Project Body = sg-body -->
    <div class="container">
        <?php include('header.php'); ?>

        <div class="singleProject">
            <div class="topContent"> <!-- Introduction du projet -->
                
                <div class="left"> <!-- Illustration du projet -->
                    <img class="illustration" src="https://images.pexels.com/photos/162140/duckling-birds-yellow-fluffy-162140.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2">
                </div>

                <div class="right">
                    <div class="top-side">
                    <h3 class="projectTitle"><?= $result->projectName; ?></h3>
                    <div class="author">
                        <img class="avatar" src="https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" width:"10px" height:"0">
                        <span class="authorName"><strong><?= $result->userName ?></strong></span>
                    </div>
                    <p class="authorDescription">
                        loremIpsum bla-bla-bla bla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-bla
                    </p>
                    </div>
                    <div class="bottom-side">
                    <span class="statement">
                        <strong>234€</strong> récolté sur <strong><?= $result->projectAmount ?>€</strong>
                    </span> 
                    <span class="userLikeIt">Nb. d'Investisseur ayant investi à ce projet : <strong>10</strong></span>
                    </div>
                </div>
                
            </div> <!-- Fin introduction -->
            
            <div class="bottomContent">
                <div class="left-side">
                    <nav>
                    <ul class="navList">
                        <li class="activeNav" id="navOne">Projet</li>
                        <li id="navTwo">Entreprise</li>
                        <li id="navThree">Finance</li>
                        <li id="navFour">Commentaire</li>
                    </ul>
                    </nav>
                    <hr> <!-- Séparateur -->
                    <div id="projet" class="active">
                        <p><?= $result->projectDescription ?></p>
                    </div>
                    <div id="entreprise" style="display:none;">
                        <p>Je suis l'entreprise haha</p>
                    </div>
                    <div id="finance" style="display:none;">
                        <p>Je suis la finance de l'entreprise haha</p>
                    </div>
                    <div id="commentaire" style="display:none;">
                        <p>Je suis le commentaire de l'entreprise haha</p>
                    </div>
                </div>
                
                <div class="right-side">
                <h3 class="amount">Objectif : <?= $result->projectAmount ?> €</h3>
                <div class="progress">
                    <div class="bar"><div class="progressBar"></div></div>
                    <h5 class="stats">234€ ont été investi dans ce projet</h5>
                </div>
                <hr> <!-- Séparateur -->
                <div class="infos">
                    <div class="roi">
                    <span class="spanTitle">Taux par <?= $result->vduROI ?></span>
                    <span class="result"><?= $result->tauxdeprofit ?> %</span>
                    </div>
                    <div class="time">
                    <span class="spanTitle">Durée</span>
                    <span class="result"><?= $result->campaignTime ?></span>
                    </div>
                    <div class="risque">
                    <span class="spanTitle">Risque</span>
                    <span class="result">Modéré</span>
                    </div>
                </div>
                <div class="action">
                    <form id="invest">
                        <div class="amountToInvest">
                            <label for="investAmount" class="currency">
                                €
                                <input type="number" class="putAmount" id="investAmount" value="<?= $result->minInvest ?>">

                                <!-- Envoyer montant d'investissement minimum du projet pour traitement JS -->
                                <input type="hidden" id="minInvest" value="<?= $result->minInvest ?>">
                            </label>
                        </div>
                        <div class="process">
                            <input type="submit" class="btn" value="Investir">
                            <a class="contactme" href="javascript:void(0)">Envoyer un message</a>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include('footer.phtml'); ?>
    </footer>

    <div class="alert-notification">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 493.636 493.636" style="enable-background:new 0 0 493.636 493.636;" xml:space="preserve">
        <g><g><path d="M421.428,72.476C374.868,25.84,312.86,0.104,246.724,0.044C110.792,0.044,0.112,110.624,0,246.548
                    c-0.068,65.912,25.544,127.944,72.1,174.584c46.564,46.644,108.492,72.46,174.4,72.46h0.58v-0.048
                    c134.956,0,246.428-110.608,246.556-246.532C493.7,181.12,468,119.124,421.428,72.476z M257.516,377.292
                    c-2.852,2.856-6.844,4.5-10.904,4.5c-4.052,0-8.044-1.66-10.932-4.516c-2.856-2.864-4.496-6.852-4.492-10.916
                    c0.004-4.072,1.876-8.044,4.732-10.884c2.884-2.86,7.218-4.511,11.047-4.542c3.992,0.038,7.811,1.689,10.677,4.562
                    c2.872,2.848,4.46,6.816,4.456,10.884C262.096,370.46,260.404,374.432,257.516,377.292z M262.112,304.692
                    c-0.008,8.508-6.928,15.404-15.448,15.404c-8.5-0.008-15.42-6.916-15.416-15.432L231.528,135
                    c0.004-8.484,3.975-15.387,15.488-15.414c4.093,0.021,7.895,1.613,10.78,4.522c2.912,2.916,4.476,6.788,4.472,10.912
                    L262.112,304.692z"/>
            </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
        </svg>
        <p class="content" id="notifContent"></p>
     </div>
</body>
</html>