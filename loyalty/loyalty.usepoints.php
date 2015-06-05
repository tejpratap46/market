<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$username = $_GET ['username'];
$points = $_GET ['points'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($username && $points) {
	$query = mysql_query("SELECT * FROM `loyalty` WHERE username='".$username."'") or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );

	isValidQuery($query, "Username");
	
	$qArray = mysql_fetch_array($query);

	if (intval($qArray['points']) >= intval($points)) {
		$newPoints = intval($qArray['points']) - intval($points);
		$query = mysql_query("UPDATE `loyalty` SET `points`='$newPoints' WHERE username='".$username."'") or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	}else{
		die ( "{\"status\":0," . "\"error\":\"Points in account (".$qArray['points'].") are less then points you want to use (".$points.").\"}" );
	}
	echo "{";
	echo '"status":1,';
	echo '"username":"'.$username.'",';
	echo '"points_used":"'.$points.'",';
	echo '"new_points":"'.$newPoints.'"';
	echo "}";
}else{
	die ( "{\"status\":0," . "\"error\":\"Enter username, points\"}" );
}



function isValidQuery($query, $what){
	if (mysql_num_rows($query) == 0) {
		die ( "{\"status\":0," . "\"error\":\"invalid $what\"}" );
	}
}
?>