<?php

namespace App\Base\ApplicationStates;

use App\Base\ApplicationState;

class LockdownState extends ApplicationState
{
    public function next()
    {
        echo("LOCKDOWN MODE");die;
    }
}