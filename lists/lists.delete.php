<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$listid = $_GET ['listid'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($listid) {
	echo "{";
	$query = "DELETE FROM lists WHERE listid='$listid'";
	$data = mysql_query ( $query ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if ($data) {
		echo "\"status\":1,";
		echo "\"lists\":\"deleted\"";
	} else {
		echo "\"status\":0,";
		echo "\"error\":\"Cannot delete that list\"";
	}
	
	echo "}";
} else {
	die ( "{\"status\":0," . "\"error\":\"Enter a list id\"}" );
}

?>