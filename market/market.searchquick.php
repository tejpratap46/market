<?php
error_reporting ( 0 );
require ("../connection.php");
require "pagination.php";

$q = $_GET ['q'];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (strlen ( $q ) > 0) {
	$query = mysql_query ( "SELECT * FROM market WHERE itemname LIKE '%$q%' OR itemcategory LIKE '%$q%' OR itembrand LIKE '%$q%' OR tags LIKE '%$q%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
} else {
	die ( "{\"status\":0," . "\"error\":\"input q\"}" );
}

echo "{";
echo "\"status\":1,";
echo "\"results\":" . mysql_num_rows ( $query ) . ",";
echo "\"search\":[";
for($i = 0; $i < mysql_num_rows ( $query ); $i ++) {
	$info = mysql_fetch_array ( $query );
	if ($i + 1 == mysql_num_rows ( $query )) {
		echo "{";
		echo "\"itemid\":\"" . $info ['itemid'] . "\",";
		echo "\"itemname\":\"" . $info ['itemname'] . "\"";
		echo "}";
	} else {
		echo "{";
		echo "\"itemid\":\"" . $info ['itemid'] . "\",";
		echo "\"itemname\":\"" . $info ['itemname'] . "\"";
		echo "},";
	}
}
echo "]";
echo "}";
?>