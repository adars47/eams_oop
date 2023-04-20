<?php
namespace App\Scheduler;

use App\Base\Scheduler;

class WelcomeEmailScheduler extends Scheduler
{
    public function execute($payload)
    {
        mail($payload['email'],"Welcome to My E-com Site","Thank you,".$payload['fullName']." for signing up to my site!");
    }
}