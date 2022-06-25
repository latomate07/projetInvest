<?php 

spl_autoload_register(function ($className) {
    str_replace("\\", "/", $className);

    require_once("controllers/$className.php");
    require_once("models/$className.php");
});