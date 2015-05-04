<?php
error_reporting ( 0 );
require '../connection.php';

$username = $_GET ['username'];
$item = $_GET ['items'];

if ($username && $item) {
	$query = mysql_query ( "SELECT * FROM cart WHERE username = '" . $username . "'" );
	if (mysql_numrows ( $query ) > 0) {
		$arr = mysql_fetch_array ( $query );
		$updateQuary = mysql_query ( "UPDATE `cart` SET `items`='" . $arr ['items'] . $item . "' WHERE username='" . $username . "'" ) or die ( "Error " . mysql_error () );
	} else {
		$updateQuary = mysql_query ( "INSERT INTO cart (username,items) VALUES ('" . $username . "','" . $item . "')" ) or die ( "Error " . mysql_error () );
	}
	if ($updateQuary) {
		preg_match_all ( "#<name.*?>([^<]+)</name>#", $item, $matches );
		echo "Added " . $matches [1] [0];
		// print_r ( $matches );
	} else {
		echo ("Error");
	}
}
?>