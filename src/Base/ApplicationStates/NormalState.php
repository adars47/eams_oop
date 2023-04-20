<?php

namespace App\Base\ApplicationStates;

use App\Base\ApplicationState;
use App\Base\DatabaseFacade;

class NormalState extends ApplicationState
{

    public function next()
    {
        $this->databaseFacade = new DatabaseFacade();
        $this->application::route();

    }

    public function getDatabaseContext()
    {
        return $this->databaseFacade::getDatabaseContext();
    }

}