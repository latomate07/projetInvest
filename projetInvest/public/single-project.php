<?php
namespace Model;

use Controllers\Project;

require_once('Object/controllers/Project.php');

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
    <script src="https://kit.fontawesome.com/1ba83f2b65.js" crossorigin="anonymous"></script> 
    <title><?= $result->projectName; ?></title>
</head>
<body>
    <div class="container">
        <?php include('header.php'); ?>
        <h1 class="title"><?= $result->projectName; ?></h1>
        <h4 class="categorie">Catégorie : <?= $result->projectCategorie; ?></h4>
        <p class="postContent"><?= $result->projectDescription; ?></p>
    </div>
</body>
</html>