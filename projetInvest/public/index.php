<?php
namespace App;

require_once ('functions.php');
require_once('../object/models/Users.php');
require_once('../object/controllers/Project.php');


//require_once('../object/autoload.php');


$user = new Users();
$project = new \Controllers\Project();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_title() ?></title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/app.js" defer></script>
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
                    <h4><a class="thirdtitle" href="#">Favoris</a></h4>
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
            include_once('footer.phtml');
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
