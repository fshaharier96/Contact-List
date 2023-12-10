<?php
$dir = dirname(__DIR__);
require_once $dir . '/vendor/autoload.php'; // Include the Composer autoloader
require_once $dir . '/classes/View.php';
require_once $dir . '/classes/User.php';

use Bramus\Router\Router;

//Initialize view
$view = new View();

//Initialize user class

$user = new User();


// Initialize the router
$router = new Router();
$router->setBasePath('/');
// Define routes
$router->get('/', function () {
    require "index.php";
    exit;
});


$router->get('/login', function () use ($view) {
    $view->includeView('login.php');
    exit;
});

$router->post('/login-data', function () {
    $post = $_POST;
    $user = new User();
    $user->login($post);
    exit;
});

$router->get('/signup', function () use ($view) {
    $view->includeView('signup.php');
    exit;

});

$router->post('/signup-data', function () {

//    print_r($_POST);
//    echo "this is route fucntion";
    $post = $_POST;
    $user = new User();
    $user->signup($post);
    exit;

});

$router->get('/forget-pass', function () use ($view) {
    $view->includeView("forget_pass.php");
    exit;

});

$router->post('/forget-pass-data', function () {
    $post = $_POST;
    $user = new User();
    $user->reset_email_verification($post);
    exit;


});

$router->get('/reset/(\d+)', function ($id1) {
    global $dir;
    require $dir . "/resources/views/reset_verification.php";
    exit;

});

$router->post('/reset-verification-data/(\d+)', function ($id2) {

    $post = $_POST;
    $user = new User();
    $user->reset_code_verification($post, $id2);
    exit;

});

$router->get('/newpass-set/(\d+)', function ($id3) {

    global $dir;
    require $dir . "/resources/views/newpass_set.php";
    exit;

});

$router->post('/newpass-set-data/(\d+)', function ($id4) {

    $post = $_POST;
    $user = new User();
    $user->newpass_set($post, $id4);
    exit;

});

$router->get('/home', function () use ($view) {
    $view->includeView('home.php');
    exit;
});


// Run the router
$router->run();