<?php
require '../connection.php';
$listid = $_GET ['id'];
$username = $_GET ['u'];
if ($listid && $username) {
	// $html = file_get_contents ( "http://www.nfcstore.vv.si/lists/lists.setcurrent.php" );
	// echo $html;
	$query = mysql_query ( "SELECT * FROM `lists` WHERE `listid` = '" . $listid . "'" ) or die (mysql_error () );
	if ($query) {
		$info = mysql_fetch_array ( $query );
		echo "INSERT INTO `lists` (customerid, items) VALUES ('" . $username . "','" . $info ['items'] . "')";
		$q1 = mysql_query ( "INSERT INTO `lists` (customerid, items) VALUES ('" . $username . "','" . $info ['items'] . "')" ) or die ( mysql_error ());
		if ($q1) {
			$qd = mysql_query ( "DELETE FROM lists WHERE listid='$listid'" );
		}
	}
}
?>