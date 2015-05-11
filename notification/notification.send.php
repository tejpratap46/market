<?php
if ($_GET ['gcmId'] && $_GET['title'] && $_GET['message']) {
	// API access key from Google API's Console
	define ( 'API_ACCESS_KEY', 'AIzaSyCxTsUP3saX-BUPA2KNQKdsyMmUSGwYfQI' );
	$registrationIds = array (
			$_GET ['gcmId'] 
	);
	// prep the bundle
	$msg = array (
			'message' => $_GET['message'] ,
			'title' => $_GET['title'] ,
			'payid' => $_GET['payId'] ,
			'ammount' => $_GET['ammount'] ,
			'vibrate' => true,
			'sound' => true
	);
	$fields = array (
			'registration_ids' => $registrationIds,
			'data' => $msg 
	);
	$headers = array (
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json' 
	);
	$ch = curl_init ();
	curl_setopt ( $ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
	curl_setopt ( $ch, CURLOPT_POST, true );
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode ( $fields ) );
	$result = curl_exec ( $ch );
	curl_close ( $ch );
	echo $result;
}else{
	echo '{"status":0,"error":"Enter gcmId, payId, ammount"}';
}
?>