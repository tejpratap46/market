<?php
error_reporting ( 0 );
require ("connection.php");
require 'pagination.php';

$apikey = $_GET ['apikey'];
$query = $_GET ['query'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}
if ($query) {
	$sql = mysql_query ( $query );
	
	$json = array ();
	if (mysql_num_rows ( $sql )) {
		while ( $row = mysql_fetch_row ( $sql ) ) {
			$json [] = $row;
		}
	}
	print (json_encode ( $json )) ;
} else {
	echo ( "{\"status\":0," . "\"error\":\"Enter Query\"}" );
}

?>