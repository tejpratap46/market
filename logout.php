<?php
if (isset ( $_COOKIE ['username'] )) {
	setcookie ( 'username', '', time () - (86400 * 30 * 12), '/' );
	header("Location: index.php");
}
?>