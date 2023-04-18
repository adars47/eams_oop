<?php
namespace App\Scheduler;

use App\Base\Scheduler;

class WelcomeEmailScheduler extends Scheduler
{
    public function execute($payload)
    {

        var_dump("Email send to ".$payload);
        //pseudo code to send the email
    }
}