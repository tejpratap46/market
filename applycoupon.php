<?php
error_reporting ( 0 );
require ("connection.php");
session_start ();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>One Store :: <?php echo $_COOKIE['username'];?></title>
<link href="web/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="web/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="web/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->

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

<!-- start-smoth-scrolling-->
<script type="text/javascript" src="web/js/move-top.js"></script>
<script type="text/javascript" src="web/js/easing.js"></script>
<script type="text/javascript" src="web/js/jquery.redirect.js"></script>
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
	<div class="container">
		<!--top-header-->
		<div class="top-header">
			<div class="logo">
				<a href="index.php"><img src="web/images/logo.png" title="barndlogo"></a>
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
					title="menu"></a>
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
	<div class="clearfix"></div>
	<hr>
	<div class="well">
	<div class="input-group">
	  <input type="text" class="form-control" id="couponCode" placeholder="Coupon Code" style="height: 60px;">
	  <span class="input-group-addon btn btn-primary" id="applycoupon" style="height: 60px; color: white; font-weight: bold;" onclick="applyCoupon();">Apply</span>
	</div>
	</div>
	<hr>
		<?php
		if ($_COOKIE ['username']) {
			$quary = mysql_query ( "SELECT * FROM `lists` WHERE `listid`='" . $_GET ['id'] . "' ORDER BY listid DESC" );
			for($i = 0; $i < mysql_num_rows ( $quary ); $i ++) {
				$qArray = mysql_fetch_array ( $quary );
				$item = $qArray ['items'];
				echo "<div class='special-products all-poroducts' id='" . $qArray ['listid'] . "'>";
				echo "<div class='alert alert-info' role='alert'><strong>List Id : </strong>" . $qArray ['listid'] . "</div>";
				echo "<table class='bordered' id='cart_table'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th>id</th>";
				echo "<th>Name</th>";
				echo "<th>Qty</th>";
				echo "<th>Cost per item</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody id='items'>";
				showCart ( $item );
				echo "</tbody>";
				echo "</table>";
				echo "	<div class='container'>
							<div style='text-align: center;' class='col-md-3'><button style='width: 95%;padding: 5%; margin:5%;' class='btn btn-lg btn-danger' type='button' onclick=\"removeList('" . $qArray ['listid'] . "')\" >Delete List</button></div>
							<div style='text-align: center;' class='col-md-3'><button style='width: 95%;padding: 5%; margin:5%;' class='btn btn-lg btn-success' type='button' onclick=\"makeFirstList('" . $qArray ['listid'] . "')\" >Make It First</button></div>
							<div style='text-align: center;' class='col-md-3'><button style='width: 95%;padding: 5%; margin:5%;' class='btn btn-lg btn-primary' type='button' onclick=\"window.location.href = 'map.php?floor=G1&listid=" . $qArray ['listid'] . "';\" >Get Map</button></div>
			<div style='text-align: center;' class='col-md-3'><button style='width: 95%;padding: 5%; margin:5%;' class='btn btn-lg btn-info' type='button' onclick=\"payment('". $qArray ['listid'] ."')\" >Next</button></div>
						</div>";
				echo "</div>";
			}
		} else {
			echo "<h2 style='text-align: center; width: 100%;'>Please Login</h2>";
		}
		?>
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

				function applyCoupon(){
					$('.notification').text('Loading...');
					$('.notification').show();
					var coupon = $('#couponCode').val();
					$.getJSON('coupon/coupon.check.php?apikey=tejpratap&listid=' + <?php echo "'".$_GET['id']."'";?> + '&coupon=' + coupon, function(json, textStatus) {
							/*optional stuff to do after success */
							$('.notification').hide();
							if (json.status == 1) {
								var jsonItems = "<div>" + json.items + "</div>";
								var ids = $(jsonItems).children('id');
								var names = $(jsonItems).children('name');
								var quantitys = $(jsonItems).children('quantity');
								var costs = $(jsonItems).children('cost');
								var newItems = "";
								for (var i = 0; i < ids.length; i++) {
									newItems = newItems + "<tr>";
									newItems = newItems + "<td>" + $(ids.get(i)).text() + "</td>";
									newItems = newItems + "<td>" + $(names.get(i)).text() + "</td>";
									newItems = newItems + "<td>" + $(quantitys.get(i)).text() + "</td>";
									newItems = newItems + "<td>" + $(costs.get(i)).text() + "</td>";
									newItems = newItems + "</tr>";
								};
								$('#items').html(newItems);
								$('.notification').text('Coupon Applied');
								$('.notification').stop().fadeIn(400).delay(8000).fadeOut(400);
							}else{
								$('.notification').text('Coupon Failed for Reason - ' + json.error);
								$('.notification').stop().fadeIn(400).delay(8000).fadeOut(400);
							}
					});
				}

				function removeList(id) {
		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function() {
		            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		            	var items = xmlhttp.responseText;
		            	$('#' + id).fadeOut(100);
		            	// $('.notification').html(items);
		            	$('.notification').text('Removed');
		            	$('.notification').stop().fadeIn(400).delay(3000).fadeOut(400);
		            	// alert(items);
		            }
		        }
		        
		        xmlhttp.open("GET", "ajax/deletelist.php?id=" + id + "&u=<?php echo $_COOKIE['username'];?>", true);
		        xmlhttp.send();
				}
				
				function makeFirstList(id) {
				var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function() {
		            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		            	var items = xmlhttp.responseText;
		            	location.reload();
		            }
		        }
		        
		        xmlhttp.open("GET", "ajax/makefirstlist.php?id=" + id + "&u=<?php echo $_COOKIE['username'];?>", true);
		        xmlhttp.send();
				}

				function payment(id){
					var items = $('#items').html();
					// var found = $(items).find("td").length;
					var total = 0;
					fourths = $(items).children('td:nth-child(4n)');
					$.each(fourths, function(key, element) {
					    // alert('key: ' + key + '\n' + 'value: ' + element['HTMLTableCellElement']);
					    var ammount = $(element).text();
					    console.log(ammount);
					    total = +total + +ammount;
					});
					console.log('Total ' + total);
					$.redirect('payment.php', {'ammount': total, 'listid': id});
				}
		        <?php
				if (! isset ( $_COOKIE ['username'] )) {
					echo "*/\n";
				}
				?>

				
			
	</script>
	<div class="footer">
		<div class="container">
			<div class="col-md-3 footer-logo">
				<a href="index.php"><img src="web/images/flogo.png"
					title="brand-logo"></a>
			</div>
			<div class="col-md-7 footer-links">
				<ul class="unstyled-list list-inline">
					<li><a href="#"> Faq</a> <span> </span></li>
					<li><a href="#"> Terms and Conditions</a> <span> </span></li>
					<li><a href="#"> Secure Payments</a> <span> </span></li>
					<li><a href="#"> Shipping</a> <span> </span></li>
					<li><a href="contact.php"> Contact</a></li>
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
			<a href="#" id="toTop" style="display: block;"> <span id="toTopHover"
				style="opacity: 1;"> </span></a>
		</div>
	</div>
</body>
</html>