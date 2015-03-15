<?php
require 'MCrypt.php';

$mcrypt = new MCrypt();
#Encrypt
$encrypted = $mcrypt->encrypt("Text to encrypt");
#Decrypt
$decrypted = $mcrypt->decrypt($encrypted);

echo "E : ".$encrypted." D : ".$decrypted;
?>