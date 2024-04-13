<?php 
// use Core\Route;


spl_autoload_register(function($class) {
    $result = str_replace("\\", "/", $class);
    require "{$result}.php";
});


require "./routes/web.php";

