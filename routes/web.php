<?php
$dir=dirname(__DIR__);
require_once $dir.'/vendor/autoload.php'; // Include the Composer autoloader
require_once $dir . '/classes/View.php';
require_once $dir.'/classes/User.php';

use Bramus\Router\Router;

//Initialize view
$view=new View();

//Initialize user class

$user=new User();


// Initialize the router
$router = new Router();
$router->setBasePath('/');
// Define routes
$router->get('/', function (){
    require "index.php";
    exit;
});


$router->get('/login', function () use ($view) {
    $view->includeView('login.php');
    exit;
});

$router->get('/signup', function () use ($view) {
    $view->includeView('signup.php');
    exit;

});

$router->post('/signup-data', function () {

//    print_r($_POST);
//    echo "this is route fucntion";
    $post=$_POST;
    $user=new User();
     $user->signup($post);
     exit;



});

$router->get('/forget-pass', function () use ($view) {
   $view->includeView("forget_pass.php");
   exit;

});

$router->post('/forget-pass-data', function () {
    require "forget_pass_data.php";
    exit;

});

$router->get('/reset/(\d+)', function ($id1) {

    require "reset_verification.php";
    exit;

});

$router->post('/reset-verification-data/(\d+)', function ($id2) {

    require "reset_verification_data.php";
    exit;

});

$router->get('/newpass-set/(\d+)', function ($id3) {

    require "newpass_set.php";
    exit;

});

$router->post('/newpass-set-data/(\d+)', function ($id4) {

    require "newpass_set_data.php";
    exit;

});
$router->get('/home',function() use ($view){

    $view->includeView('home.php');
    exit;

});




// Run the router
$router->run();