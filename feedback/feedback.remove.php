<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$id = $_GET ['id'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($id) {
	$query = mysql_query("DELETE FROM `feedback` WHERE id='".$id."'") or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	echo "{";
	echo '"status":1,';
	echo '"id":"'.$id.'"';
}else{
	die ( "{\"status\":0," . "\"error\":\"Enter id\"}" );
}
?>