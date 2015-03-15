<?php
// does not work with numbers
// encrypt
$text = "123";
$key = "3";
$cypher = Encrypt ( $text, $key, '1' );
echo $cypher."    ";
// decrypt
echo Encrypt ( $cypher, $key, '0' );

// implementation
function AlphaToNum($str) {
	$str = strtolower ( $str );
	return ord ( $str ) - 97;
}
function NumToAlpha($str) {
	return chr ( $str + 97 );
}
function Longest($m, $k) {
	if (strlen ( $m ) > strlen ( $k )) {
		return strlen ( $m );
	} else {
		return strlen ( $k );
	}
}

// NOTE: VARIABLE ARE LONG ENOUGH TO REPRESENT ALSO AS COMMENTS
// PLEASE REFER ALSO WIKIPEDIA ARTICLE http://en.wikipedia.org/wiki/One-time_pad
function Encrypt($Message, $Key, $IsEncrypt) {
	$MessageArray [100] = '';
	$KeyArray [100] = '';
	$SubResultArray [100] = '';
	
	$LongestInputIncrement = 0;
	$LongestInputLenght = 0;
	$LongestInputLenght = Longest ( $Message, $Key );
	
	// CONVERTION OF MESSAGE TO NUMBER FOR EXAMPLE
	// 7 (H) 4 (E) 11 (L) 11 (L) 14 (O) message
	$MessageLimitIncrement = 0;
	for($LongestInputIncrement = 1; $LongestInputIncrement <= $LongestInputLenght; $LongestInputIncrement ++) {
		$MessageLimitIncrement = $MessageLimitIncrement + 1;
		if ($MessageLimitIncrement == strlen ( $Message ) + 1) {
			$MessageLimitIncrement = 1;
		}
		$MessageArray [$LongestInputIncrement - 1] = substr ( $Message, $MessageLimitIncrement - 1, 1 );
	}
	
	// CONVERTION OF KEY TO NUMBER FOR EXAMPLE
	// 23 (X) 12 (M) 2 (C) 10 (K) 11 (L)
	$KeyLimitIncrement = 0;
	for($LongestInputIncrement = 1; $LongestInputIncrement <= $LongestInputLenght; $LongestInputIncrement ++) {
		$KeyLimitIncrement = $KeyLimitIncrement + 1;
		if ($KeyLimitIncrement == strlen ( $Key ) + 1) {
			$KeyLimitIncrement = 1;
		}
		$KeyArray [$LongestInputIncrement - 1] = substr ( $Key, $KeyLimitIncrement - 1, 1 );
	}
	
	$sMessage = '';
	$sKey = '';
	$SubResultArrayIncrement = 0;
	
	for($SubResultArrayIncrement = 1; $SubResultArrayIncrement <= $LongestInputLenght; $SubResultArrayIncrement ++) {
		$sMessage = $MessageArray [$SubResultArrayIncrement - 1];
		$sKey = $KeyArray [$SubResultArrayIncrement - 1];
		
		if ($IsEncrypt == '1') {
			// CONVERTED MESSAGE AND KEY WILL BE INDIVIDUALLY ADDED
			// 30 16 13 21 25 message + key
			// AND STORE IN AN ARRAY
			$SubResultArray [$SubResultArrayIncrement] = (AlphaToNum ( $sMessage ) + AlphaToNum ( $sKey )) % 26;
			// echo AlphaToNum($sKey).'<br>';
		} else {
			// CONVERTED MESSAGE AND KEY WILL BE ADDED BY 26
			// OR THE CONVERTED CIPHER TEXT WILL SUBTRACTED BY CONVERTED KEY
			// -19 4 11 11 14 ciphertext — key
			// AND STORE IN AN ARRAY
			$SubResultArray [$SubResultArrayIncrement] = (AlphaToNum ( $sMessage ) - AlphaToNum ( $sKey ) + 26) % 26;
		}
	}
	
	$Result = '';
	for($MessageIncrement = 1; $MessageIncrement <= $LongestInputLenght; $MessageIncrement ++) {
		// STORED ARRAY OF NUMBERS WILL BE CONVERTED TO ALPHABET
		// AND EACH WILL BE APPENDED TO CREATE A WORD
		// 7 (H) 4 (E) 11 (L) 11 (L) 14 (O)
		$Result = $Result . NumToAlpha ( $SubResultArray [$MessageIncrement] );
	}
	
	return $Result;
}
?>