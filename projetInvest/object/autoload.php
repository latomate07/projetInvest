<?php 

spl_autoload_register(function ($className) {
    $path = dirname(__DIR__) . '/' . str_replace("\\", "/", $className) . ".php";

    if (file_exists($path)) {
        require $path;
    }
});