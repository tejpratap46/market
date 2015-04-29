<?php
error_reporting ( 0 );
require ("../connection.php");

$fromid = $_GET ["fromid"];
$toid = $_GET ["toid"];
$balance = $_GET ["balance"];
$apikey = $_GET ['apikey'];
$listid = $_GET ['listid'];

// // encryption test
// $textToObfuscate = "tej pratap singh";
// $obfuscatedText = xor_this ( $textToObfuscate );
// $restoredText = xor_this ( $obfuscatedText );
// die ( "E : " . $obfuscatedText . " D : " . $restoredText );

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($fromid && $toid && $balance) {
	echo "{";
	$chechBal = mysql_query ( "SELECT balance FROM bank WHERE bankid = '" . $fromid . "'" );
	$balarray = mysql_fetch_array ( $chechBal );
	$bal = $balarray ['balance'];
	if ($bal >= $balance) {
		$id = uniqid ();
		$query = mysql_query ( "INSERT INTO `payment`(`id`, `from`, `to`, `balance`, `listid`) VALUES ('$id','$fromid','$toid','$balance','$listid')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		$idgenerated = xor_str ( $id );
		echo "\"id\":\"" . $idgenerated . "\""; // get last inserted id
	} else {
		echo "\"error\":\"insufficient balance\"";
	}
	echo "}";
} else {
	echo "{\"status\":0,";
	echo "\"error\":\"enter valid fromid,toid,balance\"}";
}
function xor_str($to_enc) {
	$xor_key = "123456789321654987123456789";
	$the_res = ""; // the result will be here
	for($i = 0; $i < strlen ( $to_enc ); ++ $i) {
		$the_res .= chr ( $xor_key {$i} ^ ord ( $to_enc {$i} ) );
	}
	return $the_res;
}
?>