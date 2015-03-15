<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}
echo "{";
$query = "DELETE FROM featured WHERE 1";
$data = mysql_query ( $query ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
if ($data) {
	echo "\"status\":1,";
	echo "\"customer\":\"deleted\"";
} else {
	echo "\"status\":0,";
	echo "\"error\":\"enter contraint as true or false\"";
}

echo "}";
?>