<?php
include_once "classes/database.php";
$db_connect = new Database();
$conn       = $db_connect->conn;
$contact_id = $_GET['id'];

$sql = "UPDATE contact_info_table SET trash_id=0 WHERE id={$contact_id}";
$result = mysqli_query( $conn, $sql ) or die( "query unsuccessful" );
if ( $result ) {
	header( "Location:{$host}home.php" );
}


?>