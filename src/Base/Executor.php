<?php
namespace App\Base;

class Executor{

    public function __construct()
    {
        $dir = Application::$base_path.'/../../tmp/Scheduled/';
        $files = scandir($dir);
        unset($files[0]);
        unset($files[1]);
        foreach ($files as $file)
        {
            $classname = base64_decode($file);
            $tmp_class = new $classname();

            $jobs = file_get_contents($dir.$file);
            $jobs = explode("\n",$jobs);
            foreach ($jobs as $job)
            {
                if($job!="")
                {
                    call_user_func(array($tmp_class,"execute"),json_decode($job,true));
                }
            }
            unlink($dir.$file);
        }
    }

}

