<?php
require '../connection.php';
$deleteid = $_GET ['id'];
$username = $_GET ['u'];
if ($deleteid && $username) {
	$query = mysql_query ( "DELETE FROM lists WHERE listid='$deleteid'" );
	$query1 = mysql_query ( "SELECT * FROM lists WHERE customerid = '" . $username . "' ORDER BY listid desc LIMIT 1" );
	if ($query1) {
		$info = mysql_fetch_array ( $query1 );
		$listid = $info ['listid'];
	} else {
		$listid = "no list found";
	}
	$query2 = mysql_query ( "UPDATE `customer` SET listid = '$listid' WHERE username = '$username'" );
	if (! $query2) {
		echo ("Error");
	}
}
?>