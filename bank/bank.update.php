<?php
error_reporting ( 0 );
require ("../connection.php");

$bankid = $_GET ['bankid'];
$balance = $_GET ['balance'];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (strlen ( $bankid ) < 1 || strlen ( $balance ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter all fields ['bankid','apikey','balance']\"}" );
}

$query = "UPDATE bank SET balance='" . $balance . "',lastupdate='" . date ( "d-m-y H:i:s" ) . "' WHERE bankid='" . $bankid . "'";
$data = mysql_query ( $query ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
echo "{";
if ($data) {
	echo "\"status\":1,";
	echo "\"balance\":\"" . $balance . "\",";
	echo "\"bankid\":\"" . $bankid . "\",";
	echo "\"lastupdate\":\"" . date ( "d-m-y H:i:s" ) . "\"";
} else {
	echo "\"status\":0,";
	echo "\"error\":\"cannot update\"";
}
echo "}";
?>