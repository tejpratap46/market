<?php
$input = "1";
// $key = "12345";
$key = "" . strlen ( $input ) . "";
$encrypted = XOR_encrypt ( $input, $key );
$decrypted = XOR_decrypt ( $encrypted, $key );

echo "Encrypted: " . $encrypted . "<br>";
echo "Decrypted: " . $decrypted . "<br>";
function XOR_encrypt($msg, $key) {
	$ml = strlen ( $msg );
	$kl = strlen ( $key );
	$newmsg = "";
	
	for($i = 0; $i < $ml; $i ++) {
		$newmsg = $newmsg . ($msg [$i] ^ $key [$i % $kl]);
	}
	
	return base64_encode ( $newmsg );
}
function XOR_decrypt($encrypted_message, $key) {
	$msg = base64_decode ( $encrypted_message );
	$ml = strlen ( $msg );
	$kl = strlen ( $key );
	$newmsg = "";
	
	for($i = 0; $i < $ml; $i ++) {
		$newmsg = $newmsg . ($msg [$i] ^ $key [$i % $kl]);
	}
	
	return $newmsg;
}

?>