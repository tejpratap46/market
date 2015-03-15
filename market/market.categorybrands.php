<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$itemcategory = $_GET ['category'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

$query = mysql_query ( "SELECT DISTINCT itembrand FROM market WHERE itemcategory='" . $itemcategory . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$Rows = mysql_num_rows ( $query );
echo "{";
echo "\"status\":1,";
echo "\"brands\":[";
for($i = 0; $i < $Rows; $i ++) {
	$itemcategory = mysql_fetch_array ( $query );
	if ($i == $Rows - 1) {
		echo "\"" . $itemcategory ['itembrand'] . "\"";
	} else {
		echo "\"" . $itemcategory ['itembrand'] . "\",";
	}
}
echo "]";
echo "}";
?>