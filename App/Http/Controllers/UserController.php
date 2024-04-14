<?php 
use Core\Response;

class UserController {
    public static function index() {
        echo "index page";
    }
    public static function get() {
        Response::view("index", [ "name" => "Hashim Abbas" ]);
    }
}