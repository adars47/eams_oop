<?php
namespace App\Notification;


class LoggedInNotifier implements NotifierVisitor
{
    function notifySMS(\App\Model\User $user)
    {
        $_SESSION['success'][]=[
            "title"=>"Notified user by sms",
            "message"=>"Notified user about account logged in."
        ];
    }

    function notifyEmail(\App\Model\User $user)
    {
        mail($user->properties['email'],"Password Reset","Notified user about account logged in");
    }

    function notifyPushNotification(\App\Model\User $user)
    {
        $_SESSION['success'][]=[
            "title"=>"Push message successfully sent",
            "message"=>"Notified user about account logged in."
        ];
    }

}