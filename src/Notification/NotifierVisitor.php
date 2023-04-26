<?php
namespace App\Notification;

use App\Model\User;

interface NotifierVisitor
{
    function notifySMS(User $user);
    function notifyEmail(User $user);
    function notifyPushNotification(User $user);
}