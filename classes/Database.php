<?php
$dir = dirname( __DIR__ );
include_once $dir . "/classes/Config.php";

/**
 * Database create connection with  database
 *
 * @class Database
 */
class Database {
	private $server = SERVER;
	private $user = USER;
	private $password = PASSWORD;
	private $database = DATABASE;
	public $conn;

	public function __construct() {

		$this->conn = mysqli_connect( $this->server, $this->user, $this->password, $this->database ) or die( "connection failed" );
	}
}//end class Database