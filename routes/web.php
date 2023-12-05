<?php
$dir=dirname(__DIR__);
require_once $dir.'/vendor/autoload.php'; // Include the Composer autoloader

use Bramus\Router\Router;

// Initialize the router
$router = new Router();
$router->setBasePath('/');
// Define routes
$router->get('/', function () {
    require "index.php";
});

$router->get('/login', function () {
    require "login.php";
});

$router->get('/signup', function () {
    require "signup.php";
});

$router->get('/forget-password', function () {
    require "forget_pass.php";

});

// Run the router
$router->run();