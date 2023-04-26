<?php

namespace App\Notification;


interface Notifier
{
    public function accept(NotifierVisitor $visitor);
}