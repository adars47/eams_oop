<?php

namespace App\Base;

interface Observer
{

    public function notify($args);

}