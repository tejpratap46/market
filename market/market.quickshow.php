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
	// echo "{";
	// echo "\"itemname\":\"" . $info ['itemname'] . "\",";
	// echo "\"itemprice\":\"" . $info ['itemprice'] . "\",";
	// echo "\"itemdiscreption\":\"" . $info ['itemdiscreption'] . "\",";
	// echo "\"itemcategory\":\"" . $info ['itemcategory'] . "\",";
	// echo "\"itembrand\":\"" . $info ['itembrand'] . "\",";
	// echo "\"quantity\":\"" . $info ['quantity'] . "\",";
	// echo "\"imageurl\":\"" . $info ['imageurl'] . "\"";
	// echo "}";
	
	echo "<div style='font-family: cursive;'>";
	echo "<div style='text-align: center;'>";
	echo "<img src='" . $info ['imageurl'] . "'/>";
	echo "</div>";
	echo "<h3>Name : " . $info ['itemname'] . "</h3>";
	echo "<h2>Price : " . $info ['itemprice'] . "</h2>";
	echo "<h4>Category : " . $info ['itemcategory'] . "</h4>";
	echo "<h4>Brand : " . $info ['itembrand'] . "</h4>";
	echo "<h4>Quantity : " . $info ['quantity'] . "</h4>";
	echo "<p>Description : " . $info ['itemdiscreption'] . "</p>";
	echo "</div>";
} else {
	echo ("{\"status\":0," . "\"error\":\"Please Provide itemid\"}");
}
?>