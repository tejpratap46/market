<?php
error_reporting ( 0 );
require ("../connection.php");

$name = $_GET ['name'];
$username = $_GET ['username'];
$email = $_GET ['email'];
$password = $_GET ['password'];
$bankid = $_GET ['bankid'];
$gcmId = $_GET ['gcmid'];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (strlen ( $name ) < 1 || strlen ( $username ) < 1 || strlen ( $email ) < 1 || strlen ( $password ) < 1 || strlen ( $bankid ) < 1 || strlen ( $gcmId ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter all fields ['name','username','email','password','bankid','apikey']\"}" );
}

$query = "INSERT INTO customer (name,username,email,password,bankid,gcmid) VALUES ('$name','$username','$email','$password','$bankid','$gcmId')";
$data = mysql_query ( $query ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$bank = mysql_query ( "INSERT INTO bank (name,bankid,username,email,balance,lastupdate) VALUES ('$name','$bankid','$username','$email','0','" . date ( "d-m-y H:i:s" ) . "')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$loyalty = mysql_query ( "INSERT INTO `loyalty`(`username`) VALUES ('$username')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );

echo "{";
if ($data) {
	echo "\"status\":1,";
	echo "\"name\":\"" . $name . "\",";
	echo "\"username\":\"" . $username . "\",";
	echo "\"email\":\"" . $email . "\",";
	echo "\"bankid\":\"" . $bankid . "\"";
} else {
	echo "\"status\":0,";
	echo "\"error\":\"username already taken\"";
}
echo "}";
?>