<?php

namespace App\Base;

use App\Exceptions\ControllerDoesNotExistException;
use App\Exceptions\HTTPMethodNotSupportedException;
use App\Exceptions\MethodDoesNotExistException;
use App\Exceptions\UrlDoesNotExistException;

class Application
{
    # singleton implementation of application because there can only be one instance
    # of application for each request
    private static Application $app;
    public static String $base_path;
    public function __construct()
    {
        self::$base_path = __DIR__;
    }

    public static function getInstance() :Application
    {
         if(!isset(self::$app))
         {
            self::$app = new Application();
         }
         return self::$app;
    }

    /**
     * @throws HTTPMethodNotSupportedException
     * @throws UrlDoesNotExistException
     * @throws ControllerDoesNotExistException|MethodDoesNotExistException
     */
    public static function route()
    {
        $func_to_exec = Router::handle();
        if(!class_exists($func_to_exec['controller']))
        {
            throw new ControllerDoesNotExistException();
        }
        $instance = new $func_to_exec['controller']();
        //check if the function exists
        if(!method_exists($instance,$func_to_exec['function']))
        {
            throw new MethodDoesNotExistException();
        }
        call_user_func( array( $instance, $func_to_exec['function']));
    }
}