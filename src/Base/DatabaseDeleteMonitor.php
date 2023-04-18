<?php

namespace App\Base;

class DatabaseDeleteMonitor implements Observer
{

    public function notify($args)
    {
        echo("This was logged \n");
        if($args =="%DELETE%")
        {
            //send a slack notification
            //send or email
        }
    }
}