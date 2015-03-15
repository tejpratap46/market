<?php
error_reporting ( 0 );
require ("../connection.php");

$itemid = $_POST ['itemid'];
$itemname = $_POST ['itemname'];
$itemprice = $_POST ['itemprice'];
$itemdiscreption = $_POST ['itemdiscreption'];
$itemspecification = $_POST ['itemspecification'];
$itemcategory = $_POST ['itemcategory'];
$itembrand = $_POST ['itembrand'];
$quantity = $_POST ['quantity'];
$imageurl = $_POST ['imageurl'];
$itemlocation = $_POST ['itemlocation'];
$tags = $_POST ['tags'];
$apikey = $_POST ['apikey'];
// $date = $_POST['date'];
$date = date ( 'Y-m-d' );

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (strlen ( $_POST ['itemid'] ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter itemid\"}" );
}
if (strlen ( $_POST ['itemname'] ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter itemname\"}" );
}
if (strlen ( $_POST ['itemprice'] ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter itemprice\"}" );
}
if (strlen ( $itemdiscreption ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter itemdiscreption\"}" );
}
if (strlen ( $itemspecification ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter itemspecification\"}" );
}
if (strlen ( $itemcategory ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter itemcategory\"}" );
}
if (strlen ( $itembrand ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter itembrand\"}" );
}
if (strlen ( $quantity ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter quantity\"}" );
}
if (strlen ( $imageurl ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter imageurl\"}" );
}
if (strlen ( $itemlocation ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter itemid\"}" );
}
if (strlen ( $tags ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter tags\"}" );
}

if (strlen ( $itemid ) < 1 || strlen ( $itemname ) < 1 || strlen ( $itemprice ) < 1 || strlen ( $itemdiscreption ) < 1 || strlen ( $itemspecification ) < 1 || strlen ( $itemcategory ) < 1 || strlen ( $itembrand ) < 1 || strlen ( $quantity ) < 1 || strlen ( $tags ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter all fields ['itemid','itemname','itemprice','itemdiscreption','itemspecification','itemcategory','itembrand','quantity','date','imageurl','itemlocation','tags','apikey']\"}" );
}

$query = "INSERT INTO market (itemid,itemname,itemprice,itemdiscreption,itemspecification,itemcategory,itembrand,quantity,date,imageurl,itemlocation,tags) VALUES ('$itemid','$itemname','$itemprice','$itemdiscreption','$itemspecification',,'$itemcategory','$itembrand','$quantity',$date,'$imageurl','$itemlocation','$tags')";
$data = mysql_query ( $query ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$q2 = mysql_query ( "SELECT * FROM `market` WHERE `itemid`='" . $itemid . "'" );
$info = mysql_fetch_array ( $q2 );
echo "{";
if ($data) {
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