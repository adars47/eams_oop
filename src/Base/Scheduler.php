<?php

namespace App\Base;

abstract class Scheduler implements SchedulerInterface
{
    // frequency in cron
    public function schedule($payload)
    {
        $classname = base64_encode(get_class($this));
        $payload = json_encode($payload);
        //write to a local file
        file_put_contents(Application::$base_path.'/../../tmp/Scheduled/'.$classname,$payload." \n",FILE_APPEND | LOCK_EX);
    }

}