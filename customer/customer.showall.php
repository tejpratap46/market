<?php
error_reporting ( 0 );
require ("../connection.php");

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
$query = mysql_query ( "SELECT * FROM customer WHERE 1" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
echo "\"status\":1,";
echo "\"results\":" . mysql_num_rows ( $query ) . ",";
echo "\"customers\":[";
for($i = 0; $i < mysql_num_rows ( $query ); $i ++) {
	$info = mysql_fetch_array ( $query );
	if ($i + 1 == mysql_num_rows ( $query )) {
		echo "{";
		echo "\"name\":\"" . $info ['name'] . "\",";
		echo "\"email\":\"" . $info ['email'] . "\",";
		echo "\"bankid\":\"" . $info ['bankid'] . "\"";
		echo "}";
	} else {
		echo "{";
		echo "\"name\":\"" . $info ['name'] . "\",";
		echo "\"email\":\"" . $info ['email'] . "\",";
		echo "\"bankid\":\"" . $info ['bankid'] . "\"";
		echo "},";
	}
}
echo "]";
echo "}";
?>