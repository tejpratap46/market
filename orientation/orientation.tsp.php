<?php
error_reporting ( 0 );
require 'TSP.php';
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

if ($listid) {
	
	$tsp = new TSP (); // TSP object to calculate path
	$query = mysql_query ( "SELECT `items` FROM `lists` WHERE `listid` = '" . $listid . "'" );
	$items = mysql_fetch_array ( $query );
	preg_match_all ( "#<id.*?>([^<]+)</id>#", $items ['items'], $matches );
	$itemcount = array_count_values ( $matches [1] );
	$pixels = array ();
	$i = 0; // foreach count
	foreach ( $itemcount as $key => $value ) { // $key = itemid, $value = count
		$marketQuery = mysql_query ( "SELECT `itemlocation` FROM `market` WHERE `itemid` = '" . $key . "'" );
		$itemLocation = mysql_fetch_array ( $marketQuery );
		$locationQuery = mysql_query ( "SELECT `latlong`, `pixelloc` FROM `location` WHERE `code`='" . $itemLocation ['itemlocation'] . "'" );
		$location = mysql_fetch_array ( $locationQuery );
		$array = str_getcsv ( $location ['latlong'] );
		// print_r($array);
		$i ++;
		// $pixels = array_merge ( $pixels, str_getcsv ( $location ['pixelloc'] ) );
		array_push($pixels, $location ['pixelloc']);
		// echo $i." -> ".$array [0] . " " . $array [1] . " " . $array [2] . "<br />";
		$tsp->add ( $itemLocation ['itemlocation'], $array [0], $array [1] );
	}
	
	// $tsp->add ( 'newquay', 50.413608, - 5.083364 );
	// $tsp->add ( 'london', 51.500152, - 0.126236 );
	// $tsp->add ( 'birmingham', 52.483003, - 1.893561 );
	// $tsp->add ( 'manchester', 53.480712, - 2.234377 );
	
	$tsp->compute ();
	
	// echo 'Shortest Distance: ' . $tsp->shortest_distance ();
	// echo '<br />Shortest Route: ';
	echo "{\"shortest_path\":";
	echo json_encode ( $tsp->shortest_route () );
	echo ",\"other_shortest_path\":";
	echo json_encode ( $tsp->matching_shortest_routes () ).",";
	echo '"pixelloc":';
	echo json_encode($pixels);
	echo "}";
	// echo '<br />Num Routes: ' . count ( $tsp->routes () );
	// echo '<br />Matching shortest Routes: ';
	// print_r ( $tsp->matching_shortest_routes () );
	// echo '<br />All Routes: ';
	// print_r ( $tsp->routes () );
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid listid\"}" );
}
?>