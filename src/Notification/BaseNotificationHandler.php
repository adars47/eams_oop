<?php

namespace App\Notification;

use App\Model\User;

class BaseNotificationHandler implements Notifier
{

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function accept(NotifierVisitor $visitor)
    {
        $visitor->notifyEmail($this->user);
        $visitor->notifyPushNotification($this->user);
        $visitor->notifySMS($this->user);
    }
}