<?php
error_reporting ( 0 );
require ("../connection.php");
session_start ();

if (!isset($_COOKIE['admin'])) {
    header('Location: login.php');
}

$name = $_POST ['name'];
$email = $_POST ['email'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$bankid = $_POST ['bankid'];

if (! empty ( $username ) || ! empty ( $password )) {
	$query = "INSERT INTO manager (username,password,last_login) VALUES ('$username','$password','".date ( "d-m-y H:i:s" )."')";
	$data = mysql_query ( $query ) or die ( "{\"status\":0," . "\"error\":\"" . "Invalid Username" . "\"}" );
	if ($data) {
		setcookie ( 'admin', $username, time () + (86400 * 30 * 12), "/" );
		header ( "Location: index.php" );
	} else {
		echo "<h3>error" . mysql_error () . "</h3>";
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>One Store :: Register</title>
<link href="../web/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../web/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="../web/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="../web/js/move-top.js"></script>
<script type="text/javascript" src="../web/js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!---- start-smoth-scrolling---->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----../webfonts--->
<link
	href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
	rel='stylesheet' type='text/css'>
<!---//../webfonts--->
<!----start-top-nav-script---->
<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
<!----//End-top-nav-script---->
</head>
<body>
	<div class='contact-form'
		style="width: 100%; height: 100%; align: center; padding: 5%;">
		<h1 style="text-align: center; width: 100%;">Register</h1>
		<form action="" method="POST" class="text2">
			<input type="text" placeholder="Name" class="text"
				style="display: block; height: 40px;" name="name" required /> <input
				type="text" placeholder="UserName" class="text"
				style="display: block; height: 40px;" name="username" required /> <input
				type="password" placeholder="Password" name="password" class="text"
				style="display: block; height: 40px;" required /> <input
				type="email" placeholder="Email Id" name="email" class="text"
				style="display: block; height: 40px;" required /> <input type="text"
				placeholder="Bank Id" name="bankid" class="text"
				style="display: block; height: 40px;" required /> <span> <input
				class="" type="submit" value="Register" style="width: 98%;"></input>
			</span>
		</form>
	</div>
</body>
</html>