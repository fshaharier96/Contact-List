<?php
$root = dirname( dirname( __FILE__ ) );
require_once $root . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable( $root );
$dotenv->safeLoad();

// $dbHost = $_ENV['DB_HOST'];
// $dbName = $_ENV['DB_DATABASE'];
// $dbUser = $_ENV['DB_USERNAME'];
// $dbPass = $_ENV['DB_PASSWORD'];


$host = $_ENV['SERVER_URL'];


define( "SERVER", $_ENV['DB_HOST'] );
define( "USER", $_ENV['DB_USERNAME'] );
define( "PASSWORD", $_ENV['DB_PASSWORD'] );
define( "DATABASE", $_ENV['DB_DATABASE'] );

define( "MAIL_HOST", $_ENV['MAIL_HOST'] );
define( "MAIL_PORT", $_ENV['MAIL_PORT'] );
define( "SITE_ROOT", $root );


// echo "this is server variable".SERVER;


//  $host="http://localhost/Contact_List_Project/Contact-List-Local/";
//   // $conn=mysqli_connect('localhost','root','','contact-list') or die("connection failed");
//   define("SERVER","localhost");
//   define("USER","root");
//   define("PASSWORD","");
//   define("DATABASE","contact-list");