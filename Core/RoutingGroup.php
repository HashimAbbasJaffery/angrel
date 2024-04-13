<?php 

namespace Core;

class RoutingGroup extends Route {
    public static $base_url = "/angrel/";
    public static function check() {
        if(!array_key_exists(($_SERVER["REQUEST_URI"]), self::$routes)) throw new \Exception("Invalid URI");
        [$controller, $method] = self::$routes[$_SERVER["REQUEST_URI"]];

        require "./App/Http/Controllers/{$controller}.php";

        $controller::$method();
    }
}