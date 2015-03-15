<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$id = $_GET ['id'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}
$query = mysql_query ( "SELECT * FROM customer WHERE username = '" . $id . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$info = mysql_fetch_array ( $query );
$bankid = $info ['bankid'];

$query = mysql_query ( "DELETE FROM customer WHERE username = '" . $id . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$bank = mysql_query ( "DELETE FROM bank WHERE bankid = '" . $bankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$bank = mysql_query ( "DELETE FROM lists WHERE customerid = '" . $id . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );

if ($query && $bank) {
	echo "{";
	echo "\"status\":1,";
	echo "\"customer\":\"deleted\"";
	echo "}";
} else {
	echo "{";
	echo "\"status\":0,";
	echo "\"error\":\"enter contraint as true or false\"";
	echo "}";
}
?>