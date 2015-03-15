<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$floor = $_GET ['floor'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($floor) {
	$mapQuery = mysql_query ( "SELECT * FROM maps WHERE floor='" . $floor . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$mapArray = mysql_fetch_array ( $mapQuery );
	echo "{";
	if (strlen ( $mapArray ['imageurl'] ) > 0) {
		echo "\"status\":1,";
		echo "\"imageurl\":\"" . $mapArray ['imageurl'] . "\"";
	} else {
		echo "\"status\":0," . "\"error\":\"invalid floor\"";
	}
	
	echo "}";
} else {
	die ( "{\"status\":0," . "\"error\":\"enter floor\"}" );
}