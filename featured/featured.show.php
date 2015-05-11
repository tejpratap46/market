<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$code = $_GET ['code'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($code) {
	echo "{";
	$query = mysql_query ( "SELECT * FROM coupon WHERE code = '" . $code . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	echo "\"status\":1,";
	$info = mysql_fetch_array ( $query );
	$item = $info ['items'];
	$items = str_getcsv ( $item );
	echo "\"items\":[";
	for($i = 0; $i < count ( $items ); $i ++) {
		$q = mysql_query ( "SELECT * FROM market WHERE itemid = '" . $items [$i] . "'" );
		// echo "SELECT * FROM market WHERE id = '" . $items [$i] . "'";
		$info1 = mysql_fetch_array ( $q );
		if ($i + 1 == count ( $items )) {
			echo "{";
			echo "\"itemid\":\"" . $info1 ['itemid'] . "\",";
			echo "\"itemname\":\"" . $info1 ['itemname'] . "\",";
			echo "\"itemprice\":\"" . $info1 ['itemprice'] . "\",";
			echo "\"imageurl\":\"" . $info1 ['imageurl'] . "\"";
			echo "}";
		} else {
			echo "{";
			echo "\"itemid\":\"" . $info1 ['itemid'] . "\",";
			echo "\"itemname\":\"" . $info1 ['itemname'] . "\",";
			echo "\"itemprice\":\"" . $info1 ['itemprice'] . "\",";
			echo "\"imageurl\":\"" . $info1 ['imageurl'] . "\"";
			echo "},";
		}
	}
	echo "]";
	echo "}";
} else {
	die ( "{\"status\":0," . "\"error\":\"enter code\"}" );
}
?>