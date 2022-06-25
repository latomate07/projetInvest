<?php
use Model\Users;
require_once ('models/Users.php');

$test = new Users();


$allusers = $test->selectAll();
/*
echo "<pre>";
var_dump($allusers);
echo "</pre>";
*/


$select = $test->selectTest(20);

forEach ($select as $data) {
    echo $data->userPseudo;
}

/*
echo "<pre>";
    var_dump($select);
    echo "</pre>";
*/




