<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$index = $_GET ['index'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

$query = mysql_query ( "DELETE FROM featured WHERE index = '" . $index . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );

if ($query) {
	echo "{";
	echo "\"status\":1,";
	echo "\"customer\":\"deleted\"";
	echo "}";
} else {
	echo "{";
	echo "\"status\":0,";
	echo "\"error\":\"enter index\"";
	echo "}";
}
?>