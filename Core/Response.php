<?php 
namespace Core;
class Response {
    public static function view($filename, array $data) {
        // echo "./resources/$filename.php";
        extract($data);
        include "./resources/$filename.php";
    }
}