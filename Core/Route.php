<?php 

namespace Core;


class Route {
    public static $routes = [];
    public static function get($url, array | callable $hitpoint) {
        if($_SERVER["REQUEST_METHOD"] !== "GET") throw new \Exception("Supported Method Get");
        
        [$controllerName, $method] = $hitpoint;
        

        self::$routes[str_replace("//", "/", $url)] = $hitpoint;
        
    }
    public static function delete($url, $hitpoint) {
        
    }
    public static function put($url, $hitpoint) {
        
    }
    public static function post($url, $hitpoint) {
        
    }

}