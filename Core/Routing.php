<?php 

namespace Core;

class RoutingGroups {
    public static $routes = [];

    public static function add($controller, $hitpoint) {
        self::$routes[$hitpoint] = $controller;
    }
}