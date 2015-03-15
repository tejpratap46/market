<?php
error_reporting ( 0 );
require ("../connection.php");

$username = $_GET ["username"];
$password = $_GET ["password"];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (! empty ( $username ) || ! empty ( $password )) {
	echo "{";
	$query = mysql_query ( "SELECT * FROM customer WHERE username = '$username' AND password = '$password'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $query ) == 1) {
		$info = mysql_fetch_array ( $query );
		echo "\"status\":1,";
		echo "\"name\":\"" . $info ['name'] . "\",";
		echo "\"email\":\"" . $info ['email'] . "\",";
		echo "\"username\":\"" . $info ['username'] . "\",";
		echo "\"bankid\":\"" . $info ['bankid'] . "\"";
	} else {
		echo "\"status\":0,";
		echo "\"error\":\"invalid username or password\"";
	}
	echo "}";
}else{
	die ( "{\"status\":0," . "\"error\":\"enter username and password\"}" );
}
?>