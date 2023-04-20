<?php

namespace App\ApplicationStates;

class LockdownState extends \App\Base\ApplicationState
{
    public function next()
    {
        echo("LOCKDOWN MODE");die;
    }
}