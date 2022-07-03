<?php 

// Récupérer le nom du fichier pour l'afficher
function get_title () {
    $url = basename($_SERVER['PHP_SELF'], '.php');
    return $url;
}

// Raffraîchir la page
function reload() {
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
// Rediriger un utilisateur 
function redirect($url) {
    header("Location: " . $url);
    die();
}

// Récupérer le header
function get_header() {
    $path = __DIR__ . "header.php";
    return $path;
}

// Récupérer le footer
function get_footer() {
    $path = __DIR__ . "footer.php";
    return $path;
}

function showTime() {
    // Récupérer la date 
    $dateTime = new DateTime('now', new DateTimeZone('Europe/Paris')); 
    $displayTime = $dateTime->format("d/m/y à H:i"); 

    return $displayTime;
}