<?php
error_reporting ( 0 );
require ("../connection.php");

$apikey = $_GET ['apikey'];
$code = $_GET ['code'];
$items = $_GET ['itemids'];
$percentage = $_GET ['percentage'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($code && $items && $percentage) {
	$query = mysql_query("INSERT INTO `coupon`(`code`, `items`, `percentage`) VALUES ('$code','$items','$percentage')") or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	echo '{"status":1,';
	echo '"coupon_code":"'.$code.'",';
	echo '"itemids":"'.$items.'",';
	echo '"percentage":"'.$percentage.'"';
	echo "}";
}else{
	die ( "{\"status\":0," . "\"error\":\"Enter code, itemids, percentage\"}" );
}

?>