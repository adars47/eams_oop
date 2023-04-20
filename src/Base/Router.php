<?php
namespace App\Base;

use App\Exceptions\HTTPMethodNotSupportedException;
use App\Exceptions\UrlDoesNotExistException;

class Router
{

    private static $get_routes = [];
    private static $post_routes = [];
    //todo implement these http methods too
    private static $put_routes = [];
    private static $patch_routes = [];
    private static $delete_routes = [];

    public static function get($url,$controller,$function)
    {
        self::$get_routes[$url]=[
          "controller"=>$controller,
          "function"=>$function
        ];
    }

    public static function post($url,$controller,$function)
    {
        self::$post_routes[$url] = [
            "controller"=>$controller,
            "function"=>$function
        ];
    }

    /**
     * @throws HTTPMethodNotSupportedException
     * @throws UrlDoesNotExistException
     */
    public static function handle($basePath): ?array
    {
        // load all routes
        include_once($basePath ."/../route.php");

        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if($method=="GET")
        {
            //search get array
            return self::search($url,self::$get_routes);
        }

        if($method=="POST")
        {
            return self::search($url,self::$post_routes);
        }
        throw new HTTPMethodNotSupportedException();
    }

    /**
     * @throws UrlDoesNotExistException
     */
    private static function search($needle, $haystack): ?array
    {
        foreach($haystack as $key=>$value)
        {
            if($needle==$key)
            {
                return $value;
            }
        }
        throw new UrlDoesNotExistException();
    }




}