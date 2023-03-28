<?php

namespace App\Base;

class Logger implements Observer
{
    public function notify()
    {
        $fp = fopen('somefile', 'a');
        fwrite($fp, $data);

        //log
    }
}