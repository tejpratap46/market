<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$username = $_GET ['username'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($username && $password) {
	$query = mysql_query("SELECT * FROM `loyalty` WHERE username='".$username."'") or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}else{
	die ( "{\"status\":0," . "\"error\":\"Enter username, password\"}" );
}
?>