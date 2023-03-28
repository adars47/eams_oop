<?php

namespace App\Base;

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
    public static Database $database_context;
    private static QueryLogger $queryLogger;
    public function __construct()
    {
        //set application root context
        self::$base_path = __DIR__;
        //load .env
        $dotenv = Dotenv::createImmutable(__DIR__."/../../");
        $dotenv->load();

        //create database object
        self::$database_context = new Database();
        self::$queryLogger= new QueryLogger();
        self::$database_context->subscribe(self::$queryLogger);
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

    public static function exitApplication()
    {
        self::$database_context->getConnection()->close();
    }

    public function getDatabaseConnection(): Database
    {
        return self::$database_context;
    }
}