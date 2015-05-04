<?php
error_reporting ( 0 );
require ("../connection.php");

$id = $_GET ["id"];
$bankid = $_GET ["bankid"];
$apikey = $_GET ['apikey'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($id && $bankid) {
	echo "{";
	$query = mysql_query ( "SELECT * FROM payment WHERE id = '" . $id . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows($query) == 0){
		die ( "\"status\":0," . "\"error\":\"Invalid payment id\"}" );
	}
	$payArray = mysql_fetch_array ( $query );
	$fromid = $payArray ['from'];
	$toid = $payArray ['to'];
	$balance = $payArray ['balance'];
	if ($toid == $bankid) {
		$query = mysql_query ( "SELECT balance FROM bank WHERE bankid = '" . $fromid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		$info = mysql_fetch_array ( $query );
		$frombankbalance = $info ['balance'];
		$frombankbalance = intval ( $frombankbalance ) - intval ( $balance );
		$query = mysql_query ( "SELECT balance FROM bank WHERE bankid = '" . $toid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		$info = mysql_fetch_array ( $query );
		$tobankbalance = $info ['balance'];
		$tobankbalance = intval ( $tobankbalance ) + intval ( $balance );
		
		$query1 = mysql_query ( "UPDATE bank SET balance='" . $frombankbalance . "',lastupdate='" . date ( "d-m-y H:i:s" ) . "' WHERE bankid='" . $fromid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		$query1 = mysql_query ( "UPDATE bank SET balance='" . $tobankbalance . "',lastupdate='" . date ( "d-m-y H:i:s" ) . "' WHERE bankid='" . $toid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
		
		if ($query1 && $query1) {
			echo "\"status\":1,";
			echo "\"balance\":\"" . $balance . "\",";
			echo "\"frombankid\":\"" . $fromid . "\",";
			echo "\"tobankid\":\"" . $toid . "\",";
			echo "\"frombankbalance\":\"" . $frombankbalance . "\",";
			echo "\"tobankbalance\":\"" . $tobankbalance . "\",";
			echo "\"lastupdate\":\"" . date ( "d-m-y H:i:s" ) . "\",";
			
			$query = mysql_query ( "DELETE FROM `payment` WHERE id = '" . $id . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
			$query = mysql_query ( "INSERT INTO `payment_completed`(`id`, `fromid`, `toid`, `balance`, `listid`) VALUES ('$id','$fromid','$toid','$balance','')" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
			$query = mysql_query ( "SELECT gcmid FROM customer WHERE bankid = '" . $fromid . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
			$qArray = mysql_fetch_array($query);
			$gcmid = $qArray['gcmid'];
			require('../config.php'); // has current server location
			$notiData = file_get_contents(Config::DB_SERVER."notification/notification.send.php?gcmId=".$gcmid."&payId=".$id."&ammount=".$balance);
			echo '"notification":'.$notiData;
		} else {
			echo "\"status\":0,";
			echo "\"error\":\"cannot update\"";
		}
	} else {
		echo "\"error\":\"your bankid and bankid in database does not match\"";
	}
	echo "}";
} else {
	echo "{\"status\":0,";
	echo "\"error\":\"enter valid id, bankid\"}";
}
?>