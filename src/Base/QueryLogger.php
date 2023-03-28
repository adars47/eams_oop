<?php

namespace App\Base;

class QueryLogger implements Observer
{
    public function notify($query)
    {
        file_put_contents(Application::$base_path.'/../../logs/log.txt',$query." \n",FILE_APPEND | LOCK_EX);
    }
}