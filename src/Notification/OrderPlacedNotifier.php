<?php
namespace App\Notification;

class OrderPlacedNotifier implements NotifierVisitor
{

    function notifySMS(\App\Model\User $user)
    {
        $_SESSION['success'][]=[
            "title"=>"Notified user by sms",
            "message"=>"Notified user about order placed."
        ];
    }

    function notifyEmail(\App\Model\User $user)
    {
        mail($user->properties['email'],"Password Reset","An order was placed in your account");
    }

    function notifyPushNotification(\App\Model\User $user)
    {
        $_SESSION['success'][]=[
            "title"=>"Push message successfully sent",
            "message"=>"Notified user about order placed."
        ];
    }
}