<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$listid = $_GET ['listid'];
$username = $_GET ['username'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($listid && $username) {
	$query = mysql_query ( "SELECT * FROM `lists` WHERE `listid` = '" . $listid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if ($query) {
		$info = mysql_fetch_array ( $query );
		$q1 = mysql_query ( "INSERT INTO `lists` (customerid, items) VALUES ('" . $username . "','" . $info ['items'] . "')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		echo "{";
		echo "\"status\":1,";
		echo "\"listid\":\"" . mysql_insert_id () . "\"";
		echo "}";
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"enter listid,username\"}" );
}
?>