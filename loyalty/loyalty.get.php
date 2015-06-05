<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$username = $_GET ['username'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($username) {
	$query = mysql_query("SELECT * FROM `loyalty` WHERE username='".$username."'") or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	
	isValidQuery($query, "Username");

	$qArray = mysql_fetch_array($query);
	echo "{";
	echo '"status":1,'
	echo '"username":"'.$qArray['username'].'",';
	echo '"total_purchases":"'.$qArray['total_purchases'].'",';
	echo '"total_ammount":"'.$qArray['total_ammount'].'",';
	echo '"points":"'.$qArray['points'].'",';
	echo '"timestamp":"'.$qArray['timestamp'].'"';
	echo "}";
}else{
	die ( "{\"status\":0," . "\"error\":\"Enter username\"}" );
}
?>