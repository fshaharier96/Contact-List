<?php
//include database connection params
include_once "classes/database.php";

$db_connect = new Database();
$conn       = $db_connect->conn;

$user_id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

if ( $user_id > 0 ) {
	$sql = "DELETE FROM  contact_info_table WHERE id={$user_id}";

	$result = mysqli_query( $conn, $sql ) or die( "query failed" );
	if ( $result ) {
		header( "Location:{$host}" );
	} else {
		echo "this record can not be deleted";
	}
}

