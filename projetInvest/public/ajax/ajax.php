<?php
use Views\notifViews;

require_once ("../../object/views/notifications.php");
//require_once ("/Users/kingbarry/Desktop/projetInvest/object/views/Notifications.php");

$notification = new notifViews();
$find = $notification->show();

foreach ($find as $show) :
    $data = [
        "sujet" => $show->subject,
        "message" => $show->message
    ];

    echo json_encode($data) ?? "Aucune notification n'a été trouvée";
endforeach;