<?php

namespace App\Base;

use App\Base\ApplicationStates\LockdownState;
use App\Base\ApplicationStates\NormalState;
use App\Exceptions\ControllerDoesNotExistException;
use App\Exceptions\HTTPMethodNotSupportedException;
use App\Exceptions\MethodDoesNotExistException;
use App\Exceptions\UrlDoesNotExistException;
use Dotenv\Dotenv;

class Application
{
    # singleton implementation of application because there can only be one instance
    # of application for each request
    private static Application $app;
    public static String $base_path;
    public static ApplicationState $appState;

    public function __construct()
    {
        //set application root context
        self::$base_path = __DIR__;
        //load .env
        $dotenv = Dotenv::createImmutable(__DIR__."/../../");
        $dotenv->load();

        if(strtolower($_ENV['lockdown_mode']??"false")=="true")
        {
            self::$appState = new LockdownState($this);
        }
        else
        {
            self::$appState = new NormalState($this);
        }
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
        $func_to_exec = Router::handle(self::$base_path);
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

    public static function exitApplication(): void
    {
        self::$appState->getDatabaseContext()->getConnection()->close();
    }

    public static function getDatabaseConnection()
    {
        return self::$appState->getDatabaseContext();
    }

    public function setState(ApplicationState $applicationState): void
    {
        self::$appState = $applicationState;
    }
}