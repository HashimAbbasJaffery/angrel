<?php 
use Core\RoutingGroup as Route;

Route::get("/", [UserController::class, "index"]);
Route::get("/users", [UserController::class, "get"]);





Route::check();