<?php
error_reporting ( 0 );
require ("../connection.php");

$bankid = $_GET ["bankid"];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (! empty ( $bankid )) {
	echo "{";
	$query = mysql_query ( "SELECT * FROM bank WHERE bankid = '$bankid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $query ) == 1) {
		$info = mysql_fetch_array ( $query );
		echo "\"status\":1,";
		echo "\"name\":\"" . $info ['name'] . "\",";
		echo "\"balance\":\"" . $info ['balance'] . "\",";
		echo "\"lastupdate\":\"" . $info ['lastupdate'] . "\"";
	} else {
		echo "\"status\":0,";
		echo "\"error\":\"invalid bankid\"";
	}
	echo "}";
} else {
	echo "{\"status\":0,";
	echo "\"error\":\"enter valid bankid\"}";
}
?>