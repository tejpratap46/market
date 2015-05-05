<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$username = $_GET ['username'];
$message = $_GET ['message'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($username && $message) {
	$query = mysql_query("INSERT INTO `feedback`(`username`, `message`) VALUES ('$username', '$message')") or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	echo "{";
	echo '"status":1,';
	echo '"username":"'.$username.'",';
	echo '"message":"'.$message.'"';
}else{
	die ( "{\"status\":0," . "\"error\":\"Enter username, message\"}" );
}
?>