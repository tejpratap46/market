<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

$query = mysql_query ( "SELECT DISTINCT itemcategory FROM market" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$categoryRows = mysql_num_rows ( $query );
echo "{";
echo "\"status\":1,";
echo "\"categories\":[";
for($i = 0; $i < $categoryRows; $i ++) {
	$itemcategory = mysql_fetch_array ( $query );
	if ($i == $categoryRows - 1) {
		echo "\"" . $itemcategory ['itemcategory'] . "\"";
	} else {
		echo "\"" . $itemcategory ['itemcategory'] . "\",";
	}
}
echo "]";
echo "}";
?>