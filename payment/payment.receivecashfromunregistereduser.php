<?php
error_reporting ( 0 );
require('../config.php'); // has current server location and Stores bankid
require ("../connection.php");

$balance = $_GET ["balance"];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($balance) {
	$query = mysql_query ( "SELECT balance FROM bank WHERE bankid = '".Config::BANK_ID."'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );

	# check if from user id is valid
	isValidQuery($query, "storeId");

	$info = mysql_fetch_array ( $query );
	$tobankbalance = $info ['balance'];
	$tobankbalance = intval ( $tobankbalance ) + intval ( $balance );

	$query1 = mysql_query ( "UPDATE bank SET balance='" . $tobankbalance . "',lastupdate='" . date ( "d-m-y H:i:s" ) . "' WHERE bankid='" . Config::BANK_ID . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	$query = mysql_query ( "UPDATE `loyalty` SET `total_purchases`= total_purchases + 1,`total_ammount`=total_ammount+".$balance.",`points`= points + 0.005*".$balance." WHERE username='".$username."'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );

	if ($query1) {
		echo "{";
		echo "\"status\":1,";
		echo "\"balance\":\"" . $balance . "\",";
		echo "\"tobankid\":\"" . Config::BANK_ID . "\",";
		echo "\"tobankbalance\":\"" . $tobankbalance . "\",";
		echo "\"lastupdate\":\"" . date ( "d-m-y H:i:s" ) . "\",";

    $id = newRandomId();
		$query = mysql_query ( "INSERT INTO `payment_completed`(`id`, `fromid`, `toid`, `balance`, `listid`) VALUES ('$id','cash','".Config::BANK_ID."','$balance','')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		$query = mysql_query ( "SELECT gcmid FROM customer WHERE bankid = '" . $fromid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		$qArray = mysql_fetch_array($query);
		$gcmid = $qArray['gcmid'];
		$notiData = file_get_contents(Config::DB_SERVER."notification/notification.send.php?gcmId=".$gcmid."&payId=".$id."&ammount=".$balance . "&title=Payment Completed&message=Payment completed for payment id : ". $id . ", for Amount : ". $balance);
		echo '"notification":'.$notiData;
	} else {
		echo "\"status\":0,";
		echo "\"error\":\"cannot update\"";
	}
	echo "}";
} else {
	echo "{\"status\":0,";
	echo "\"error\":\"enter valid frombankid, balance\"}";
}

function newRandomId() {
	// $s = uniqid ( rand (), true );
	$s = uniqid ();
	$guidText = $s;
	// $guidText = substr ( $s, 0, 8 ) . '-' . substr ( $s, 8, 4 ) . '-' . substr ( $s, 12, 4 ) . '-' . substr ( $s, 16, 4 ) . '-' . substr ( $s, 20 );
	return $guidText;
}

function isValidQuery($query, $what){
	if (mysql_num_rows($query) == 0) {
		die ( "{\"status\":0," . "\"error\":\"invalid $what\"}" );
	}
}
?>
