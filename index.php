<?php

/* this is the entry point for the php application */

//include autoload.php for loading dependencies
include_once ('vendor/autoload.php');

## fetched a singleton implementation of application
try {
    $application = \App\Base\Application::getInstance();
    if(strtolower($_ENV['lockdown_mode']??"false")=="true")
    {
        echo("LOCKDOWN MODE");die;
    }
    $application::route();
    $application::exitApplication();
}
catch (\App\Exceptions\HTTPMethodNotSupportedException $e)
{

}