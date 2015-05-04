<?php
error_reporting ( 0 );
require ("../connection.php");
ob_start();
require 'lists.check.php';
ob_end_clean();

$apikey = $_GET ['apikey'];
$listid = $_GET ['listid'];
$update = $_GET ['update'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

echo "{";
if ($listid && $update) {
	$query = mysql_query ( "SELECT items FROM lists WHERE listid = '" . $listid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$listarray = mysql_fetch_array ( $query );
	$list = $listarray ['items'];
	preg_match_all ( "#<id.*?>([^<]+)</id>#", $list, $id );
	preg_match_all ( "#<quantity.*?>([^<]+)</quantity>#", $list, $quantity );
	for($i = 0; $i < count ( $id [1] ); $i ++) {
		$query = mysql_query ( "SELECT quantity, totalsold FROM market WHERE itemid = '" . $id [1] [$i] . "'" );
		$qarray = mysql_fetch_array ( $query );
		$quantityinstore = $qarray ['quantity'];
		$totalsold = $qarray ['totalsold'];
		$query = mysql_query ( "UPDATE market SET quantity = '" . ($quantityinstore - $quantity [1] [$i]) . "', totalsold = '" . ($totalsold + $quantity [1] [$i]) . "' WHERE itemid = '" . $id [1] [$i] . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	}
	echo "\"status\":1,";
	echo "\"listid\":\"$listid\"";
} else {
	echo "\"status\":0,";
	echo "\"error\":\"enter listid\"";
}
echo "}";
?>