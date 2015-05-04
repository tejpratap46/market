<?php
error_reporting ( 0 );
require 'connection.php';
session_start ();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>All Products :: One Store</title>
<link href="web/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="web/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="web/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="web/js/move-top.js"></script>
<script type="text/javascript" src="web/js/easing.js"></script>
<script type="text/javascript" src="web/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="web/js/jquery.qrcode.min.js"></script>

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
<!--webfonts-->
<link
	href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
	rel='stylesheet' type='text/css'>
<!--//webfonts-->
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
	<!--container-->
	<div class="container">
		<!--top-header-->
		<div class="top-header">
			<div class="logo">
				<a href="index.php"><img src="web/images/logo.png" title="barndlogo" /></a>
			</div>
			<div class="top-header-info">
				<div class="top-contact-info">
					<ul class="unstyled-list list-inline">
						<li><span class="phone"> </span>090 - 223 44 66</li>
						<li><span class="mail"> </span><a href="mailto:tejpratap@gmail.com">tejpratap@gmail.com</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="cart-details">
					<div class="add-to-cart">
						<a href="cart.php"><ul class="unstyled-list list-inline">
							<li><span class="cart"> </span>
								<ul class="cart-sub">
									<li><p>Cart</p></li>
								</ul></li>
						</ul></a>
					</div>
					<div class="login-rigister"
						<?php if (isset($_COOKIE['username'])){echo "hidden";}?>>
						<ul class="unstyled-list list-inline">
							<li><a class="login" href="login.php">Login</a></li>
							<li><a class="rigister" href="register.php">REGISTER <span> </span></a></li>
							<div class="clearfix"></div>
						</ul>
					</div>
					<div class="login-rigister"
						<?php if (!isset($_COOKIE['username'])){echo "hidden";}?>>
						<ul class="unstyled-list list-inline">
						<li><a class="login" href="logout.php">Logout</a></li>
							<li><a class="rigister" href="profile.php"><?php echo $_COOKIE['username']?><span>
								</span></a></li>
							<div class="clearfix"></div>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<!--//top-header-->
		<!--top-header-nav-->
		<div class="top-header-nav">
			<!--start-top-nav-->
			<nav class="top-nav main-menu">
				<ul class="top-nav">
					<li><a href="products.php">PRODUCTS </a><span> </span></li>
					<li><a href="topselling.php">TOP SELLING</a><span> </span></li>
					<li><a href="newarrivals.php">NEW ARRIVALS</a><span> </span></li>
					<li><a href="categoties.php">CATEGORIES</a><span> </span></li>
					<li><a href="brands.php">BRANDS</a></li>
					<div class="clearfix"></div>
				</ul>
				<a href="#" id="pull"><img src="web/images/nav-icon.png"
					title="menu" /></a>
			</nav>
			<!--End-top-nav-->
			<!--top-header-search-box-->
			<div class="top-header-search-box">
				<form action="search.php" method="get">
					<input type="text" placeholder="Search" name="q" required maxlength="22"> <input
						type="submit" value=" ">
				</form>
			</div>
			<!--top-header-search-box-->
			<div class="clearfix"></div>
		</div>
	</div>
	<!--//top-header-nav-->
	<!--content-->
	<div class="content">
		<div class="container">
		<hr>
		<div class="thumbnail">
			<div class="well" style="text-align: center;">
				<h3>Pay For : </h3>
				<h1>Rs. <span style="font-size: 3em; font-weight: bold;"><?php echo $_POST['ammount'] ?></span></h1>
			</div>
			<div class="well" style="text-align: center;">
				<h3>Pay By : </h3>
				<div class="row">
					<div class="col-md-4" style='text-align: center;'>
						<button style='width: 95%;padding: 5%; margin:5%;' class='btn btn-lg btn-success' type='button' onclick="payOnline();" >Online Payment</button>
					</div>
					<div class="col-md-4" style='text-align: center;'>
						<button style='width: 95%;padding: 5%; margin:5%;' class='btn btn-lg btn-primary' type='button' onclick="payQr();" >Qr Code Payment</button>
					</div>
					<div class="col-md-4" style='text-align: center;'>
						<button style='width: 95%;padding: 5%; margin:5%;' class='btn btn-lg btn-info' type='button' onclick="payBarcode();" >Barcode Payment</button>
					</div>
				</div>
			</div>
			<div class="row" style="text-align: center;">
				<div class="col-md-12">
					<canvas id="barcode" style="width: 100%;"></canvas>
				</div>
				<div class="col-md-12">
					<div id="qrcode" style="width: 100%;"></div>
				</div>
			</div>
		</div>
		<hr>
		</div>
		<!--content-->
		<!--footer-->
		<div class="footer">
			<div class="container">
				<div class="col-md-3 footer-logo">
					<a href="index.php"><img src="web/images/flogo.png"
						title="brand-logo" /></a>
				</div>
				<div class="col-md-7 footer-links">
					<ul class="unstyled-list list-inline">
						<li><a href="#"> Faq</a> <span> </span></li>
						<li><a href="#"> Terms and Conditions</a> <span> </span></li>
						<li><a href="#"> Secure Payments</a> <span> </span></li>
						<li><a href="#"> Shipping</a> <span> </span></li>
						<li><a href="contact.html"> Contact</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="col-md-2 footer-social">
					<ul class="unstyled-list list-inline">
						<li><a class="pin" href="#"><span> </span></a></li>
						<li><a class="twitter" href="#"><span> </span></a></li>
						<li><a class="facebook" href="#"><span> </span></a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		
		<div class='notification' style='display: none'>Loading...</div>

		<!--//footer-->
		<!--copy-right-->
		<script>
			<?php
			if (! isset ( $_COOKIE ['username'], $_POST['ammount'],$_POST['listid'] )) {
				echo "*/\n";
			}else{
				$query = mysql_query("SELECT * FROM customer WHERE username='".$_COOKIE['username']."'");
				$qArray = mysql_fetch_array($query);
				$bankid = $qArray['bankid'];
			}
			?>
			function payOnline(){
				$('.notification').text('Loading...');
				$('.notification').show();
				$.get('bank/bank.transfer.php?apikey=tejpratap&frombankid=' + <?php echo $bankid;?> + '&tobankid=' + '0000000000' + '&balance=' + <?php echo $_POST['ammount']; ?> + '&listid=' + <?php echo $_POST['listid']; ?>, function(data) {
					// alert(data);
					$('.notification').hide();
					var obj = jQuery.parseJSON( data );
					if (obj.status == 1) {
						var newBalance = obj.frombankbalance;
						$('.notification').stop().text('Payment Completed, Your New Balance Is ' + newBalance).fadeIn(400).delay(10000).fadeOut(400);
					}else{
						var error = obj.error;
						$('.notification').stop().text('Error In Payment : ' + error).fadeIn(400).delay(10000).fadeOut(400);
					}
				});
			}

			// So that user do not create duplicate payment instances, this will store the payment id
			var paymentId = null;

			function payQr(){
				// clear qrcode div for new payment
				$('#qrcode').html('');
				// check if has a payment id
				if(paymentId == null){
					$('.notification').text('Loading...');
					$('.notification').show();
					$.get('payment/payment.send.php?apikey=tejpratap&fromid=' + <?php echo $bankid;?> + '&toid=' + '0000000000' + '&balance=' + <?php echo $_POST['ammount']; ?> + '&listid=' + <?php echo $_POST['listid']; ?>, function(data) {
						// alert(data);
						$('.notification').hide();
						var obj = jQuery.parseJSON( data );
						if (obj.status == 1) {
							var id = obj.id;
							paymentId = id;
							// jquery('#qrcode').qrcode({width: 128,height: 128,text: id});
							jQuery('#qrcode').qrcode({
								text	: id
							});	
							$('#barcode').hide(); // toggling visibility
							$('#qrcode').show();
							$('.notification').stop().text('Let The ShopKeeper Scan This QR Code' + newBalance).fadeIn(400).delay(10000).fadeOut(400);
						}else{
							var error = obj.error;
							$('.notification').stop().text('Error In Payment : ' + error).fadeIn(400).delay(10000).fadeOut(400);
						}
					});
				}else{
					jQuery('#qrcode').qrcode({
							text	: paymentId
						});	
					$('#barcode').hide();
					$('#qrcode').show();
					$('.notification').stop().text('Let The ShopKeeper Scan This QR Code' + newBalance).fadeIn(400).delay(10000).fadeOut(400);
				}
			}

			function payBarcode(){
				// check if has a payment id
				if(paymentId == null){
					$('.notification').text('Loading...');
					$('.notification').show();
					$.get('payment/payment.send.php?apikey=tejpratap&fromid=' + <?php echo $bankid;?> + '&toid=' + '0000000000' + '&balance=' + <?php echo $_POST['ammount']; ?> + '&listid=' + <?php echo $_POST['listid']; ?>, function(data) {
						// alert(data);
						$('.notification').hide();
						var obj = jQuery.parseJSON( data );
						if (obj.status == 1) {
							var id = obj.id;
							paymentId = id;
							$("#barcode").JsBarcode(id,{format:"CODE128",width:2,height:50});
							$('#barcode').show();
							$('#qrcode').hide();
							$('.notification').stop().text('Let The ShopKeeper Scan This BarCode' + newBalance).fadeIn(400).delay(10000).fadeOut(400);
						}else{
							var error = obj.error;
							$('.notification').stop().text('Error In Payment : ' + error).fadeIn(400).delay(10000).fadeOut(400);
						}
					});
				}else{
					$("#barcode").JsBarcode(paymentId,{format:"CODE128",width:2,height:50});
					$('#barcode').show();
					$('#qrcode').hide();
					$('.notification').stop().text('Let The ShopKeeper Scan This BarCode' + newBalance).fadeIn(400).delay(10000).fadeOut(400);
				}
			}
			<?php
			if (! isset ( $_COOKIE ['username'], $_POST['ammount'],$_POST['listid'] )) {
				echo "*/\n";
			}
			?>
		</script>
		<div class="copy-right">
			<div class="container">
				<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
				<a href="#" id="toTop" style="display: block;"> <span
					id="toTopHover" style="opacity: 1;"> </span></a>
			</div>
		</div>
		<!--//copy-right-->
	</div>
	<!--container-->
</body>
</html>