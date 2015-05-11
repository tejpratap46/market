<?php
error_reporting ( 0 );
require ("../../connection.php");
session_start ();

if (!isset($_COOKIE['admin'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>One Store :: Market Add</title>
<link href="../../web/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../../web/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="../../web/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="../../web/js/move-top.js"></script>
<script type="text/javascript" src="../../web/js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!-- start-smoth-scrolling-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--../webfonts-->
<link
	href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
	rel='stylesheet' type='text/css'>
<!--//../webfonts-->
<!--start-top-nav-script-->
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
<!--//End-top-nav-script-->
</head>
<body>
	<div class='contact-form well' style="margin: 2%;">
		<h1 style="text-align: center; width: 100%;">Add Item</h1>
		<form action="#" method="POST" class="text2">
			<input type="text" placeholder="itemid" class="text" style="display: block; height: 40px;" name="name" required />
			<input type="text" placeholder="itemname" class="text" style="display: block; height: 40px;" name="username" required />
			<input type="text" placeholder="itemprice" name="text" class="text" style="display: block; height: 40px;" required />
			<input type="text" placeholder="itemdiscreption" name="itemdiscreption" class="text" style="display: block; height: 40px;" required />
			<input type="text" placeholder="itemspecification" name="itemspecification" class="text" style="display: block; height: 40px;" required />
			<span> <input class="" type="submit" value="Add" style="width: 98%;" /> </span>
		</form>
	</div>
</body>
</html>