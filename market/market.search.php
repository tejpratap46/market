<?php
error_reporting ( 0 );
require ("../connection.php");
require "pagination.php";

$itemid = $_GET ['itemid'];
$itemname = $_GET ['itemname'];
$itemprice = $_GET ['itemprice'];
$itemdiscreption = $_GET ['itemdiscreption'];
$itemcategory = $_GET ['itemcategory'];
$itembrand = $_GET ['itembrand'];
$quantity = $_GET ['quantity'];
$year = $_GET ['year'];
$month = $_GET ['month'];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}
if ($_GET ['topselling']) {
	if (strlen ( $itemid ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemid LIKE '%" . $itemid . "%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itemname ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemname LIKE '%" . $itemname . "%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itemprice ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemprice LIKE '%" . $itemprice . "%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itemdiscreption ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemdiscreption LIKE '%" . $itemdiscreption . "%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $quantity ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE quantity LIKE '%" . $quantity . "%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itemcategory ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemcategory LIKE '%" . $itemcategory . "%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itembrand ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itembrand LIKE '%" . $itembrand . "%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $year ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE date LIKE '%" . $year . "%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $month ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE date LIKE '%" . $month . "%' ORDER BY `totalsold` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else {
		die ( "{\"status\":0," . "\"error\":\"You can search values for itemid,itemname,itemprice,itemdiscreption,quantity,type,month,year\"}" );
	}
} elseif ($_GET ['newarrivals']) {
	if (strlen ( $itemid ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemid LIKE '%" . $itemid . "%' ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itemname ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemname LIKE '%" . $itemname . "%' ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itemprice ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemprice LIKE '%" . $itemprice . "%' ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itemdiscreption ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemdiscreption LIKE '%" . $itemdiscreption . "%' ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $quantity ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE quantity LIKE '%" . $quantity . "%' ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itemcategory ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemcategory LIKE '%" . $itemcategory . "%' ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $itembrand ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itembrand LIKE '%" . $itembrand . "%' ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $year ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE date LIKE '%" . $year . "%' ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} elseif (strlen ( $month ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE date LIKE '%" . $month . "%' ORDER BY `date` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else {
		die ( "{\"status\":0," . "\"error\":\"You can search values for itemid,itemname,itemprice,itemdiscreption,quantity,type,month,year\"}" );
	}
} else {
	if (strlen ( $itemid ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemid LIKE '%" . $itemid . "%' LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else if (strlen ( $itemname ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemname LIKE '%" . $itemname . "%' LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else if (strlen ( $itemprice ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemprice LIKE '%" . $itemprice . "%' LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else if (strlen ( $itemdiscreption ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemdiscreption LIKE '%" . $itemdiscreption . "%' LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else if (strlen ( $quantity ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE quantity LIKE '%" . $quantity . "%' LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else if (strlen ( $itemcategory ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itemcategory LIKE '%" . $itemcategory . "%' LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else if (strlen ( $itembrand ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE itembrand LIKE '%" . $itembrand . "%' LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else if (strlen ( $year ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE date LIKE '%" . $year . "%' LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else if (strlen ( $month ) > 0) {
		$query = mysql_query ( "SELECT * FROM market WHERE date LIKE '%" . $month . "%' LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	} else {
		die ( "{\"status\":0," . "\"error\":\"You can search values for itemid,itemname,itemprice,itemdiscreption,quantity,type,month,year\"}" );
	}
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
		echo "\"totalsold\":\"" . $info ['totalsold'] . "\"";
		echo "}";
	} else {
		echo "{";
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
		echo "\"totalsold\":\"" . $info ['totalsold'] . "\"";s
		echo "},";
	}
}
echo "]";
echo "}";
?>