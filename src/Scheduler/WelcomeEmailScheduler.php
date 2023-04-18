<?php
namespace App\Scheduler;

use App\Base\Scheduler;

class WelcomeEmailScheduler extends Scheduler
{
    public function execute($payload)
    {

        var_dump("FROM EXECUTE FUNCTION");
        var_dump($payload);

        //pseudo code to send the email
    }
}