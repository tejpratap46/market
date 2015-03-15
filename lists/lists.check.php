<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$listid = $_GET ['listid'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

echo "{";
if ($listid) {
	$itemcount = array ();
	
	$query = mysql_query ( "SELECT items FROM lists WHERE listid = '" . $listid . "'" );
	$listarray = mysql_fetch_array ( $query );
	$list = $listarray ['items'];
	preg_match_all ( "#<id.*?>([^<]+)</id>#", $list, $id );
	preg_match_all ( "#<quantity.*?>([^<]+)</quantity>#", $list, $quantity );
	preg_match_all ( "#<name.*?>([^<]+)</name>#", $list, $name );
	preg_match_all ( "#<cost.*?>([^<]+)</cost>#", $list, $cost );
	// get count of each item in list
	// echo "\"id\":" . json_encode ( $id [1] ) . ",";
	// echo "\"quantity\":" . json_encode ( $quantity [1] ) . ",";
	// echo "\"name\":" . json_encode ( $name [1] ) . ",";
	// echo "\"cost\":" . json_encode ( $cost [1] ) . ",";
	// for($i = 0; $i < count ( $id [1] ); $i ++) {
	// echo $id [1] [$i] . ",";
	// }
	echo "\"status\":1,";
	
	ckecklist ( $id [1], $quantity [1], $name [1], $cost [1] );
} else {
	echo "\"status\":0,";
	echo "\"error\":\"enter listid\"";
}
echo "}";
function ckecklist($id, $quantity, $name, $cost) {
	$islistok = false; // flag for correctness
	$indexok = 0;
	$indexnotok = 0;
	$newlist = "";
	$itemsok = array (); // items ok
	$itemsnotok = array (); // items not ok
	for($i = 0; $i < count ( $id ); $i ++) { // $key = itemid, $value = count
		$query = mysql_query ( "SELECT quantity FROM market WHERE itemid = '" . $id [$i] . "'" );
		$qarray = mysql_fetch_array ( $query );
		$quantityinstore = $qarray ['quantity']; // quantity left
		if ($quantityinstore >= $quantity [$i]) {
			$itemsok [$indexok] = $id [$i];
			$islistok = true;
			$indexok ++;
			$newlist = $newlist . "<id>" . $id [$i] . "</id>" . "<name>" . $name [$i] . "</name>" . "<quantity>" . $quantity [$i] . "</quantity>" . "<cost>" . $cost [$i] . "</cost>";
		} else {
			$itemsnotok [$indexnotok] = $id [$i];
			$islistok = false;
			$indexnotok ++;
			$newlist = $newlist . "<id>" . $id [$i] . "</id>" . "<name>" . $name [$i] . "</name>" . "<quantity>" . $quantityinstore . "</quantity>" . "<cost>" . $cost [$i] . "</cost>";
		}
	}
	listresult ( $islistok, $itemsnotok, $newlist );
}
function listresult($islistok, $itemsnotok, $newlist) {
	if ($islistok) {
		echo "\"is_list_ok\":\"yes\"";
	} else {
		echo "\"is_list_ok\":\"no\",";
		echo "\"count\":\"" . count ( $itemsnotok ) . "\",";
		echo "\"items\":[";
		for($i = 0; $i < count ( $itemsnotok ); $i ++) {
			if ($i == count ( $itemsnotok ) - 1) {
				echo "\"$itemsnotok[$i]\"";
			} else {
				echo "\"$itemsnotok[$i]\",";
			}
		}
		echo "]";
		
		if ($_GET ['update']) {
			echo ",";
			$query = mysql_query ( "UPDATE `lists` SET `items`='" . $newlist . "' WHERE listid='" . $_GET ['listid'] . "'" );
			$query = mysql_query ( "SELECT `items` FROM `lists` WHERE listid='" . $_GET ['listid'] . "'" );
			$qarray = mysql_fetch_array ( $query );
			echo "\"listupdated\":\"" . $qarray ['items'] . "\"";
		}
	}
}
?>