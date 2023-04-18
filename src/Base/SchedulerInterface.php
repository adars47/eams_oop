<?php

namespace App\Base;

interface SchedulerInterface
{
    public function execute($payload);

}