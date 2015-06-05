<?php
error_reporting ( 0 );
require ("../connection.php");
require ("pagination.php");

$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

echo "{";
$query = mysql_query ( "SELECT * FROM `payment_completed` LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
echo "\"status\":1,";
echo "\"results\":" . mysql_num_rows ( $query ) . ",";
echo "\"customers\":[";
for($i = 0; $i < mysql_num_rows ( $query ); $i ++) {
	$info = mysql_fetch_array ( $query );
	if ($i + 1 == mysql_num_rows ( $query )) {
		echo "{";
		echo "\"id\":\"" . $info ['id'] . "\",";
		echo "\"fromid\":\"" . $info ['fromid'] . "\",";
		echo "\"toid\":\"" . $info ['toid'] . "\",";
		echo "\"balance\":\"" . $info ['balance'] . "\",";
		echo "\"listitems\":\"" . $info ['listitems'] . "\",";
		echo "\"listid\":\"" . $info ['listid'] . "\"";
		echo "}";
	} else {
		echo "{";
		echo "\"id\":\"" . $info ['id'] . "\",";
		echo "\"fromid\":\"" . $info ['fromid'] . "\",";
		echo "\"toid\":\"" . $info ['toid'] . "\",";
		echo "\"balance\":\"" . $info ['balance'] . "\",";
		echo "\"listitems\":\"" . $info ['listitems'] . "\",";
		echo "\"listid\":\"" . $info ['listid'] . "\"";
		echo "},";
	}
}
echo "]";
echo "}";
?>