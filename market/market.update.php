<?php
error_reporting ( 0 );
require ("../connection.php");

$itemid = $_GET ['itemid'];
$itemname = $_GET ['itemname'];
$itemprice = $_GET ['itemprice'];
$itemdiscreption = $_GET ['itemdiscreption'];
$itemspecification = $_GET ['itemspecification'];
$itemcategory = $_GET ['itemcategory'];
$itembrand = $_GET ['itembrand'];
$quantity = $_GET ['quantity'];
$type = $_GET ['type'];
$imageurl = $_GET ['imageurl'];
$itemlocation = $_GET ['itemlocation'];
$tags = $_GET ['tags'];
$apikey = $_GET ['apikey'];
// $date = $_GET['date'];
$date = date ( 'Y-m-d' );

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (strlen ( $itemid ) < 0) {
	die ( "{\"status\":0," . "\"error\":\"enter all fields ['itemid']\"}" );
}

if (strlen ( $itemname ) > 0) {
	$query = mysql_query ( "UPDATE market SET itemname='" . $itemname . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $itemprice ) > 0) {
	$query = mysql_query ( "UPDATE market SET itemprice=" . $itemprice . " WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $itemdiscreption ) > 0) {
	$query = mysql_query ( "UPDATE market SET itemdiscreption='" . $itemdiscreption . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $itemspecification ) > 0) {
	$query = mysql_query ( "UPDATE market SET itemspecification='" . $itemspecification . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $itemcategory ) > 0) {
	$query = mysql_query ( "UPDATE market SET itemcategory='" . $itemcategory . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $itembrand ) > 0) {
	$query = mysql_query ( "UPDATE market SET itembrand='" . $itembrand . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $quantity ) > 0) {
	$query = mysql_query ( "UPDATE market SET quantity='" . $quantity . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $imageurl ) > 0) {
	$query = mysql_query ( "UPDATE market SET imageurl='" . $imageurl . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $itemlocation ) > 0) {
	$query = mysql_query ( "UPDATE market SET itemlocation='" . $itemlocation . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $date ) > 0) {
	$query = mysql_query ( "UPDATE market SET date='" . $date . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}
if (strlen ( $tags ) > 0) {
	$query = mysql_query ( "UPDATE market SET tags='" . $tags . "' WHERE itemid='$itemid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
}

$query = mysql_query ( "SELECT * FROM market WHERE itemid='" . $itemid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );

echo "{";
if ($query) {
	$info = mysql_fetch_array ( $query );
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
	echo "\"date\":\"" . $info ['date'] . "\"";
} else {
	echo "\"status\":0,";
	echo "\"error\":\"username already taken\"";
}
echo "}";
?>