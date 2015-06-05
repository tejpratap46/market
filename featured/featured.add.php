<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$code = $_GET ['code'];
$imageurl = $_GET['imageurl'];
$description = $_GET['description'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($code && $imageurl && $description) {
	echo "{";
	$query = mysql_query ( "INSERT INTO `featured`(`code`, `imageurl`, `description`) VALUES ('$code', '$imageurl', '$description')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	
} else {
	die ( "{\"status\":0," . "\"error\":\"enter code, imageurl, description\"}" );
}
?>