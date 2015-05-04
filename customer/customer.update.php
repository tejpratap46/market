<?php
error_reporting ( 0 );
require ("../connection.php");

$name = $_GET ['name'];
$username = $_GET ['username'];
$email = $_GET ['email'];
$bankid = $_GET ['bankid'];
$gcmid = $_GET ['gcmid'];
$password = $_GET ['password'];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (strlen ( $username ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter all fields ['username']\"}" );
}

if (strlen ( $name ) > 1) {
	$query = mysql_query ( "UPDATE customer SET name='" . $name . "' WHERE username='$username'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $email ) > 1) {
	$query = mysql_query ( "UPDATE customer SET email='" . $email . "' WHERE username='$username'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $password ) > 1) {
	$query = mysql_query ( "UPDATE customer SET password='" . $password . "' WHERE username='$username'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}

if (strlen ( $gcmid ) > 1) {
	$query = mysql_query ( "UPDATE customer SET gcmid='" . $gcmid . "' WHERE username='$username'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}

$query = mysql_query ( "SELECT * FROM customer WHERE username='" . $username . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );

echo "{";
if ($query) {
	$info = mysql_fetch_array ( $query );
	echo "\"status\":1,";
	echo "\"username\":\"" . $info ['username'] . "\",";
	echo "\"name\":\"" . $info ['name'] . "\",";
	echo "\"email\":\"" . $info ['email'] . "\",";
	echo "\"password\":\"" . $info ['password'] . "\",";
	echo "\"bankid\":\"" . $info ['bankid'] . "\"";
} else {
	echo "\"status\":0,";
	echo "\"error\":\"username already taken\"";
}
echo "}";
?>