<?php
error_reporting ( 0 );
require ("../connection.php");

$username = $_GET ['username'];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($username) {
	$query = mysql_query ( "SELECT listid,bankid FROM customer WHERE username = '" . $username . "' ORDER BY listid desc LIMIT 1" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$info = mysql_fetch_array ( $query );
	$bankid = $info ['bankid'];
	$bankQuery = mysql_query ( "SELECT balance,lastupdate FROM bank WHERE bankid = '" . $bankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$info1 = mysql_fetch_array ( $bankQuery );
	if ($query && $bankQuery) {
		echo "{\"status\":1,";
		echo "\"listid\":\"" . $info ['listid'] . "\",";
		echo "\"balance\":\"" . $info1 ['balance'] . "\",";
		echo "\"last_updated\":\"" . $info1 ['lastupdate'] . "\"";
		echo "}";
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"enter username\"}" );
}
?>