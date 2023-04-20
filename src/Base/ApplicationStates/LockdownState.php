<?php

namespace App\ApplicationStates;

use App\Base\Application;

class LockdownState extends \App\Base\ApplicationState
{
    public function next()
    {
        echo("LOCKDOWN MODE");die;
    }
}