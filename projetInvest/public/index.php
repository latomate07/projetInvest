<?php
use Controllers\Project;
use Model\Users;

require_once ('functions.php');
require_once('Object/models/Users.php');
require_once('Object/controllers/Project.php');

$user = new Users();
$project = new Project();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_title() ?></title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="Assets/js/app.js"></script>
    <script src="https://kit.fontawesome.com/1ba83f2b65.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="container">
        <?php include('header.php'); ?>
        <!-------- End header ------------>
        
        <!-------- DIV = Home Main ------------>
        <div class="main">
            <div class="left">
                <?php include('template/left-aside.php'); ?>
            </div><!-- End Aside Left -->
            
            <div class="middle-block">
                <div class="navigationTab">
                    <div class="tab">
                    <h4><a class="thirdtitle active" href="#">Accueil</a></h4>
                    </div>
                    <div class="tab">
                    <h4><a class="thirdtitle" href="#">Récent</a></h4>
                    </div>
                    <div class="tab">
                    <h4><a class="thirdtitle" href="#">Investissement potentiel</a></h4>
                    </div>
                </div> <!-- End navigation bar -->

                <!-- Template du projet -->
                <?php include('template/project-item.php'); ?>
            </div>
            <!--ENd Middle Content -->

            <div class="right">
                <?php include('template/right-aside.php'); ?>
            </div>
        </div>

        <footer>
        <?php  // Inclure le footer
        include('footer.phtml');
        ?>
    </footer>
    </div>

    <script>
        function showAfterClick (parent, child) {
            const parentBlock = document.querySelector(parent),
                child_Block = document.querySelector(child);

            parentBlock.addEventListener('click', () => {
                child_Block.style.opacity="1";
                child_Block.style.visibility="visible";
            })
        }
    </script>
</body>
</html>
