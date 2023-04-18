<?php

namespace App\Base;

use App\Exceptions\ViewDoesNotExistException;

class Controller
{

    /**
     * @throws ViewDoesNotExistException
     */
    public static function render($filename,$args)
    {
        $app = Application::getInstance();
        if(!file_exists($app::$base_path."/../View/".$filename.".php"))
        {
            throw new ViewDoesNotExistException();
        }

        include_once ($app::$base_path."/../View/".$filename.".php");
        die;
    }

    public static function getParams()
    {
        return [
            "get"=>$_GET,
            "post"=>$_POST
        ];
    }

}