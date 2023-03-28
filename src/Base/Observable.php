<?php

namespace App\Base;

interface Observable
{
    public function subscribe($object);

    public function unsubscribe($object);
}