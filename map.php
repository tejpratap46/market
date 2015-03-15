<?php
error_reporting ( 0 );
require 'connection.php';
require 'orientation/TSP.php';
session_start ();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Map :: One Store</title>
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
						<li><span class="mail"> </span><a
							href="mailto:tejpratap@gmail.com">tejpratap@gmail.com</a></li>
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
			<div class="special-products all-poroducts">
			<?php
			$mapQuery = mysql_query ( "SELECT * FROM maps WHERE floor='" . $_GET ['floor'] . "'" );
			$mapArray = mysql_fetch_array ( $mapQuery );
			echo "<img alt='" . $mapArray ['imagealt'] . "' src='" . $mapArray ['imageurl'] . "' style='max-width: 100%;'/>\n";
			?>
			</div>
			
			<?php
			$query = mysql_query ( "SELECT `items` FROM `lists` WHERE `listid` = '" . $_GET ['listid'] . "'" );
			findRoute ( $query );
			?>
			
		</div>
		<?php
		function findRoute($query) {
			$items = mysql_fetch_array ( $query );
			preg_match_all ( "#<id.*?>([^<]+)</id>#", $items ['items'], $matches );
			$itemcount = array_count_values ( $matches [1] );
			$i = 0; // foreach count
			$pixels = array ();
			$tsp = new TSP (); // TSP object to calculate path
			foreach ( $itemcount as $key => $value ) { // $key = itemid, $value = count
				$marketQuery = mysql_query ( "SELECT `itemlocation` FROM `market` WHERE `itemid` = '" . $key . "'" );
				$itemLocation = mysql_fetch_array ( $marketQuery );
				$locationQuery = mysql_query ( "SELECT `latlong`, `pixelloc` FROM `location` WHERE `code`='" . $itemLocation ['itemlocation'] . "'" );
				$location = mysql_fetch_array ( $locationQuery );
				$array = str_getcsv ( $location ['latlong'] );
				$pixels = array_merge ( $pixels, str_getcsv ( $location ['pixelloc'] ) );
				$i ++;
				// echo $i." -> ".$array [0] . " " . $array [1] . " " . $array [2] . "<br />";
				$tsp->add ( $itemLocation ['itemlocation'], $array [0], $array [1] );
			}
			$tsp->compute ();
			
			// editImage($pixels);
			
			// echo 'Shortest Distance: ' . $tsp->shortest_distance ();
			// echo '<br />Shortest Route: ';
			echo "<div class='special-products all-poroducts'>";
			// print_r ( $tsp->shortest_route () );
			// echo "<h2>".json_encode ( $tsp->shortest_route () )."</h2>";
			printPath ( $tsp->shortest_route () );
			echo "</div>";
			// echo '<br />Num Routes: ' . count ( $tsp->routes () );
			// echo '<br />Matching shortest Routes: ';
			echo "<div class='special-products all-poroducts'>";
			printSimilarPath ( $tsp->matching_shortest_routes () );
			echo "</div>";
			// echo '<br />All Routes: ';
			// print_r ( $tsp->routes () );
		}
		function printPath($array) {
			echo "<h1>For shortest route, follow :</h1>";
			foreach ( $array as $key => $value ) {
				if ($key == 0) {
					echo "<p>Start from Shop No. : " . $value . "</p>";
				} else {
					echo "<p>Then Goto Shop No. : " . $value . "</p>";
				}
			}
			echo "<p>Now proceed for payments</p>";
		}
		function printSimilarPath($array) {
			echo "<h1>For other shortest route's, follow anyone from below:</h1>";
			for($i = 0; $i < count ( $array ) - 1; $i ++) {
				foreach ( $array [$i + 1] as $key => $value ) {
					if ($key == 0) {
						echo "<p>Start from Shop No. : " . $value . "</p>";
					} else {
						echo "<p>Then Goto Shop No. : " . $value . "</p>";
					}
				}
			}
			echo "<p>Now proceed for payments</p>";
		}
		?>
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