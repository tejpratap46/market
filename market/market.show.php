<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$itemid = $_GET ['itemid'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($itemid) {
	$query = mysql_query ( "SELECT * FROM market WHERE itemid=" . $itemid ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$info = mysql_fetch_array ( $query );
	echo "{";
	echo "\"status\":1,";
	echo "\"itemid\":\"" . $info ['itemid'] . "\",";
	echo "\"itemname\":\"" . $info ['itemname'] . "\",";
	echo "\"itemprice\":\"" . $info ['itemprice'] . "\",";
	echo "\"itemdiscreption\":\"" . $info ['itemdiscreption'] . "\",";
	echo "\"itemspecification\":\"" . $info ['itemspecification'] . "\",";
	echo "\"itemcategory\":\"" . $info ['itemcategory'] . "\",";
	echo "\"itembrand\":\"" . $info ['itembrand'] . "\",";
	echo "\"quantity\":\"" . $info ['quantity'] . "\",";
	echo "\"imageurl\":\"" . $info ['imageurl'] . "\",";
	echo "\"itemlocation\":\"" . $info ['itemlocation'] . "\",";
	echo "\"tags\":\"" . $info ['tags'] . "\",";
	echo "\"date\":\"" . $info ['date'] . "\",";
	echo "\"qrcode\":\"http://api.qrserver.com/v1/create-qr-code/?data=<id>" . $info ['itemid'] . "</id><name>" . str_replace(" ", "+", $info ['itemname']) . "</name><cost>" . $info ['itemprice'] . "</cost>&size=200x200\"";
	echo "}";
} else {
	echo ("{\"status\":0," . "\"error\":\"Please Provide itemid\"}");
}
?>