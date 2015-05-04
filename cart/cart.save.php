<?php
require '../connection.php';
$username = $_GET ['username'];
if ($username) {
	$query = mysql_query ( "SELECT `items` FROM `cart` WHERE `username`='$username'" );
	if ($query) {
		$info = mysql_fetch_array ( $query );
		$items = $info ['items'];
		$query1 = mysql_query ( "INSERT INTO `lists`(`customerid`, `items`) VALUES ('$username','$items')" );
		if ($query1) {
			$qd = mysql_query ( "DELETE FROM `cart` WHERE `username`='$username'" );
		}
	}
}
?>