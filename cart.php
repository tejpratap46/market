<?php
error_reporting ( 0 );
require 'connection.php';
session_start ();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cart :: One Store</title>
<link href="web/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="web/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="web/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="web/js/move-top.js"></script>
<script type="text/javascript" src="web/js/easing.js"></script>
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


<!-- Style For Table -->
<style>
body {
	width: 90%;
	margin: 40px auto;
	font-family: 'trebuchet MS', 'Lucida sans', Arial;
	font-size: 14px;
	color: #444;
}

table {
	*border-collapse: collapse; /* IE7 and lower */
	border-spacing: 0;
	width: 100%;
}

.bordered {
	border: solid #ccc 1px;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-radius: 6px;
	-webkit-box-shadow: 0 1px 1px #ccc;
	-moz-box-shadow: 0 1px 1px #ccc;
	box-shadow: 0 1px 1px #ccc;
}

.bordered tr:hover {
	background: #fbf8e9;
	-o-transition: all 0.1s ease-in-out;
	-webkit-transition: all 0.1s ease-in-out;
	-moz-transition: all 0.1s ease-in-out;
	-ms-transition: all 0.1s ease-in-out;
	transition: all 0.1s ease-in-out;
}

.bordered td, .bordered th {
	border-left: 1px solid #ccc;
	border-top: 1px solid #ccc;
	padding: 10px;
	text-align: left;
}

.bordered th {
	background-color: #dce9f9;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc),
		to(#dce9f9));
	background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
	background-image: -moz-linear-gradient(top, #ebf3fc, #dce9f9);
	background-image: -ms-linear-gradient(top, #ebf3fc, #dce9f9);
	background-image: -o-linear-gradient(top, #ebf3fc, #dce9f9);
	background-image: linear-gradient(top, #ebf3fc, #dce9f9);
	-webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, .8) inset;
	-moz-box-shadow: 0 1px 0 rgba(255, 255, 255, .8) inset;
	box-shadow: 0 1px 0 rgba(255, 255, 255, .8) inset;
	border-top: none;
	text-shadow: 0 1px 0 rgba(255, 255, 255, .5);
}

.bordered td:first-child, .bordered th:first-child {
	border-left: none;
}

.bordered th:first-child {
	-moz-border-radius: 6px 0 0 0;
	-webkit-border-radius: 6px 0 0 0;
	border-radius: 6px 0 0 0;
}

.bordered th:last-child {
	-moz-border-radius: 0 6px 0 0;
	-webkit-border-radius: 0 6px 0 0;
	border-radius: 0 6px 0 0;
}

.bordered th:only-child {
	-moz-border-radius: 6px 6px 0 0;
	-webkit-border-radius: 6px 6px 0 0;
	border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
	-moz-border-radius: 0 0 0 6px;
	-webkit-border-radius: 0 0 0 6px;
	border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
	-moz-border-radius: 0 0 6px 0;
	-webkit-border-radius: 0 0 6px 0;
	border-radius: 0 0 6px 0;
}
</style>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----webfonts--->
<link
	href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
	rel='stylesheet' type='text/css'>
<!---//webfonts--->
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
	<!----container---->
	<div class="container">
		<!----top-header---->
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
		<!----//top-header---->
		<!---top-header-nav---->
		<div class="top-header-nav">
			<!----start-top-nav---->
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
			<!----End-top-nav---->
			<!---top-header-search-box--->
			<div class="top-header-search-box">
				<form action="search.php" method="get">
					<input type="text" placeholder="Search" name="q" required maxlength="22"> <input
						type="submit" value=" ">
				</form>
			</div>
			<!---top-header-search-box--->
			<div class="clearfix"></div>
		</div>
	</div>
	<!--//top-header-nav---->
	<!----content---->
	<div class="content">
		<div class="container">
		<div class='special-products all-poroducts'>
			<h1 style="color: red;">Cart</h1>
			<table class="bordered" id="cart_table">
				<thead>
					<tr>
						<th>id</th>
						<th>Name</th>
						<th>Qty</th>
						<th>Cost per item</th>
						<th>Remove</th>
					</tr>
				</thead>
				<tbody id="items">
				<?php
				$itemsInCart = "";
				if ($_COOKIE ['username']) {
					$quary = mysql_query ( "SELECT items FROM cart WHERE username='" . $_COOKIE ['username'] . "'" );
					$qArray = mysql_fetch_array ( $quary );
					$item = $qArray ['items'];
					$itemsInCart = $item;
					showCart ( $item );
				} else {
					echo "<h2 style='text-align: center; width: 100%;'>Login To Use Cart</h2>";
				}
				?>
				</tbody>
			</table>
			<?php
			if ($_COOKIE ['username']) {
				if (strlen ( $itemsInCart ) < 10) {
					echo "<!-- ";
				}
			}
			?>
			<button style='width: 100%; padding: 1%; margin-top: 2%'
				class='btn btn-lg btn-primary' type='button' onclick='saveList();'>Save List</button>
			<div class='alert alert-info' role='alert' style="margin-top: 2%;">
				<strong>List Not Saved </strong>Save This List If You Want To See
				This List In Your Profile. Lists Saved In Profiles Are More Easy To
				Access.
			</div>
			<?php
			if ($_COOKIE ['username']) {
				if (strlen ( $itemsInCart ) < 10) {
					echo " -->";
				}
			}
			?>
		</div>
		<div class='notification' style='display: none'>Removed</div>
	
	<?php
	function showCart($item) {
		if ($_COOKIE ['username']) {
			preg_match_all ( "#<id.*?>([^<]+)</id>#", $item, $ids );
			preg_match_all ( "#<name.*?>([^<]+)</name>#", $item, $names );
			preg_match_all ( "#<quantity.*?>([^<]+)</quantity>#", $item, $qtys );
			preg_match_all ( "#<cost.*?>([^<]+)</cost>#", $item, $costs );
			for($i = 0; $i < count ( $ids [1] ); $i ++) {
				echo "<tr>";
				echo "<td>" . $ids [1] [$i] . "</td>";
				echo "<td><a href='single-page.php?id=" . $ids [1] [$i] . "'>" . $names [1] [$i] . "</a></td>";
				echo "<td>" . $qtys [1] [$i] . "</td>";
				echo "<td>" . $costs [1] [$i] . "</td>";
				echo "<td><button onclick=\"removeFromCart('$i');\">X</button></td>";
				// echo "<td><button onclick=\"removeFromCart('" . "<id>" . $ids [1] [$i] . "</id>" . "<name>" . $names [1] [$i] . "</name>" . "<quantity>" . $qtys [1] [$i] . "</quantity>" . "<cost>" . $costs [1] [$i] . "</cost>" . "');\">X</button></td>";
				echo "</tr>";
			}
		} else {
			echo "<h2 style='text-align: center; width: 100%;'>Login To Use Cart</h2>";
		}
	}
	?>
	
	<script>
			
				<?php
				if (! isset ( $_COOKIE ['username'] )) {
					echo "/*";
				}
				?>
				
				function removeFromCart(pos) {
		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function() {
		            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		            	var items = xmlhttp.responseText;
		            	$('#items').html(items);
		            	if (items.length < 10) {
		            		$('.btn-primary').hide();
		            		$('.alert-info').hide();
						}
		            	// $('.notification').html(items);
		            	$('.notification').stop().fadeIn(400).delay(3000).fadeOut(400);
		            	// alert(items);
		            }
		        }
		        
		        xmlhttp.open("GET", "ajax/removefromcart.php?pos=" + pos + "&u=<?php echo $_COOKIE['username'];?>", true);
		        xmlhttp.send();
				}

				function saveList() {
			        var xmlhttp = new XMLHttpRequest();
			        xmlhttp.onreadystatechange = function() {
			            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			            	var items = xmlhttp.responseText;
			            	if (items.length < 10) {
			            		$('.btn-primary').hide();
			            		$('.alert-info').html("<strong>List Is Saved Now </strong>Access List From Yout Profile <a href='profile.php'>View Profile</a>");
							}
			            	// $('.notification').html(items);
			            	$('.notification').stop().fadeIn(400).delay(3000).fadeOut(400);
			            	// alert(items);
			            }
			        }
			        
			        xmlhttp.open("GET", "ajax/savelist.php?u=<?php echo $_COOKIE['username'];?>", true);
			        xmlhttp.send();
					}
		        <?php
										if (! isset ( $_COOKIE ['username'] )) {
											echo "*/\n";
										}
										?>
			
	</script>
		</div>
		<!----content---->
		<!----footer--->
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
		<!---//footer--->
		<!---copy-right--->
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
		<!--//copy-right--->
	</div>
	<!----container---->
</body>
</html>