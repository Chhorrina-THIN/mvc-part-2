<?php
require_once "Router.php";
require_once 'Controllers/BaseController.php';
require_once "Database/Database.php";
require_once "Controllers/WelcomeController.php";
require_once "Controllers/UsersController.php";


$route = new Router();
$route->get("/", [WelcomeController::class, 'welcome']);

// ---------Users------------------
$route->get("/users", [UsersController::class, 'index']);
$route->get("/users/create", [UsersController::class, 'create']);
$route->post("/users/store", [UsersController::class, 'store']);
$route->delete("/users/delete/{id}", [UsersController::class, 'destroy']);
$route->get("/users/edit/{id}", [UsersController::class, 'edit']);
$route->put("/users/update/{id}", [UsersController::class, 'update']);

$route->route();
