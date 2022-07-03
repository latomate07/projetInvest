<?php
use App\Notifications;
require_once ('../../object/models/Notifications.php');
require_once ("../ajax/ajax.php");

/*
$notification = new Notifications();


$object = "Tu as bien reçu le message ? ";
$message = "Veuillez à tout prix acheter notre abonnement !! Grrrrrr";
$receiver_id = 38;
$date = date("d/m/Y");
$status = 0;

echo "<pre>";
var_dump($notification->sendNotifications($object, $message, $receiver_id, $date, $status));
echo "</pre>";
*/

/*
$userNotification = $notification->findNotifications(24);

foreach($userNotification as $test) :
echo "<pre>";
var_dump($test->subject ?? "Aucune notification a été trouvé");
var_dump($test->message ?? "Aucune notification a été trouvé");
var_dump($test->time ?? "Aucune notification a été trouvé");

echo "</pre>";
endforeach;
*/
