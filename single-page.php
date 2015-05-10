<?php
error_reporting ( 0 );
require 'connection.php';
session_start ();
$id = $_GET ['id'];
$query = mysql_query ( "SELECT * FROM market WHERE itemid=" . $id ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
$info = mysql_fetch_array ( $query );
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $info['itemname'];?> :: One Store</title>
<link href="web/css/bootstrap.css" rel='stylesheet' type='text/css' />
<style type="text/css">
.center-cropped {
	width: 300px;
	height: 400px;
	background-position: center center;
	background-repeat: no-repeat;
}
</style>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="web/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="web/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!-- start-smoth-scrolling-->
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
					<input type="text" placeholder="Search" name="q" required
						maxlength="22"> <input type="submit" value=" ">
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
			<!-- products -->
			<div class="products">
				<div class="product-filter">
					<h1>
						<a href="#">FILTER</a>
					</h1>
					<div class="product-filter-grids">
						<div class="col-md-3 product-filter-grid1-brands">
							<h3>BRANDS</h3>
							<?php
							$brandsQuery = mysql_query ( "SELECT DISTINCT itembrand FROM market WHERE itemcategory = '" . $info ['itemcategory'] . "' ORDER BY `totalsold` DESC" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
							for($i = 0; $i < mysql_num_rows ( $brandsQuery ); $i ++) {
								$brandInfo = mysql_fetch_array ( $brandsQuery );
								if ($i % 2 == 0) {
									echo "<ul class='col-md-6 unstyled-list b-list1'>";
									echo "<li><a href='brand.php?c=" . $info ['itemcategory'] . "&brand=" . $brandInfo ['itembrand'] . "'>" . $brandInfo ['itembrand'] . "</a></li>";
									echo "<div class='clearfix'></div>";
									echo "</ul>";
								} else {
									echo "<ul class='col-md-6 unstyled-list b-list2'>";
									echo "<li><a href='brand.php?c=" . $info ['itemcategory'] . "&brand=" . $brandInfo ['itembrand'] . "'>" . $brandInfo ['itembrand'] . "</a></li>";
									echo "<div class='clearfix'></div>";
									echo "</ul>";
								}
							}
							?>
							<div class="clearfix"></div>
						</div>
						<!-->
						<div class="col-md-6 product-filter-grid1-brands-col2">
							<div class="producst-cate-grids">
								<?php
								$categorysql = mysql_query ( "SELECT DISTINCT itemcategory FROM market LIMIT 3" ) or die ();
								$categoryRows = mysql_num_rows ( $categorysql );
								for($i = 0; $i < $categoryRows; $i ++) {
									$itemcategory = mysql_fetch_array ( $categorysql );
									$numQuery = "SELECT COUNT(*) as num FROM `market` WHERE itemcategory = '" . $itemcategory ['itemcategory'] . "'";
									$num = mysql_fetch_array ( mysql_query ( $numQuery ) );
									echo "<div class='col-md-4 producst-cate-grid text-center'>";
									echo "<h2>" . $itemcategory ['itemcategory'] . "</h2>";
									echo "<img class='r-img text-center img-responsive'
										 title='name' hidden /> <span hidden><img title='name' /></span>";
									echo "<h4>TOTAL</h4>";
									echo "<label>" . $num ['num'] . " PRODUCTS</label> <a class='r-list-w' href='category.php?c=" . $itemcategory ['itemcategory'] . "'><img
										src='web/images/list-icon.png' title='list'></a>";
									echo "</div>";
								}
								?>
							</div>
						</div>
						<!-->
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
		</div>
		<div class="clearfix"></div>
		<!-- //products -->
		<!--product-details-->

		<div class="product-details">
			<div class="container">
				<div class="product-details-row1">
					<div class="product-details-row1-head">
						<h2><?php echo $info['itemcategory'];?></h2>
						<p><?php echo $info['itemname'];?></p>
					</div>
					<div class="col-md-4 product-details-row1-col1">
						<!--details-product-slider-->
						<!-- Include the Etalage files -->
						<link rel="stylesheet" href="web/css/etalage.css">
						<script src="web/js/jquery.etalage.min.js"></script>
						<!-- Include the Etalage files -->
						<script>
								jQuery(document).ready(function($){
					
									$('#etalage').etalage({
										thumb_image_width: 300,
										thumb_image_height: 400,
										source_image_width: 900,
										source_image_height: 1000,
										show_hint: true,
										click_callback: function(image_anchor, instance_id){
											// alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
										}
									});
									// This is for the dropdown list example:
									$('.dropdownlist').change(function(){
										etalage_show( $(this).find('option:selected').attr('class') );
									});
		
							});
						</script>
						<!--//details-product-slider-->
						<div class="details-left">
							<div class="details-left-slider">
								<ul id="etalage" class="center-cropped">
									<!-- Image Size 300X400 -->
								<?php
								$imgs = str_getcsv ( $info ['imageurl'] );
								for($i = 0; $i < count ( $imgs ); $i ++) {
									echo "<li><img class='etalage_thumb_image'";
									echo "src=" . $info ['imageurl'] . " style='max-width: 100%; max-height: 100%;' />";
									echo "<img class='etalage_source_image'";
									echo "src=" . $info ['imageurl'] . " style='max-width: 100%; max-height: 100%;' /></li>";
								}
								?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 product-details-row1-col2">
						<div class="product-rating" hidden>
							<a class="rate" href="#tab-3"><span> </span></a> <label><a
								href="#tab-3">Read <b>8</b> Reviews
							</a></label>
						</div>
						<div class="product-price">
							<div class="product-price-left text-right">
								<span> <!-- Original Price -->
								</span>
								<h5>Rs. <?php echo $info['itemprice'];?></h5>
							</div>
							<div class="product-price-right">
								<a href="#"><span> </span></a> <label> save <b> More <!-- % Discount --></b></label>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="product-price-details">
							<p class="text-right"><?php echo $info['itemdiscreption'];?></p>
							<a class="shipping" href="#" hidden><span> </span>Free shipping</a>
							<div class="clearfix"></div>
							<div class="product-size-qty">
								<!-- size choices hidden -->
								<div class="pro-size" hidden>
									<span>Size:</span> <select>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>11</option>
									</select>
								</div>
								<div class="pro-qty">
									<span>Qty:</span> <select id="selectqty">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
							<div class="product-cart-share">
								<div class="add-cart-btn">
									<script>
											function addToCart() {
												<?php
												if (! isset ( $_COOKIE ['username'] )) {
													echo "/*";
												}
												?>
												var qty = document.getElementById("selectqty").value;
										        var xmlhttp = new XMLHttpRequest();
										        xmlhttp.onreadystatechange = function() {
										            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
										                $('.notification').html(xmlhttp.responseText); //get text and display
										                $('.notification').stop().fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
										            }
										        }
										        xmlhttp.open("GET", "ajax/addtocart.php?i=<?php echo '<id>'.$info['itemid'].'</id><name>'.$info['itemname'].'</name><cost>'.$info['itemprice'].'</cost>';?>"+"<quantity>"+qty+"</quantity>"+"&u=<?php echo $_COOKIE['username'];?>", true);
										        xmlhttp.send();
										        
										        <?php
												if (! isset ( $_COOKIE ['username'] )) {
													echo "*/\n";
													echo "$('.notification').html('Please log In to use cart');\n"; // notify user not logged in
													echo "$('.notification').stop().fadeIn(400).delay(3000).fadeOut(400);";
												}
												?>
											}
									</script>
									<div class='notification' style='display: none'>Added</div>
									<input type="button" id="addtocart" value="Add to cart"
										onclick="addToCart();" />
								</div>
								<ul class="product-share text-right">
									<h3>Share This:</h3>
									<ul>
										<li><a class="share-face" target="_blank"
											href="https://www.facebook.com/sharer/sharer.php?u=http://nfcstore.vv.si/single-page.php?id=<?php echo $_GET['id'];?>"><span>
											</span> </a></li>
										<li><a class="share-twitter" target="_blank"
											href="https://twitter.com/home?status=http://nfcstore.vv.si/single-page.php?id=<?php echo $_GET['id'];?>"><span>
											</span> </a></li>
										<li><a class="share-google" target="_blank"
											href="https://plus.google.com/share?url=http://nfcstore.vv.si/single-page.php?id=<?php  echo $_GET['id'];?>"><span>
											</span> </a></li>
										<li><a class="share-rss" target="_blank" href="#"><span> </span>
										</a></li>
										<div class="clear"></div>
									</ul>
								</ul>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<!--//product-details-->
				</div>
				<!-- product-details -->
				<div class="product-tabs">
					<!--Horizontal Tab-->
					<div id="horizontalTab">
						<ul>
							<li><a href="#tab-1">Product overview</a></li>
							<li><a href="#tab-2">Features</a></li>
							<li><a href="#tab-3">Scan Here</a></li>
						</ul>
						<div id="tab-1" class="product-complete-info">
							<h3>DESCRIPTION:</h3>
							<p><?php echo $info['itemdiscreption'];?></p>
							<h3>QUANTITY LEFT:</h3>
							<p><?php echo $info['quantity'];?></p>
							<h3>PRODUCT LOCATION:</h3>
							<p><?php echo $info['itemlocation'];?></p>
							<!-- <span>DETAILS:</span>
							<div class="product-fea">
								<?php
								$specs = str_getcsv ( $info ['itemspecification'] );
								for($i = 0; $i < count ( $specs ); $i ++) {
									echo "<p>" . $specs [$i] . "</p>";
								}
								?>
							</div>
							 -->
						</div>
						<div id="tab-2" class="product-complete-info">
							<h3>
								<span>DETAILS:</span>
							</h3>
							<div class="product-fea">
								<?php
								$specs = str_getcsv ( $info ['itemspecification'] );
								for($i = 0; $i < count ( $specs ); $i ++) {
									echo "<p>" . $specs [$i] . "</p>";
								}
								?>
							</div>
						</div>
						<div id="tab-3" class="product-complete-info">
							<h3>QR - CODE</h3>
							<?php echo "<img src='http://api.qrserver.com/v1/create-qr-code/?data=<id>" . $info ['itemid'] . "</id><name>" . $info ['itemname'] . "</name><cost>" . $info ['itemprice'] . "</cost>&size=150x150' />";?>
						</div>
					</div>
					<!-- Responsive Tabs JS -->
					<script src="web/js/jquery.responsiveTabs.js"
						type="text/javascript"></script>

					<script type="text/javascript">
				        $(document).ready(function () {
				            $('#horizontalTab').responsiveTabs({
				                rotate: false,
				                startCollapsed: 'accordion',
				                collapsible: 'accordion',
				                setHash: true,
				                disabled: [3,4],
				                activate: function(e, tab) {
				                    $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
				                }
				            });
				
				            $('#start-rotation').on('click', function() {
				                $('#horizontalTab').responsiveTabs('active');
				            });
				            $('#stop-rotation').on('click', function() {
				                $('#horizontalTab').responsiveTabs('stopRotation');
				            });
				            $('#start-rotation').on('click', function() {
				                $('#horizontalTab').responsiveTabs('active');
				            });
				            $('.select-tab').on('click', function() {
				                $('#horizontalTab').responsiveTabs('activate', $(this).val());
				            });
				
				        });
				    </script>
				</div>
				<!-- //product-details -->
			</div>
		</div>
		<!--content-->
		<div class="clearfix"></div>
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
		<!--//footer-->
		<!--copy-right-->
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

