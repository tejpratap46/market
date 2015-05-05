<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$username = $_GET ['username'];
$password = $_GET ['password'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($username && $password) {
	$query = mysql_query("SELECT * FROM `manager` WHERE username='".$username."' AND password='".$password."'") or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) == 1) {
		mysql_query("UPDATE manager SET last_login='".date ( "d-m-y H:i:s" )."' WHERE username='$username')") or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		echo '{"status":1,';
		echo '"username":"'.$username.'"';
		echo "}";
	}else{
		die ( "{\"status\":0," . "\"error\":\"invalid username Or password\"}" );
	}
}else{
	die ( "{\"status\":0," . "\"error\":\"Enter username, password\"}" );
}
?>