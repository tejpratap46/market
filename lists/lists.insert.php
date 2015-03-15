<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$items = $_GET ['items'];
$itemids = $_GET ['itemids'];
$customerid = $_GET ['username'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (strlen ( $customerid ) > 1 && (strlen ( $itemids ) > 1 || strlen ( $items ) > 1)) {
	$itemstosave = "";
	if (strlen ( $itemids ) > 1) {
		preg_match_all ( "#<id.*?>([^<]+)</id>#", $itemids, $matches );
		$itemcount = array_count_values ( $matches [1] ); // get count of each item in list
		foreach ( $itemcount as $key => $value ) { // $key = itemid, $value = count
			$query = mysql_query ( "SELECT itemname,itemprice FROM market WHERE itemid = '" . $key . "'" );
			$qarray = mysql_fetch_array ( $query );
			$name = $qarray ['itemname'];
			$price = $qarray ['itemprice'];
			$itemstosave = $itemstosave . "<id>$key</id><name>$name</name><quantity>$value</quantity><cost>$price</cost>";
		}
	} elseif (strlen ( $items ) > 1) {
		$itemstosave = $items;
	}
	
	$query1 = "INSERT INTO lists (customerid,items) VALUES ('$customerid','$itemstosave')";
	$data1 = mysql_query ( $query1 ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$query = mysql_query ( "SELECT * FROM `lists` WHERE `listid`='" . mysql_insert_id () . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$info = mysql_fetch_array ( $query );
	$listid = $info ['listid'];
	$items = $info ['items'];
	$query2 = "UPDATE customer SET listid = $listid WHERE username = '" . $customerid . "'";
	$data2 = mysql_query ( $query2 ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	echo "{";
	echo "\"username\":\"$customerid\",";
	echo "\"listid\":\"$listid\",";
	echo "\"items\":\"$items\"";
	echo "}";
} else {
	echo ("{\"status\":0," . "\"error\":\"username and items or itemids are required\"}");
}
?>