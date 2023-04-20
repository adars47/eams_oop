<?php

namespace App\ApplicationStates;

use App\Base\DatabaseFacade;

class NormalState extends \App\Base\ApplicationState
{

    public function next()
    {
        $this->databaseFacade = new DatabaseFacade();
        $this->application::route();

    }

    public function getDatabaseContext(): bool|\mysqli
    {
        return $this->databaseFacade::getDatabaseContext();
    }

}