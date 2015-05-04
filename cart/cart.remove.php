<?php
// error_reporting ( 0 );
require '../connection.php';

$username = $_GET ['username'];
$pos = $_GET ['position'];

if ($username && strlen ( $pos )) {
	$query = mysql_query ( "SELECT * FROM cart WHERE username = '" . $username . "'" ) or die ( "Error " . mysql_error () );
	if (mysql_numrows ( $query ) > 0) {
		$itemArray = mysql_fetch_array ( $query );
		$item = $itemArray ['items'];
		$itemArray = explode ( "</quantity>", $item );
		$item = "";
		for($i = 0; $i < count ( $itemArray ) - 1; $i ++) {
			if ($i != ( int ) $pos) {
				$item = $item . $itemArray [$i] . "</quantity>";
			}
		}
		$updateQuary = mysql_query ( "UPDATE `cart` SET `items`='" . $item . "' WHERE `username`='" . $username . "'" ) or die ( "Error " . mysql_error () );
	}
	if ($updateQuary) {
		showCart ( $item );
		// echo ($item);
	} else {
		echo ("Error");
	}
}
function showCart($item) {
	preg_match_all ( "#<id.*?>([^<]+)</id>#", $item, $ids );
	preg_match_all ( "#<name.*?>([^<]+)</name>#", $item, $names );
	preg_match_all ( "#<quantity.*?>([^<]+)</quantity>#", $item, $qtys );
	preg_match_all ( "#<cost.*?>([^<]+)</cost>#", $item, $costs );
	for($i = 0; $i < count ( $ids [1] ); $i ++) {
		echo "<tr>";
		echo "<td>" . $ids [1] [$i] . "</td>";
		echo "<td>" . $names [1] [$i] . "</td>";
		echo "<td>" . $qtys [1] [$i] . "</td>";
		echo "<td>" . $costs [1] [$i] . "</td>";
		echo "<td><button onclick=\"removeFromCart('$i');\">X</button></td>";
		echo "</tr>";
	}
}
?>