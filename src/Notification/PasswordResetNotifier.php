<?php
namespace App\Notification;

class PasswordResetNotifier implements NotifierVisitor
{
    function notifySMS(\App\Model\User $user)
    {
        $_SESSION['success'][]=[
          "title"=>"Notified user by sms",
          "message"=>"notified user via sms"
        ];
    }

    function notifyEmail(\App\Model\User $user)
    {
        mail($user->properties['email'],"Password Reset","Your password was successfully reset");
    }

    function notifyPushNotification(\App\Model\User $user)
    {
        $_SESSION['success'][]=[
            "title"=>"Push message successfully sent",
            "message"=>"Password was reset and user alerted by push notification"
        ];
    }
}