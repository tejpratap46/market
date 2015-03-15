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
	$query = mysql_query ( "SELECT * FROM lists WHERE listid = '" . $listid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if ($query) {
		$info = mysql_fetch_array ( $query );
		echo "{";
		echo "\"status\":1,";
		echo "\"listid\":\"" . $info ['listid'] . "\",";
		echo "\"customerid\":\"" . $info ['customerid'] . "\",";
		echo "\"items\":\"" . $info ['items'] . "\"";
		echo "}";
	} else {
		echo ("{\"status\":0," . "\"error\":\"invalid listid\"}");
	}
} else {
	echo ("{\"status\":0," . "\"error\":\"enter listid\"}");
}

?>