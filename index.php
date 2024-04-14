<?php 
// use Core\Route;
require_once "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

spl_autoload_register(function($class) {
    $result = str_replace("\\", "/", $class);
    require "{$result}.php";
});


require "./routes/web.php";

