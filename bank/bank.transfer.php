<?php
error_reporting ( 0 );
require ("../connection.php");

$frombankid = $_GET ['frombankid'];
$tobankid = $_GET ['tobankid'];
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

if (strlen ( $frombankid ) < 1 || strlen ( $balance ) < 1 || strlen ( $tobankid ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter all fields ['frombankid','tobankid','apikey','balance']\"}" );
}

$query = mysql_query ( "SELECT balance FROM bank where bankid = '" . $frombankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$info = mysql_fetch_array ( $query );
$frombankbalance = $info ['balance'];
$frombankbalance = intval ( $frombankbalance ) - intval ( $balance );
$query = mysql_query ( "SELECT balance FROM bank where bankid = '" . $tobankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$info = mysql_fetch_array ( $query );
$tobankbalance = $info ['balance'];
$tobankbalance = intval ( $tobankbalance ) + intval ( $balance );

$query1 = mysql_query ( "UPDATE bank SET balance='" . $frombankbalance . "',lastupdate='" . date ( "d-m-y H:i:s" ) . "' WHERE bankid='" . $frombankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$query1 = mysql_query ( "UPDATE bank SET balance='" . $tobankbalance . "',lastupdate='" . date ( "d-m-y H:i:s" ) . "' WHERE bankid='" . $tobankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );

echo "{";
if ($query1 && $query1) {
	echo "\"status\":1,";
	echo "\"balance\":\"" . $balance . "\",";
	echo "\"frombankid\":\"" . $frombankid . "\",";
	echo "\"tobankid\":\"" . $tobankid . "\",";
	echo "\"frombankbalance\":\"" . $frombankbalance . "\",";
	echo "\"tobankbalance\":\"" . $tobankbalance . "\",";
	echo "\"lastupdate\":\"" . date ( "d-m-y H:i:s" ) . "\"";
} else {
	echo "\"status\":0,";
	echo "\"error\":\"cannot update\"";
}
echo "}";
?>