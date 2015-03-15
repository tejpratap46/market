<?php
error_reporting ( 0 );
require "../connection.php";
require "../pagination.php";
$apikey = $_GET ['apikey'];

// select from market
if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

echo "{";
$query = mysql_query ( "SELECT * FROM market ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
echo "\"status\":1,";
echo "\"results\":" . mysql_num_rows ( $query ) . ",";
echo "\"market\":[";
for($i = 0; $i < mysql_num_rows ( $query ); $i ++) {
	$info = mysql_fetch_array ( $query );
if ($i + 1 == mysql_num_rows ( $query )) {
		echo "{";
		echo "\"itemid\":\"" . $info ['itemid'] . "\",";
		echo "\"itemname\":\"" . $info ['itemname'] . "\",";
		echo "\"itemprice\":\"" . $info ['itemprice'] . "\",";
		echo "\"itemcategory\":\"" . $info ['itemcategory'] . "\",";
		echo "\"itembrand\":\"" . $info ['itembrand'] . "\",";
		echo "\"quantity\":\"" . $info ['quantity'] . "\",";
		echo "\"imageurl\":\"" . $info ['imageurl'] . "\"";
		echo "}";
	} else {
		echo "{";
		echo "\"itemid\":\"" . $info ['itemid'] . "\",";
		echo "\"itemname\":\"" . $info ['itemname'] . "\",";
		echo "\"itemprice\":\"" . $info ['itemprice'] . "\",";
		echo "\"itemcategory\":\"" . $info ['itemcategory'] . "\",";
		echo "\"itembrand\":\"" . $info ['itembrand'] . "\",";
		echo "\"quantity\":\"" . $info ['quantity'] . "\",";
		echo "\"imageurl\":\"" . $info ['imageurl'] . "\"";
		echo "},";
	}
}
echo "]";
echo "}";
?>