<?php
namespace Views;
session_start();

use App\Notifications;
include_once ("/Users/kingbarry/Desktop/projetInvest/object/models/Notifications.php");

class notifViews extends Notifications 

{
    public function show() {
        $user_id = $_SESSION["user_id"];
        $notification = $this->findNotifications($user_id);

        return $notification;
    }
}