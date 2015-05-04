<?php
error_reporting ( 0 );
require ("../connection.php");
require '../simple_html_dom.php';

$apikey = $_GET ['apikey'];
$coupon = $_GET ['coupon'];
$list = $_GET ['listid'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($coupon && $list) {
	$query = mysql_query ( "SELECT * FROM lists WHERE listid='" . $list . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if ($query) {
		$query1 = mysql_query ( "SELECT * FROM coupon WHERE code='" . $coupon . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		if (mysql_num_rows ( $query1 )) {
			$listArray = mysql_fetch_array ( $query );
			$coupon = mysql_fetch_array ( $query1 );
			$xml = str_get_html ( $listArray ['items'] );
			$couponItem = str_getcsv ( $coupon ['items'] );
			$listItems = $xml->find ( 'id' ); // to get number of items
			$listids = Array (); // to store ids
			$listPrice = Array (); // to store price
			$listname = Array (); // to store name
			$listquantity = Array (); // to store qty
			for($i = 0; $i < count ( $listItems ); $i ++) { // loop to all items
				$listids [$i] = $xml->find ( 'id', $i )->plaintext; // get current id
				$listname [$i] = $xml->find ( 'name', $i )->plaintext; // get current name
				$listquantity [$i] = $xml->find ( 'quantity', $i )->plaintext; // get current qty
				if (in_array ( $listids [$i], $couponItem )) { // if current itemid is present in csv list of coupon
					$Price = $xml->find ( 'cost', $i )->plaintext;
					$listPrice [$i] = round ( $Price * (100 - $coupon ['percentage']) / 100 ); // then apply percentage discount
				} else {
					$listPrice [$i] = $xml->find ( 'cost', $i )->plaintext; // else store as it is
				}
			}
			for($i = 0; $i < count ( $listItems ); $i ++) { // now create new xml to store list
				$newlist .= "<id>" . $listids [$i] . "</id><name>" . $listname [$i] . "</name><quantity>" . $listquantity [$i] . "</quantity><cost>" . $listPrice [$i] . "</cost>";
			}
			
			echo "{";
			echo '"status":1,';
			echo '"listid":"' . $list . '",';
			echo '"items":"' . $newlist . '"';
			echo "}";
			// // print_r($listitms);
			// // $listItems = simplexml_load_string ( $list ['items'] );
			// $couponItem = str_getcsv ( $coupon ['items'] );
			// // print_r($couponItem);
			// $intersect = array_intersect ( $listitms, $couponItem );
			// // print_r ( $intersect );
			// for($i = 0; $i < count ( $intersect ); $i ++) {
			// $q = mysql_query ( "SELECT * FROM market WHERE itemid = '" . $intersect [$i] . "'" );
			// $qarray = mysql_fetch_array ( $q );
			// $listPrice [$i] = round ( $qarray ['itemprice'] * (100 - $coupon ['percentage']) / 100 );
			// }
			// $diff = array_diff ( $listitms, $couponItem );
			// // print_r ( $diff );
			// $finel = array_merge ( $intersect, $diff );
			// // echo json_encode ( $finel );
			// print_r ( $listPrice );
		}else{
			die ( "{\"status\":0," . "\"error\":\"No Coupon found for this code\"}" );
		}
	} else {
		die ( "{\"status\":0," . "\"error\":\"invalid listid\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"enter listid, coupon\"}" );
}
?>