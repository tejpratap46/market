<?php
error_reporting ( 0 );
require ("../connection.php");
require '../config.php';

$fromid = $_GET ["fromid"];
$toid = $_GET ["toid"];
$balance = $_GET ["balance"];
$apikey = $_GET ['apikey'];
$listid = $_GET ['listid'];

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
		$id = newRandomId (); // get a random id for payment
		$query = mysql_query ( "INSERT INTO `payment`(`id`, `from`, `to`, `balance`, `listid`) VALUES ('$id','$fromid','$toid','$balance','$listid')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		$idgenerated = xor_str ( $id );
		echo "\"status\":1,";
		echo "\"id\":\"" . $idgenerated . "\""; // get last inserted id
	} else {
		echo "\"error\":\"insufficient balance\"";
	}
	echo "}";
} else {
	echo "{\"status\":0,";
	echo "\"error\":\"enter valid fromid,toid,balance\"}";
}

/*
 * And Here Is The Greatest Enctyprion Technique You Have Ever Seen
 * encryption test
 * $textToObfuscate = "tej pratap singh";
 * $obfuscatedText = xor_this ( $textToObfuscate );
 * $restoredText = xor_this ( $obfuscatedText );
 * die ( "E : " . $obfuscatedText . " D : " . $restoredText );
 */
function xor_str($to_enc) {
	$xor_key = Config::ENCRYPETION_KEY;
	$the_res = ""; // the result will be here
	for($i = 0; $i < strlen ( $to_enc ); ++ $i) {
		$the_res .= chr ( $xor_key {$i} ^ ord ( $to_enc {$i} ) );
	}
	return $the_res;
}

/*
 * Generate Randomest Unique Id
 * It Takes 3 functions
 * 1. uniqid(rand(), true); -> this is a microsecond based unique id with a random number as a prefix
 * 2. md5() -> Now Hash The String We Got To A One Way Encryption MD5
 * 3. strtoupper() -> Now Make Everything Upper Case
 * 4. Generate XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX style unique id, (8 letters)-(4 letters)-(4 letters)-(4 letters)-(12 letters)
 */
function newRandomId() {
	// $s = uniqid ( rand (), true );
	$s = uniqid ();
	$guidText = $s;
	// $guidText = substr ( $s, 0, 8 ) . '-' . substr ( $s, 8, 4 ) . '-' . substr ( $s, 12, 4 ) . '-' . substr ( $s, 16, 4 ) . '-' . substr ( $s, 20 );
	return $guidText;
}

/*
 * Another Random Function That Uses A Crazy Set Of Dyanamic Generating Functions To Give A New Unique Id
 */
function randomId() {
	return date ( 'YmdHis' ) . '_' . str_pad ( rand ( 1, 999999 ), 6, '0', STR_PAD_LEFT );
}
?>