<?php 

class UserController {
    public static function index() {
        echo "index page";
    }
    public static function get() {

        $data = "Hashim Abbas";
        include "./resources/index.php";

        
    }
}