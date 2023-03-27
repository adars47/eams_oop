<?php

class Router
{

    private static $get_routes = [];
    private static $post_routes = [];

    public static function handle()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=="get")
        {
            //search get
        }

        if($method=="post")
        {

        }
    }

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


}