<?php
error_reporting ( 0 );
require 'connection.php';
require 'customer/pagination.php';
session_start ();
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $_GET['coupon'];?> :: One Store</title>
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
			<!--- products ---->
			<div class="products">
				<div class="product-filter">
					<h1>
						<a href="#">FILTER</a>
					</h1>
					<div class="product-filter-grids">
						<div class="col-md-3 product-filter-grid1-brands">
							<h3>BRANDS</h3>
							<?php
							$brandsQuery = mysql_query ( "SELECT DISTINCT itembrand FROM market ORDER BY `totalsold` DESC" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
							for($i = 0; $i < mysql_num_rows ( $brandsQuery ); $i ++) {
								$brandInfo = mysql_fetch_array ( $brandsQuery );
								if ($i % 2 == 0) {
									echo "<ul class='col-md-6 unstyled-list b-list1'>";
									echo "<li><a href='brand.php?brand=" . $brandInfo ['itembrand'] . "'>" . $brandInfo ['itembrand'] . "</a></li>";
									echo "<div class='clearfix'></div>";
									echo "</ul>";
								} else {
									echo "<ul class='col-md-6 unstyled-list b-list2'>";
									echo "<li><a href='brand.php?brand=" . $brandInfo ['itembrand'] . "'>" . $brandInfo ['itembrand'] . "</a></li>";
									echo "<div class='clearfix'></div>";
									echo "</ul>";
								}
							}
							?>
							<div class="clearfix"></div>
						</div>
						<!---->
						<div class="col-md-6 product-filter-grid1-brands-col2">
							<div class="producst-cate-grids">
								<?php
								$categorysql = mysql_query ( "SELECT DISTINCT itemcategory FROM market LIMIT 3" ) or die ();
								$categoryRows = mysql_num_rows ( $categorysql );
								for($i = 0; $i < $categoryRows; $i ++) {
									$itemcategory = mysql_fetch_array ( $categorysql );
									$numQuery = "SELECT COUNT(*) as num FROM `market` WHERE itemcategory = '" . $itemcategory ['itemcategory'] . "'";
									$num = mysql_fetch_array ( mysql_query ( $numQuery ) );
									echo "<a href=category.php?c=" . $itemcategory ['itemcategory'] . "><div class='col-md-4 producst-cate-grid text-center'>";
									echo "<h2>" . $itemcategory ['itemcategory'] . "</h2>";
									echo "<img class='r-img text-center img-responsive'
										 title='name' hidden /> <span><img title='name'></span>";
									echo "<h4>TOTAL</h4>";
									echo "<label>" . $num ['num'] . " PRODUCTS</label> <a class='r-list-w' href='category.php?c=" . $itemcategory ['itemcategory'] . "'><img
										src='web/images/list-icon.png' title='list'></a>";
									echo "</div></a>";
								}
								?>
							</div>
						</div>
						<!---->
						<div class="product-filter-grid1-brands-col3">
							<div class="products-colors">
								<h3>SELECT COLOR</h3>
								<li><a href="#"><span class="color1"> </span></a></li>
								<li><a href="#"><span class="color2"> </span></a></li>
								<li><a href="#"><span class="color3"> </span></a></li>
								<li><a href="#"><span class="color4"> </span></a></li>
								<li><a href="#"><span class="color5"> </span></a></li>
								<li><a href="#"><span class="color6"> </span></a></li>
								<li><a href="#"><span class="color7"> </span></a></li>
								<li><a href="#"><span class="color8"> </span></a></li>
								<li><a href="#"><span class="color9"> </span></a></li>
								<li><a href="#"><span class="color10"> </span></a></li>
								<li><a href="#"><span class="color11"> </span></a></li>
								<li><a href="#"><span class="color12"> </span></a></li>
								<li><a href="#"><span class="color13"> </span></a></li>
								<li><a href="#"><span class="color14"> </span></a></li>
								<li><a href="#"><span class="color15"> </span></a></li>
								<li><a href="#"><span class="color16"> </span></a></li>
								<li><a href="#"><span class="color17"> </span></a></li>
								<li><a href="#"><span class="color18"> </span></a></li>
								<li><a href="#"><span class="color19"> </span></a></li>
								<li><a href="#"><span class="color20"> </span></a></li>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- //products ---->
			<!----speical-products---->
			
					<?php
					function showData($query) {
						$info = mysql_fetch_array ( $query );
						echo "<a class='brand-name' href='single-page.php?id=" . $info ['itemid'] . "'><img src='web/images/b1.jpg' title='name' /></a>";
						echo "<a class='product-here' href='single-page.php?id=" . $info ['itemid'] . "'>";
						echo "<div style='overflow: hidden; height:200px; width:90%;'>";
						echo "<img src='" . $info ['imageurl'] . "' title='product-name'/></a>";
						echo "</div>";
						echo "<h4><a href='single-page.php?id=" . $info ['itemid'] . "'>" . $info ['itemname'] . "</a></h4>";
						echo "<a class='product-btn' href='single-page.php?id=" . $info ['itemid'] . "'><span>Rs. " . $info ['itemprice'] . "</span><small>GET NOW</small><label> </label></a>";
						echo "</div>";
					}
					?>
			
			<div class="special-products all-poroducts">
				<div class="s-products-head">
					<div class="s-products-head-left">
						<h3>
							Recomended <span>For You</span>
						</h3>
					</div>
					<div class="s-products-head-right">
						<a href="topselling.php" hidden><span> </span>view all products</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<!----special-products-grids---->
				<div class="special-products-grids">
					<?php
					$query = mysql_query ( "SELECT items FROM `lists` WHERE `customerid` = '" . $_COOKIE ['username'] . "' ORDER BY `lists`.`listid` DESC LIMIT $start,$limit" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
					$items = "";
					for($i = 0; $i < mysql_num_rows ( $query ); $i ++) {
						$info = mysql_fetch_array ( $query );
						$items = $items . $info ['items'];
					}
					if (strlen ( $items ) > 0) {
						preg_match_all ( "#<id.*?>([^<]+)</id>#", $items, $matches );
						$itemcount = array_count_values ( $matches [1] );
						arsort ( $itemcount );
						foreach ( $itemcount as $key => $value ) {
							$query = mysql_query ( "SELECT * FROM market WHERE itemid='" . $key . "'" );
							$info = mysql_fetch_array ( $query );
							echo "<div class='col-md-3 special-products-grid text-center'>";
							echo "<a class='brand-name' href='single-page.php?id=" . $info ['itemid'] . "'><img src='web/images/b1.jpg' title='name' /></a>";
							echo "<a class='product-here' href='single-page.php?id=" . $info ['itemid'] . "'>";
							echo "<div style='overflow: hidden; height:200px; width:90%;'>";
							echo "<img src='" . $info ['imageurl'] . "' title='product-name'/></a>";
							echo "</div>";
							echo "<h4><a href='single-page.php?id=" . $info ['itemid'] . "'>" . $info ['itemname'] . "</a></h4>";
							echo "<a class='product-btn' href='single-page.php?id=" . $info ['itemid'] . "'><span>Rs. " . $info ['itemprice'] . "</span><small>GET NOW</small><label> </label></a>";
							echo "</div>";
						}
					} else {
						echo "<p>No Recomended Products, To use this feature create some lists.</p>";
					}
					?>
					</div>
				<div class="clearfix"></div>
			</div>
			<!---//special-products-grids---->
		</div>
		<!----->
		<!---//speical-products---->
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
			<a href="#" id="toTop" style="display: block;"> <span id="toTopHover"
				style="opacity: 1;"> </span></a>
		</div>
	</div>
	<!--//copy-right--->
	</div>
	<!----container---->
</body>
</html>