<?php
error_reporting ( 0 );
require ("../connection.php");

$name = $_GET ['name'];
$username = $_GET ['username'];
$email = $_GET ['email'];
$bankid = $_GET ['bankid'];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (strlen ( $username ) > 0) {
	$query = mysql_query ( "SELECT * FROM customer WHERE username LIKE '%" . $username . "%'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
} else if (strlen ( $name ) > 0) {
	$query = mysql_query ( "SELECT * FROM customer WHERE name LIKE '%" . $name . "%'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
} else if (strlen ( $email ) > 0) {
	$query = mysql_query ( "SELECT * FROM customer WHERE email LIKE '%" . $email . "%'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
} else if (strlen ( $bankid ) > 0) {
	$query = mysql_query ( "SELECT * FROM customer WHERE bankid LIKE '%" . $bankid . "%'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
} else {
	die ( "{\"status\":0," . "\"error\":\"enter name or email or id or bankid\"}" );
}

echo "{";
echo "\"status\":1,";
echo "\"results\":" . mysql_num_rows ( $query ) . ",";
echo "\"customers\":[";
for($i = 0; $i < mysql_num_rows ( $query ); $i ++) {
	$info = mysql_fetch_array ( $query );
	if ($i + 1 == mysql_num_rows ( $query )) {
		echo "{";
		echo "\"name\":\"" . $info ['name'] . "\",";
		echo "\"email\":\"" . $info ['email'] . "\",";
		echo "\"bankid\":\"" . $info ['bankid'] . "\"";
		echo "}";
	} else {
		echo "{";
		echo "\"name\":\"" . $info ['name'] . "\",";
		echo "\"email\":\"" . $info ['email'] . "\",";
		echo "\"bankid\":\"" . $info ['bankid'] . "\"";
		echo "},";
	}
}
echo "]";
echo "}";
?>