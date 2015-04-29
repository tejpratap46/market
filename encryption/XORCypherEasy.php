<?php
function xor_this($string) {
	$key = "" . strlen ( $string ) . ""; // Let's define our key here
	$text = $string; // Our plaintext/ciphertext
	$outText = ''; // Our output text
	for($i = 0; $i < strlen ( $text );) { // Iterate through each character
		for($j = 0; ($j < strlen ( $key ) && $i < strlen ( $text )); $j ++, $i ++) {
			$outText .= $text {$i} ^ $key {$j};
			// echo 'i='.$i.', '.'j='.$j.', '.$outText{$i}.'<br />'; //for debugging
		}
	}
	return $outText;
}

function xor_str($to_enc) {
	$xor_key = "123456789321654987123456789";
	$the_res = ""; // the result will be here
	for($i = 0; $i < strlen ( $to_enc ); ++ $i) {
		$the_res .= chr ( $xor_key {$i} ^ ord ( $to_enc {$i} ) );
	}
	return $the_res;
}

// encryption test
$textToObfuscate = "4644a?b89bc1b";
$obfuscatedText = xor_str ( $textToObfuscate );
$restoredText = xor_str ( $obfuscatedText );
die ( "E : " . $obfuscatedText . " D : " . $restoredText );
?>