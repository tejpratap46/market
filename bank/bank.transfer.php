<?php
error_reporting ( 0 );
require ("../connection.php");
require ('../config.php');

$frombankid = $_GET ['frombankid'];
$tobankid = $_GET ['tobankid'];
$balance = $_GET ['balance'];
$listid = $_GET ['listid'];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if (strlen ( $frombankid ) < 1 || strlen ( $balance ) < 1 || strlen ( $tobankid ) < 1) {
	die ( "{\"status\":0," . "\"error\":\"enter all fields ['frombankid','tobankid','apikey','balance']\"}" );
}

$fromquery = mysql_query ( "SELECT balance,username FROM bank where bankid = '" . $frombankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$info = mysql_fetch_array ( $fromquery );
$frombankbalance = $info ['balance'];
$username = $info ['username'];
$frombankbalance = intval ( $frombankbalance ) - intval ( $balance );
$toquery = mysql_query ( "SELECT balance FROM bank where bankid = '" . $tobankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$info = mysql_fetch_array ( $toquery );
$tobankbalance = $info ['balance'];
$tobankbalance = intval ( $tobankbalance ) + intval ( $balance );
if (mysql_num_rows($fromquery) > 0 || mysql_num_rows($fromquery) > 0) {
	$query1 = mysql_query ( "UPDATE bank SET balance='" . $frombankbalance . "',lastupdate='" . date ( "d-m-y H:i:s" ) . "' WHERE bankid='" . $frombankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$query1 = mysql_query ( "UPDATE bank SET balance=balance + '" . $balance . "',lastupdate='" . date ( "d-m-y H:i:s" ) . "' WHERE bankid='" . $tobankid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$payId = newRandomId();
	$query = mysql_query ( "INSERT INTO `payment_completed`(`id`, `fromid`, `toid`, `balance`, `listid`) VALUES ('" . $payId . "','$frombankid','$tobankid','$balance','$listid')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$query = mysql_query ( "UPDATE `loyalty` SET `total_purchases`= total_purchases + 1,`total_ammount`=total_ammount+".$balance.",`points`= points + 0.005*".$balance." WHERE username='".$username."'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	echo "{";
	if ($query1 && $query1) {
		echo "\"status\":1,";
		echo "\"balance\":\"" . $balance . "\",";
		echo "\"frombankid\":\"" . $frombankid . "\",";
		echo "\"tobankid\":\"" . $tobankid . "\",";
		echo "\"frombankbalance\":\"" . $frombankbalance . "\",";
		echo "\"tobankbalance\":\"" . $tobankbalance . "\",";
		echo "\"lastupdate\":\"" . date ( "d-m-y H:i:s" ) . "\",";
		
		
		$notiUrl = Config::DB_SERVER . "notification/notification.send.php?gcmId=" . Config::GCM_ID . "&payId=" . $payId . "&ammount=" . $balance . "&title=Payment Completed&message=Payment completed for payment id : ". $payId . ", for Amount : ". $balance;
		$notiData = file_get_contents ( $notiUrl );
		echo '"notification":' . $notiData;
	} else {
		echo "\"status\":0,";
		echo "\"error\":\"cannot update\"";
	}
}else{
	echo "{\"status\":0,";
	echo "\"error\":\"cannot update\"";
}
echo "}";

function newRandomId() {
	// $s = uniqid ( rand (), true );
	$s = uniqid ();
	$guidText = $s;
	// $guidText = substr ( $s, 0, 8 ) . '-' . substr ( $s, 8, 4 ) . '-' . substr ( $s, 12, 4 ) . '-' . substr ( $s, 16, 4 ) . '-' . substr ( $s, 20 );
	return $guidText;
}
?>