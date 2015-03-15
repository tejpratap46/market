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

if ($username) {
	echo "{";
	$query = mysql_query ( "SELECT * FROM lists WHERE customerid='" . $username . "' ORDER BY listid DESC" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	echo "\"status\":1,";
	echo "\"results\":" . mysql_num_rows ( $query ) . ",";
	echo "\"lists\":[";
	for($i = 0; $i < mysql_num_rows ( $query ); $i ++) {
		$info = mysql_fetch_array ( $query );
		if ($i + 1 == mysql_num_rows ( $query )) {
			echo "{";
			echo "\"listid\":\"" . $info ['listid'] . "\",";
			echo "\"customerid\":\"" . $info ['customerid'] . "\",";
			echo "\"items\":\"" . $info ['items'] . "\"";
			echo "}";
		} else {
			echo "{";
			echo "\"listid\":\"" . $info ['listid'] . "\",";
			echo "\"customerid\":\"" . $info ['customerid'] . "\",";
			echo "\"items\":\"" . $info ['items'] . "\"";
			echo "},";
		}
	}
	echo "]";
	echo "}";
} else {
	die ( "{\"status\":0," . "\"error\":\"enter username\"}" );
}

?>