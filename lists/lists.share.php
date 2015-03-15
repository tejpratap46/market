<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$listid = $_GET ['listid'];
$customerid = $_GET ['customerid'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($listid) {
	echo "{";
	$query1 = mysql_query ( "SELECT items FROM lists WHERE listid='$listid'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$qarray = mysql_fetch_array ( $query1 );
	$itemstoshare = $qarray ['items'];
	$query1 = mysql_query ( "INSERT INTO lists (customerid,items) VALUES ('$customerid','$itemstoshare')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if ($query1) {
		updatelastlist ( $customerid ); // update lastlist updated columl in customer table
		
		echo "\"status\":1,";
		echo "\"lists_shared\":\"yes\",";
		echo "\"items\":\"$itemstoshare\"";
	} else {
		echo "\"status\":0,";
		echo "\"error\":\"Cannot delete that list\"";
	}
	
	echo "}";
} else {
	die ( "{\"status\":0," . "\"error\":\"Enter a listid, customerid\"}" );
}
function updatelastlist($username) {
	$query1 = mysql_query ( "SELECT * FROM lists WHERE customerid = '" . $username . "' ORDER BY listid desc LIMIT 1" );
	if ($query1) {
		$info = mysql_fetch_array ( $query1 );
		$listid = $info ['listid'];
	} else {
		$listid = "no list found";
	}
	$query2 = mysql_query ( "UPDATE `customer` SET listid = '$listid' WHERE username = '$username'" );
}

?>