<?php

namespace App\Base;

abstract class ApplicationState
{

    protected Application $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    public abstract function next();

}