<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
if (!isset($_COOKIE['admin'])) {
    header('Location: login.php');
}else{
    error_reporting ( 0 );
    require ("../connection.php");
    require ('../config.php');
    // $newFeedbacksArray = json_decode(file_get_contents(Config::DB_SERVER."query.php?apikey=tejpratap&query=SELECT+COUNT(*)+FROM+feedback+WHERE+seen=0"));
    // $newFeedbacks = $newFeedbacksArray[0][0];
    // $totalProductsArray = json_decode(file_get_contents(Config::DB_SERVER."query.php?apikey=tejpratap&query=SELECT+COUNT(*)+FROM+market+WHERE+1"));
    // $totalProducts = $totalProductsArray[0][0];
    // $totalCustomersArray = json_decode(file_get_contents(Config::DB_SERVER."query.php?apikey=tejpratap&query=SELECT+COUNT(*)+FROM+customer+WHERE+1"));
    // $totalCustomers = $totalCustomersArray[0][0];
    // $totalNewCustomersArray = json_decode(file_get_contents(Config::DB_SERVER."query.php?query=SELECT+COUNT(username)+FROM+customer+WHERE+timestamp+LIKE+'%".(date ("y-m-d"))."%'&apikey=tejpratap"));
    // $totalNewCustomers = $totalNewCustomersArray[0][0];
    // $totalNewProductsArray = json_decode(file_get_contents(Config::DB_SERVER."query.php?query=SELECT+COUNT(itemid)+FROM+market+WHERE+timestamp+LIKE+'%".(date ("y-m-d"))."%'&apikey=tejpratap"));
    // $totalNewProducts = $totalNewProductsArray[0][0];
    // $totalNewPaymentsArray = json_decode(file_get_contents(Config::DB_SERVER."query.php?query=SELECT+SUM(balance)+FROM+payment_completed+WHERE+timestamp+LIKE+%27%25".(date ("y-m-d"))."%25%27&apikey=tejpratap"));
    // $totalNewPayments = $totalNewPaymentsArray[0][0];
    // $totalNewPendingPaymentsArray = json_decode(file_get_contents(Config::DB_SERVER."query.php?query=SELECT+SUM(balance)+FROM+payment+WHERE+timestamp+LIKE+%27%25".(date ("y-m-d"))."%25%27&apikey=tejpratap"));
    // $totalNewPendingPayments = $totalNewPendingPaymentsArray[0][0];

    // if (strlen($newFeedbacks) < 1) {
    //     $newFeedbacks = "0";
    // }
    // if (strlen($totalProducts) < 1) {
    //     $totalProducts = "0";
    // }
    // if (strlen($totalCustomers) < 1) {
    //     $totalCustomers = "0";
    // }
    // if (strlen($totalNewCustomers) < 1) {
    //     $totalNewCustomers = "0";
    // }
    // if (strlen($totalNewProducts) < 1) {
    //     $totalNewProducts = "0";
    // }
    // if (strlen($totalNewPayments) < 1) {
    //     $totalNewPayments = "0";
    // }
    // if (strlen($totalNewPendingPayments) < 1) {
    //     $totalNewPendingPayments = "0";
    // }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin :: One Store</title>
<link href="css/bootstrap.css" rel="stylesheet" type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="One Store, Shopping Assistance System, Manage Your Shop, Manage Your " />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
	rel='stylesheet' type='text/css'>
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.calender-left').fadeOut('slow', function(c){
	  		$('.calender-left').remove();
		});
	});
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close1').on('click', function(c){
		$('.calender-right').fadeOut('slow', function(c){
	  		$('.calender-right').remove();
		});
	});
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close2').on('click', function(c){
		$('.graph').fadeOut('slow', function(c){
	  		$('.graph').remove();
		});
	});
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close3').on('click', function(c){
		$('.site-report').fadeOut('slow', function(c){
	  		$('.site-report').remove();
		});
	});
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close4').on('click', function(c){
		$('.total-sale').fadeOut('slow', function(c){
	  		$('.total-sale').remove();
		});
	});
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close5').on('click', function(c){
		$('.total-sale').fadeOut('slow', function(c){
	  		$('.total-sale').remove();
		});
	});
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close7').on('click', function(c){
		$('.user-trends').fadeOut('slow', function(c){
	  		$('.user-trends').remove();
		});
	});
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close6').on('click', function(c){
		$('.world-map').fadeOut('slow', function(c){
	  		$('.world-map').remove();
		});
	});
});
</script>
<!--Calender -->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js"></script>
<script src="js/moment-2.2.1.js"></script>
<script src="js/clndr.js"></script>
<script src="js/site.js"></script>
<!--End Calender -->
<script src="js/highcharts.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab,#horizontalTab1,#horizontalTab2').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/main.js"></script>
<!-- Resource jQuery -->
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  	ga('create', 'UA-48014931-1', 'codyhouse.co');
  	ga('send', 'pageview');

  	jQuery(document).ready(function($){
  		$('.close-carbon-adv').on('click', function(){
  			$('#carbonads-container').hide();
  		});
  	});
</script>
<script src="js/amcharts.js" type="text/javascript"></script>
<script src="js/serial.js" type="text/javascript"></script>
<style type="text/css">
.amcharts-graph-g1 .amcharts-graph-stroke {
	stroke-dasharray: 3px 3px;
	stroke-linejoin: round;
	stroke-linecap: round;
	-webkit-animation: am-moving-dashes 1s linear infinite;
	animation: am-moving-dashes 1s linear infinite;
}
@
-webkit-keyframes am-moving-dashes { 100% {
	stroke-dashoffset: -30px;
}

}
@
keyframes am-moving-dashes { 100% {
	stroke-dashoffset: -30px;
}

}
.lastBullet {
	-webkit-animation: am-pulsating 1s ease-out infinite;
	animation: am-pulsating 1s ease-out infinite;
}

@
-webkit-keyframes am-pulsating { 0% {
	stroke-opacity: 1;
	stroke-width: 0px;
}

100%
{
stroke-opacity
:

0;
stroke-width
:

50
px
;


}
}
@
keyframes am-pulsating { 0% {
	stroke-opacity: 1;
	stroke-width: 0px;
}

100%
{
stroke-opacity
:

0;
stroke-width
:

50
px
;


}
}
.amcharts-graph-column-front {
	-webkit-transition: all .3s .3s ease-out;
	transition: all .3s .3s ease-out;
}

.amcharts-graph-column-front:hover {
	fill: #496375;
	stroke: #496375;
	-webkit-transition: all .3s ease-out;
	transition: all .3s ease-out;
}

.amcharts-graph-g2 {
	stroke-linejoin: round;
	stroke-linecap: round;
	stroke-dasharray: 500%;
	stroke-dasharray: 0 \0/; /* fixes IE prob */
	stroke-dashoffset: 0 \0/; /* fixes IE prob */
	-webkit-animation: am-draw 40s;
	animation: am-draw 40s;
}

@
-webkit-keyframes am-draw { 0% {
	stroke-dashoffset: 500%;
}

100%
{
stroke-dashoffset
:

0
px
;


}
}
@
keyframes am-draw { 0% {
	stroke-dashoffset: 500%;
}
100%
{
stroke-dashoffset
:
0
px
;

}
}
</style>


<script type="text/javascript">
            // note, we have townName field with a name specified for each datapoint and townName2 with only some of the names specified.
            // we use townName2 to display town names next to the bullet. And as these names would overlap if displayed next to each bullet,
            // we created this townName2 field and set only some of the names for this purpse.
            var chartData = [
                {
                    "date": "2012-01-01",
                    "distance": 227,
                    "townName": "New York",
                    "townName2": "New York",
                    "townSize": 25,
                    "latitude": 40.71,
                    "duration": 408
                },
                {
                    "date": "2012-01-02",
                    "distance": 371,
                    "townName": "Washington",
                    "townSize": 14,
                    "latitude": 38.89,
                    "duration": 482
                },
                {
                    "date": "2012-01-03",
                    "distance": 433,
                    "townName": "Wilmington",
                    "townSize": 6,
                    "latitude": 34.22,
                    "duration": 562
                },
                {
                    "date": "2012-01-04",
                    "distance": 345,
                    "townName": "Jacksonville",
                    "townSize": 7,
                    "latitude": 30.35,
                    "duration": 379
                },
                {
                    "date": "2012-01-05",
                    "distance": 480,
                    "townName": "Miami",
                    "townName2": "Miami",
                    "townSize": 10,
                    "latitude": 25.83,
                    "duration": 501
                },
                {
                    "date": "2012-01-06",
                    "distance": 386,
                    "townName": "Tallahassee",
                    "townSize": 7,
                    "latitude": 30.46,
                    "duration": 443
                },
                {
                    "date": "2012-01-07",
                    "distance": 348,
                    "townName": "New Orleans",
                    "townSize": 10,
                    "latitude": 29.94,
                    "duration": 405
                },
                {
                    "date": "2012-01-08",
                    "distance": 238,
                    "townName": "Houston",
                    "townName2": "Houston",
                    "townSize": 16,
                    "latitude": 29.76,
                    "duration": 309
                },
                {
                    "date": "2012-01-09",
                    "distance": 218,
                    "townName": "Dalas",
                    "townSize": 17,
                    "latitude": 32.8,
                    "duration": 287
                },
                {
                    "date": "2012-01-10",
                    "distance": 349,
                    "townName": "Oklahoma City",
                    "townSize": 11,
                    "latitude": 35.49,
                    "duration": 485
                },
                {
                    "date": "2012-01-11",
                    "distance": 603,
                    "townName": "Kansas City",
                    "townSize": 10,
                    "latitude": 39.1,
                    "duration": 890
                },
                {
                    "date": "2012-01-12",
                    "distance": 534,
                    "townName": "Denver",
                    "townName2": "Denver",
                    "townSize": 18,
                    "latitude": 39.74,
                    "duration": 810
                },
                {
                    "date": "2012-01-13",
                    "townName": "Salt Lake City",
                    "townSize": 12,
                    "distance": 425,
                    "duration": 670,
                    "latitude": 40.75,
                    "alpha":0.4
                },
                {
                    "date": "2012-01-14",
                    "latitude": 36.1,
                    "duration": 470,
                    "townName": "Las Vegas",
                    "townName2": "Las Vegas",
                    "bulletClass": "lastBullet"
                },
                {
                    "date": "2012-01-15"
                },
                {
                    "date": "2012-01-16"
                },
                {
                    "date": "2012-01-17"
                },
                {
                    "date": "2012-01-18"
                },
                {
                    "date": "2012-01-19"
                }
            ];
            var chart;

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.addClassNames = true;
                chart.dataProvider = chartData;
                chart.categoryField = "date";
                chart.dataDateFormat = "YYYY-MM-DD";
                chart.startDuration = 1;
                chart.color = "#FFFFFF";
                chart.marginLeft = 0;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
                categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
                categoryAxis.autoGridCount = false;
                categoryAxis.gridCount = 50;
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#555555";
                // we want custom date formatting, so we change it in next line
                categoryAxis.dateFormats = [{
                    period: 'DD',
                    format: 'DD'
                }, {
                    period: 'WW',
                    format: 'MMM DD'
                }, {
                    period: 'MM',
                    format: 'MMM'
                }, {
                    period: 'YYYY',
                    format: 'YYYY'
                }];

                // as we have data of different units, we create three different value axes
                // Distance value axis
                var distanceAxis = new AmCharts.ValueAxis();
                distanceAxis.title = "distance";
                distanceAxis.gridAlpha = 0;
                distanceAxis.axisAlpha = 0;
                chart.addValueAxis(distanceAxis);

                // latitude value axis
                var latitudeAxis = new AmCharts.ValueAxis();
                latitudeAxis.gridAlpha = 0;
                latitudeAxis.axisAlpha = 0;
                latitudeAxis.labelsEnabled = false;
                latitudeAxis.position = "right";
                chart.addValueAxis(latitudeAxis);

                // duration value axis
                var durationAxis = new AmCharts.ValueAxis();
                durationAxis.title = "duration";
                // the following line makes this value axis to convert values to duration
                // it tells the axis what duration unit it should use. mm - minute, hh - hour...
                durationAxis.duration = "mm";
                durationAxis.durationUnits = {
                    DD: "d. ",
                    hh: "h ",
                    mm: "min",
                    ss: ""
                };
                durationAxis.gridAlpha = 0;
                durationAxis.axisAlpha = 0;
                durationAxis.inside = true;
                durationAxis.position = "right";
                chart.addValueAxis(durationAxis);

                // GRAPHS
                // distance graph
                var distanceGraph = new AmCharts.AmGraph();
                distanceGraph.valueField = "distance";
                distanceGraph.title = "distance";
                distanceGraph.type = "column";
                distanceGraph.fillAlphas = 0.9;
                distanceGraph.valueAxis = distanceAxis; // indicate which axis should be used
                distanceGraph.balloonText = "[[value]] miles";
                distanceGraph.legendValueText = "[[value]] mi";
                distanceGraph.legendPeriodValueText = "total: [[value.sum]] mi";
                distanceGraph.lineColor = "#263138";
                distanceGraph.alphaField = "alpha";
                chart.addGraph(distanceGraph);

                // latitude graph
                var latitudeGraph = new AmCharts.AmGraph();
                latitudeGraph.valueField = "latitude";
                latitudeGraph.id = "g1";
                latitudeGraph.classNameField = "bulletClass";
                latitudeGraph.title = "latitude/city";
                latitudeGraph.type = "line";
                latitudeGraph.valueAxis = latitudeAxis; // indicate which axis should be used
                latitudeGraph.lineColor = "#786c56";
                latitudeGraph.lineThickness = 1;
                latitudeGraph.legendValueText = "[[description]]/[[value]]";
                latitudeGraph.descriptionField = "townName";
                latitudeGraph.bullet = "round";
                latitudeGraph.bulletSizeField = "townSize"; // indicate which field should be used for bullet size
                latitudeGraph.bulletBorderColor = "#786c56";
                latitudeGraph.bulletBorderAlpha = 1;
                latitudeGraph.bulletBorderThickness = 2;
                latitudeGraph.bulletColor = "#000000";
                latitudeGraph.labelText = "[[townName2]]"; // not all data points has townName2 specified, that's why labels are displayed only near some of the bullets.
                latitudeGraph.labelPosition = "right";
                latitudeGraph.balloonText = "latitude:[[value]]";
                latitudeGraph.showBalloon = true;
                latitudeGraph.animationPlayed = true;
                chart.addGraph(latitudeGraph);

                // duration graph
                var durationGraph = new AmCharts.AmGraph();
                durationGraph.id = "g2";
                durationGraph.title = "duration";
                durationGraph.valueField = "duration";
                durationGraph.type = "line";
                durationGraph.valueAxis = durationAxis; // indicate which axis should be used
                durationGraph.lineColor = "#ff5755";
                durationGraph.balloonText = "[[value]]";
                durationGraph.lineThickness = 1;
                durationGraph.legendValueText = "[[value]]";
                durationGraph.bullet = "square";
                durationGraph.bulletBorderColor = "#ff5755";
                durationGraph.bulletBorderThickness = 1;
                durationGraph.bulletBorderAlpha = 1;
                durationGraph.dashLengthField = "dashLength";
                durationGraph.animationPlayed = true;
                chart.addGraph(durationGraph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonDateFormat = "DD";
                chartCursor.cursorAlpha = 0;
                chartCursor.valueBalloonsEnabled = false;
                chart.addChartCursor(chartCursor);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                legend.bulletType = "round";
                legend.equalWidths = false;
                legend.valueWidth = 120;
                legend.useGraphSettings = true;
                legend.color = "#FFFFFF";
                chart.addLegend(legend);

                // WRITE
                chart.write("chartdiv");
            });
        </script>

<script src="js/zingchart.min.js"></script>
<script src="js/zingchart.jquery.js"></script>
</head>
<body>
	<div class="total-content">
		<div class="col-md-3 side-bar">
			<div class="logo text-center">
				<a href="#"><img src="images/logo.png" alt="" /></a>
			</div>
			<div class="navigation">
				<h3>Navigation</h3>
				<ul>
					<li><a href="#Dashboard"><i class="dash"></i></a></li>
					<li><a href="#Dashboard">Dashboard</a></li>
				</ul>
				<ul>
					<li><a href="#Emails"><i class="mail"></i></a></li>
					<li><a href="#Emails">Emails</a></li>
				</ul>
				<ul>
					<li><a href="#Calendar"><i class="cal"></i></a></li>
					<li><a href="#Calendar">Calendar</a></li>
				</ul>
				<ul>
					<li><a href="#Pages"><i class="page"></i></a></li>
					<li><a href="#Pages">Pages</a></li>
				</ul>
			</div>
			<div class="navigation">
				<h3>Featured</h3>
				<ul>
					<li><a href="#Charts"><i class="chat"></i></a></li>
					<li><a href="#Charts">Charts</a></li>
				</ul>
				<ul>
					<li><a href="#Articals"><i class="art"></i></a></li>
					<li><a href="#Articals">Articals</a></li>
				</ul>
				<ul>
					<li><a href="#Users"><i class="user"></i></a></li>
					<li><a href="#Users">Users</a></li>
				</ul>
				<ul>
					<li><a href="#Favorites"><i class="fat"></i></a></li>
					<li><a href="#Favorites">Favorites</a></li>
				</ul>
				<ul>
					<li><a href="#Speed"><i class="speed"></i></a></li>
					<li><a href="#Speed">Speed</a></li>
				</ul>
				<ul>
					<li><a href="#Settings"><i class="setting"></i></a></li>
					<li><a href="#Settings">Settings</a></li>
				</ul>
			</div>
			<div class="navigation">
				<h3>All Others</h3>
				<ul>
					<li><a href="#Revenue"><i class="rev"></i></a></li>
					<li><a href="#Revenue">Revenue</a></li>
				</ul>
				<ul>
					<li><a href="#Pictures"><i class="pic"></i></a></li>
					<li><a href="#Pictures">Pictures</a></li>
				</ul>
				<ul>
					<li><a href="#FAQs"><i class="faq"></i></a></li>
					<li><a href="#FAQs">FAQs</a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-9 content">
			<div class="home-strip">
				<div class="view">
					<ul>
						<li><a href="index.php"><i class="refresh"></i></a></li>
						<li class="messages"><a href="#"><i class="msgs"></i><span
								class="red" id="newFeedbacks"></span></a></li>
						<li class="notifications"><a href="#"><i class="bell"></i><span
								class="blue"></span></a></li>
					</ul>
				</div>
				<div class="search">
					<div class="search2">
						<form>
							<input type="submit" value=""> <input type="text" value=""
								onfocus="this.value = '';"
								onblur="if (this.value == '') {this.value = '';}" />
						</form>
					</div>
				</div>
				<div class="member">
					<p>
						<a href="#"><i class="men"></i></a><a href="#"><?php echo $_COOKIE['admin'];?></a>
					</p>
					<div id="dd" class="wrapper-dropdown-2" tabindex="1">
						<span><img src="images/settings.png" /></span>
						<ul class="dropdown">

							<li><a href="#">View Profile </a></li>
							<li><a href="#">Lists</a></li>
							<li><a href="#">Help</a></li>
							<li><a href="#">Activity log</a></li>
							<li><a href="#">Report a problem</a></li>
							<li><a href="login.php?logout=1">Log out</a></li>
						</ul>
					</div>
					<!---end-wrapper-dropdown-2-->
					<!---start-script-->
					<script type="text/javascript">
							function DropDown(el) {
								this.dd = el;
								this.initEvents();
							}
							DropDown.prototype = {
								initEvents : function() {
									var obj = this;

									obj.dd.on('click', function(event){
										$(this).toggleClass('active');
										event.stopPropagation();
									});
								}
							}
							$(function() {

								var dd = new DropDown( $('#dd') );

								$(document).click(function() {
									// all dropdowns
									$('.wrapper-dropdown-2').removeClass('active');
								});

							});
			</script>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<p class="home">
				<a href="#">Home</a> > <strong> Dashboard</strong>
			</p>
			<div class="list_of_members">
				<div class="visitors">
					<h4>
						TATAL <strong>CUSTOMERS</strong>
					</h4>
					<h3 id="totalCustomers">Loading..</h3>
					<p id="totalNewCustomers">Loading..</p>
					<a href="#"><i class="go"></i></a>
					<div class="clearfix"></div>
				</div>
				<div class="sales">
					<h4>
						TOTAL <strong>SALE TODAY</strong>
					</h4>
					<h3 id="totalNewPayments">Loading..</h3>
					<p id="totalNewPendingPayments">Loading..</p>
					<a href="#"><i class="go"></i></a>
					<div class="clearfix"></div>
				</div>
				<div class="users">
					<h4>
						TOTAL <strong>PRODUCTS</strong>
					</h4>
					<h3 id="totalProducts">Loading..</h3>
					<p id="totalNewProducts">Loading..</p>
					<a href="#"><i class="go"></i></a>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="graph">
				<div class="alert-close2"></div>
				<div id="chartdiv" style="width: 100%; height: 400px;"></div>
			</div>
			<div class="total-world">
				<div class="world-map">
					<div class="alert-close6"></div>
					<h3>World Sales</h3>
					<p>
						<span class="color1"></span>40%<span class="color2"></span>12%<span
							class="color3"></span>11%<span class="color4"></span>10%<span
							class="color5"></span>18%
					</p>
					<div class="clearfix"></div>
					<div id="map1" style="width: 100%; height: 380px"></div>
					<button id="focus-single">Focus on Australia</button>
					<button id="focus-multiple">Focus on Australia and Japan</button>
					<button id="focus-coords">Focus on Cyprus</button>
					<button id="focus-init">Return to the initial state</button>
					<script src="js/jquery-1.8.2.js"></script>
					<script src="js/jquery-jvectormap.js"></script>
					<script src="js/jquery-mousewheel.js"></script>

					<script src="js/jvectormap.js"></script>

					<script src="js/abstract-element.js"></script>
					<script src="js/abstract-canvas-element.js"></script>
					<script src="js/abstract-shape-element.js"></script>

					<script src="js/svg-element.js"></script>
					<script src="js/svg-group-element.js"></script>
					<script src="js/svg-canvas-element.js"></script>
					<script src="js/svg-shape-element.js"></script>
					<script src="js/svg-path-element.js"></script>
					<script src="js/svg-circle-element.js"></script>
					<script src="js/svg-image-element.js"></script>
					<script src="js/svg-text-element.js"></script>

					<script src="js/vml-element.js"></script>
					<script src="js/vml-group-element.js"></script>
					<script src="js/vml-canvas-element.js"></script>
					<script src="js/vml-shape-element.js"></script>
					<script src="js/vml-path-element.js"></script>
					<script src="js/vml-circle-element.js"></script>
					<script src="js/vml-image-element.js"></script>

					<script src="js/map-object.js"></script>
					<script src="js/region.js"></script>
					<script src="js/marker.js"></script>

					<script src="js/vector-canvas.js"></script>
					<script src="js/simple-scale.js"></script>
					<script src="js/ordinal-scale.js"></script>
					<script src="js/numeric-scale.js"></script>
					<script src="js/color-scale.js"></script>
					<script src="js/legend.js"></script>
					<script src="js/data-series.js"></script>
					<script src="js/proj.js"></script>
					<script src="js/map.js"></script>
					<script src="js/jquery-jvectormap-world-mill-en.js"></script>
					<link rel="stylesheet" media="all" href="css/jquery-jvectormap.css" />
					<script>
    jQuery.noConflict();
    jQuery(function(){
      var $ = jQuery;

      $('#focus-single').click(function(){
        $('#map1').vectorMap('set', 'focus', {region: 'AU', animate: true});
      });
      $('#focus-multiple').click(function(){
        $('#map1').vectorMap('set', 'focus', {regions: ['AU', 'JP'], animate: true});
      });
      $('#focus-coords').click(function(){
        $('#map1').vectorMap('set', 'focus', {scale: 7, lat: 35, lng: 33, animate: true});
      });
      $('#focus-init').click(function(){
        $('#map1').vectorMap('set', 'focus', {scale: 1, x: 0.5, y: 0.5, animate: true});
      });
      $('#map1').vectorMap({
        map: 'world_mill_en',
        panOnDrag: true,
        focusOn: {
          x: 0.5,
          y: 0.5,
          scale: 2,
          animate: true
        },
        series: {
          regions: [{
            scale: ['#C8EEFF', '#0071A4'],
            normalizeFunction: 'polynomial',
            values: {
              "AF": 16.63,
              "AL": 11.58,
              "DZ": 158.97,
              "AO": 85.81,
              "AG": 1.1,
              "AR": 351.02,
              "AM": 8.83,
              "AU": 1219.72,
              "AT": 366.26,
              "AZ": 52.17,
              "BS": 7.54,
              "BH": 21.73,
              "BD": 105.4,
              "BB": 3.96,
              "BY": 52.89,
              "BE": 461.33,
              "BZ": 1.43,
              "BJ": 6.49,
              "BT": 1.4,
              "BO": 19.18,
              "BA": 16.2,
              "BW": 12.5,
              "BR": 2023.53,
              "BN": 11.96,
              "BG": 44.84,
              "BF": 8.67,
              "BI": 1.47,
              "KH": 11.36,
              "CM": 21.88,
              "CA": 1563.66,
              "CV": 1.57,
              "CF": 2.11,
              "TD": 7.59,
              "CL": 199.18,
              "CN": 5745.13,
              "CO": 283.11,
              "KM": 0.56,
              "CD": 12.6,
              "CG": 11.88,
              "CR": 35.02,
              "CI": 22.38,
              "HR": 59.92,
              "CY": 22.75,
              "CZ": 195.23,
              "DK": 304.56,
              "DJ": 1.14,
              "DM": 0.38,
              "DO": 50.87,
              "EC": 61.49,
              "EG": 216.83,
              "SV": 21.8,
              "GQ": 14.55,
              "ER": 2.25,
              "EE": 19.22,
              "ET": 30.94,
              "FJ": 3.15,
              "FI": 231.98,
              "FR": 2555.44,
              "GA": 12.56,
              "GM": 1.04,
              "GE": 11.23,
              "DE": 3305.9,
              "GH": 18.06,
              "GR": 305.01,
              "GD": 0.65,
              "GT": 40.77,
              "GN": 4.34,
              "GW": 0.83,
              "GY": 2.2,
              "HT": 6.5,
              "HN": 15.34,
              "HK": 226.49,
              "HU": 132.28,
              "IS": 12.77,
              "IN": 1430.02,
              "ID": 695.06,
              "IR": 337.9,
              "IQ": 84.14,
              "IE": 204.14,
              "IL": 201.25,
              "IT": 2036.69,
              "JM": 13.74,
              "JP": 5390.9,
              "JO": 27.13,
              "KZ": 129.76,
              "KE": 32.42,
              "KI": 0.15,
              "KR": 986.26,
              "KW": 117.32,
              "KG": 4.44,
              "LA": 6.34,
              "LV": 23.39,
              "LB": 39.15,
              "LS": 1.8,
              "LR": 0.98,
              "LY": 77.91,
              "LT": 35.73,
              "LU": 52.43,
              "MK": 9.58,
              "MG": 8.33,
              "MW": 5.04,
              "MY": 218.95,
              "MV": 1.43,
              "ML": 9.08,
              "MT": 7.8,
              "MR": 3.49,
              "MU": 9.43,
              "MX": 1004.04,
              "MD": 5.36,
              "MN": 5.81,
              "ME": 3.88,
              "MA": 91.7,
              "MZ": 10.21,
              "MM": 35.65,
              "NA": 11.45,
              "NP": 15.11,
              "NL": 770.31,
              "NZ": 138,
              "NI": 6.38,
              "NE": 5.6,
              "NG": 206.66,
              "NO": 413.51,
              "OM": 53.78,
              "PK": 174.79,
              "PA": 27.2,
              "PG": 8.81,
              "PY": 17.17,
              "PE": 153.55,
              "PH": 189.06,
              "PL": 438.88,
              "PT": 223.7,
              "QA": 126.52,
              "RO": 158.39,
              "RU": 1476.91,
              "RW": 5.69,
              "WS": 0.55,
              "ST": 0.19,
              "SA": 434.44,
              "SN": 12.66,
              "RS": 38.92,
              "SC": 0.92,
              "SL": 1.9,
              "SG": 217.38,
              "SK": 86.26,
              "SI": 46.44,
              "SB": 0.67,
              "ZA": 354.41,
              "ES": 1374.78,
              "LK": 48.24,
              "KN": 0.56,
              "LC": 1,
              "VC": 0.58,
              "SD": 65.93,
              "SR": 3.3,
              "SZ": 3.17,
              "SE": 444.59,
              "CH": 522.44,
              "SY": 59.63,
              "TW": 426.98,
              "TJ": 5.58,
              "TZ": 22.43,
              "TH": 312.61,
              "TL": 0.62,
              "TG": 3.07,
              "TO": 0.3,
              "TT": 21.2,
              "TN": 43.86,
              "TR": 729.05,
              "TM": 0,
              "UG": 17.12,
              "UA": 136.56,
              "AE": 239.65,
              "GB": 2258.57,
              "US": 14624.18,
              "UY": 40.71,
              "UZ": 37.72,
              "VU": 0.72,
              "VE": 285.21,
              "VN": 101.99,
              "YE": 30.02,
              "ZM": 15.69,
              "ZW": 5.57
            }
          }]
        }
      });
    })
  </script>
				</div>
				<div class="site-report">
					<div class="alert-close3"></div>
					<h3>Site Report</h3>
					<div class="skills-top">
						<h5>Sales</h5>
						<h4>65%</h4>
						<div class="clearfix"></div>
						<div class="skills">
							<div class="skill" style="width: 65%"></div>
						</div>
					</div>
					<div class="skills-top">
						<h5>Revenue</h5>
						<h4>88%</h4>
						<div class="clearfix"></div>
						<div class="skills">
							<div class="skill1" style="width: 88%"></div>
						</div>
					</div>
					<div class="skills-top">
						<h5>New Orders</h5>
						<h4>90%</h4>
						<div class="clearfix"></div>
						<div class="skills">
							<div class="skill2" style="width: 90%"></div>
						</div>
					</div>
					<p>It is a long established fact that a re-ader will be distracted
						by the readable content of a page when looking at its layout.</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="total-sales">
				<div class="total-sale">
					<div class="alert-close5"></div>
					<div id="recipes" style="height: 377px; margin: 0 auto"></div>
					<script>
						 $(function () {
					        $('#recipes').highcharts({

					            title: {
					                text: ' ',
					                style: {
						                color: 'red',
						                fontWeight: '100'

						            }
					            },

					           xAxis: {
						            categories: ['AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'JAN'],

						        },

					            yAxis: {
						             labels: {
					                    formatter: function() {
					                        return this.value +'k'
					                    }
					                },
							         title: {
						                    enabled: false
						                }
					            },
					             plotOptions: {
						            series: {
						            	 cursor: 'pointer',
						                color: '#ec407a'
						            }
						        },

					            legend: {
						            enabled: false
						        },

					            tooltip: {
					               shared: true,
               					   pointFormat: '{point.x} k',
               					    backgroundColor: '#fff'
					            },

					            series: [{
					                data: [100, 200, 300, 6400, 500],
					                pointStart: 100
					            }]
					        });
					    });

						 </script>

				</div>
				<div class="user-trends">
					<div class="alert-close7"></div>
					<div id="myChart"></div>
					<script src="js/chart.js"></script>
				</div>
				<div class="clearfix"></div>
			</div>

            <div class="calenders">
                <div class="calender-left">
                    <div class="alert-close"></div>
                    <h3>Add Manager</h3>
                    <form>
                        <input type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                        <input type="text" class="text" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                        <textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                        <input type="button" value="Add" />
                    </form>
                </div>
                <div class="calender-left">
                <div class="alert-close"></div>
                    <h3>Remove Manager</h3>
                    <form>
                        <input type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                        <input type="button" value="Remove" />
                    </form>
                </div>
            </div>

            <div class="clearfix"></div>

			<div class="calenders">
				<div class="calender-left">
					<div class="alert-close"></div>
					<h3>Add Featured</h3>
					<form>
						<input type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                        <input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
						<textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Add</textarea>
						<input type="button" value="Add" />
					</form>
				</div>

                <div class="calender-left">
                    <div class="alert-close"></div>
                    <h3>Remove Featured</h3>
                    <form>
                        <input type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                        <input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
                        <textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Remove</textarea>
                        <input type="button" value="Remove" />
                    </form>
                </div>

				<div class="clearfix"></div>
			</div>

            <div class="calenders" id="Calendar">
                <div class="calender-left">
                    <div class="alert-close"></div>
                    <h3>Send Push</h3>
                    <form>
                        <input type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                        <input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
                        <textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                        <input type="button" value="SEND" />
                    </form>
                </div>
                <div class="calender-right">
                    <div class="alert-close1"></div>
                    <h3>Calendar</h3>
                    <div class="column_right_grid calender">
                        <div class="cal1">
                            <div class="clndr">
                                <div class="clndr-controls">
                                    <div class="clndr-control-button">
                                        <p class="clndr-previous-button">previous</p>
                                    </div>
                                    <div class="month">March 2014</div>
                                    <div class="clndr-control-button rightalign">
                                        <p class="clndr-next-button">next</p>
                                    </div>
                                </div>
                                <table class="clndr-table" border="0" cellspacing="0"
                                    cellpadding="0">
                                    <thead>
                                        <tr class="header-days">
                                            <td class="header-day">Sun</td>
                                            <td class="header-day">Mon</td>
                                            <td class="header-day">Tu</td>
                                            <td class="header-day">We</td>
                                            <td class="header-day">T</td>
                                            <td class="header-day">Fr</td>
                                            <td class="header-day">Su</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td
                                                class="day past adjacent-month last-month calendar-day-2014-02-23">
                                                <div class="day-contents">23</div>
                                            </td>
                                            <td
                                                class="day past adjacent-month last-month calendar-day-2014-02-24"><div
                                                    class="day-contents">24</div></td>
                                            <td
                                                class="day past adjacent-month last-month calendar-day-2014-02-25"><div
                                                    class="day-contents">25</div></td>
                                            <td
                                                class="day past adjacent-month last-month calendar-day-2014-02-26"><div
                                                    class="day-contents">26</div></td>
                                            <td
                                                class="day past adjacent-month last-month calendar-day-2014-02-27"><div
                                                    class="day-contents">27</div></td>
                                            <td
                                                class="day past adjacent-month last-month calendar-day-2014-02-28"><div
                                                    class="day-contents">28</div></td>
                                            <td class="day past calendar-day-2014-03-01"><div
                                                    class="day-contents">1</div></td>
                                        </tr>
                                        <tr>
                                            <td class="day past calendar-day-2014-03-02"><div
                                                    class="day-contents">2</div></td>
                                            <td class="day past calendar-day-2014-03-03"><div
                                                    class="day-contents">3</div></td>
                                            <td class="day past calendar-day-2014-03-04"><div
                                                    class="day-contents">4</div></td>
                                            <td class="day past calendar-day-2014-03-05"><div
                                                    class="day-contents">5</div></td>
                                            <td class="day past calendar-day-2014-03-06"><div
                                                    class="day-contents">6</div></td>
                                            <td class="day past calendar-day-2014-03-07"><div
                                                    class="day-contents">7</div></td>
                                            <td class="day past calendar-day-2014-03-08"><div
                                                    class="day-contents">8</div></td>
                                        </tr>
                                        <tr>
                                            <td class="day past calendar-day-2014-03-09"><div
                                                    class="day-contents">9</div></td>
                                            <td class="day past event calendar-day-2014-03-10"><div
                                                    class="day-contents">10</div></td>
                                            <td class="day past event calendar-day-2014-03-11"><div
                                                    class="day-contents">11</div></td>
                                            <td class="day past event calendar-day-2014-03-12"><div
                                                    class="day-contents">12</div></td>
                                            <td class="day past event calendar-day-2014-03-13"><div
                                                    class="day-contents">13</div></td>
                                            <td class="day past event calendar-day-2014-03-14"><div
                                                    class="day-contents">14</div></td>
                                            <td class="day past calendar-day-2014-03-15"><div
                                                    class="day-contents">15</div></td>
                                        </tr>
                                        <tr>
                                            <td class="day past calendar-day-2014-03-16"><div
                                                    class="day-contents">16</div></td>
                                            <td class="day past calendar-day-2014-03-17"><div
                                                    class="day-contents">17</div></td>
                                            <td class="day past calendar-day-2014-03-18"><div
                                                    class="day-contents">18</div></td>
                                            <td class="day past calendar-day-2014-03-19"><div
                                                    class="day-contents">19</div></td>
                                            <td class="day past calendar-day-2014-03-20"><div
                                                    class="day-contents">20</div></td>
                                            <td class="day past event calendar-day-2014-03-21"><div
                                                    class="day-contents">21</div></td>
                                            <td class="day past event calendar-day-2014-03-22"><div
                                                    class="day-contents">22</div></td>
                                        </tr>
                                        <tr>
                                            <td class="day past event calendar-day-2014-03-23"><div
                                                    class="day-contents">23</div></td>
                                            <td class="day past calendar-day-2014-03-24"><div
                                                    class="day-contents">24</div></td>
                                            <td class="day today calendar-day-2014-03-25"><div
                                                    class="day-contents">25</div></td>
                                            <td class="day calendar-day-2014-03-26"><div
                                                    class="day-contents">26</div></td>
                                            <td class="day calendar-day-2014-03-27"><div
                                                    class="day-contents">27</div></td>
                                            <td class="day calendar-day-2014-03-28"><div
                                                    class="day-contents">28</div></td>
                                            <td class="day calendar-day-2014-03-29"><div
                                                    class="day-contents">29</div></td>
                                        </tr>
                                        <tr>
                                            <td class="day calendar-day-2014-03-30"><div
                                                    class="day-contents">30</div></td>
                                            <td class="day calendar-day-2014-03-31"><div
                                                    class="day-contents">31</div></td>
                                            <td
                                                class="day adjacent-month next-month calendar-day-2014-04-01"><div
                                                    class="day-contents">1</div></td>
                                            <td
                                                class="day adjacent-month next-month calendar-day-2014-04-02"><div
                                                    class="day-contents">2</div></td>
                                            <td
                                                class="day adjacent-month next-month calendar-day-2014-04-03"><div
                                                    class="day-contents">3</div></td>
                                            <td
                                                class="day adjacent-month next-month calendar-day-2014-04-04"><div
                                                    class="day-contents">4</div></td>
                                            <td
                                                class="day adjacent-month next-month calendar-day-2014-04-05"><div
                                                    class="day-contents">5</div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>

			<div class="cd-tabs">
				<nav>
					<ul class="cd-tabs-navigation">
						<li><a data-content="fashion" href="#0">Latest Comments <i> </i></a></li>
						<li><a data-content="cinema" href="#0" class="selected fashion1">Latest
								Articles<i> </i>
						</a></li>
						<li><a data-content="television" href="#0" class="fashion2">Newest
								Users<i> </i>
						</a></li>
						<div class="clearfix"></div>
					</ul>
				</nav>
				<ul class="cd-tabs-content">
					<li data-content="fashion">
						<div class="top-men">
							<div class="men">
								<div class="grid-men">
									<a href="#"><img src="images/pp.jpg" class="img-responsive"
										alt=""> </a>
								</div>
								<div class="men-grid">
									<h6>
										on <a href="#">Fashion News</a> / by <a href="#">Jolia</a>
									</h6>
									<span>12-11-2014</span>
									<p class="text">It is a long established fact that a reader
										will be distracted by the readable content of a page when
										looking at its layout.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="men">
								<div class="grid-men">
									<a href="#"><img src="images/pp0.jpg" class="img-responsive"
										alt=""> </a>
								</div>
								<div class="men-grid">
									<h6>
										on <a href="#">Technoloy News </a>/ by <a href="#">Deo</a>
									</h6>
									<span>12-11-2014</span>
									<p class="text">It is a long established fact that a reader
										will be distracted by the readable content of a page when
										looking at its layout.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="men">
								<div class="grid-men">
									<a href="#"><img src="images/pp01.jpg" class="img-responsive"
										alt=""> </a>
								</div>
								<div class="men-grid">
									<h6>
										on<a href="#"> Fashion News</a> / by <a href="#">Jolia</a>
									</h6>
									<span>12-11-2014</span>
									<p class="text">It is a long established fact that a reader
										will be distracted by the readable content of a page when
										looking at its layout.</p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</li>
					<li data-content="cinema" class="selected">
						<div class="top-men">
							<div class="men">
								<div class="grid-men">
									<a href="#"><img src="images/pp0.jpg" class="img-responsive"
										alt=""> </a>
								</div>
								<div class="men-grid">
									<h6>
										on <a href="#"> Fashion News </a>/ by <a href="#">Jolia</a>
									</h6>
									<span>12-11-2014</span>
									<p class="text">It is a long established fact that a reader
										will be distracted by the readable content of a page when
										looking at its layout.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="men">
								<div class="grid-men">
									<a href="#"><img src="images/pp01.jpg" class="img-responsive"
										alt=""> </a>
								</div>
								<div class="men-grid">
									<h6>
										on <a href="#">Technoloy News</a> / by <a href="#">Deo</a>
									</h6>
									<span>12-11-2014</span>
									<p class="text">It is a long established fact that a reader
										will be distracted by the readable content of a page when
										looking at its layout.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="men">
								<div class="grid-men">
									<a href="#"><img src="images/pp.jpg" class="img-responsive"
										alt=""> </a>
								</div>
								<div class="men-grid">
									<h6>
										on <a href="#"> Fashion News </a>/ by <a href="#">Jolia</a>
									</h6>
									<span>12-11-2014</span>
									<p class="text">It is a long established fact that a reader
										will be distracted by the readable content of a page when
										looking at its layout.</p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</li>
					<li data-content="television">
						<div class="top-men">
							<div class="men">
								<div class="grid-men">
									<a href="#"><img src="images/pp01.jpg" class="img-responsive"
										alt=""> </a>
								</div>
								<div class="men-grid">
									<h6>
										on <a href="#">Fashion News</a> / by <a href="#">Jolia</a>
									</h6>
									<span>12-11-2014</span>
									<p class="text">It is a long established fact that a reader
										will be distracted by the readable content of a page when
										looking at its layout.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="men">
								<div class="grid-men">
									<a href="#"><img src="images/pp.jpg" class="img-responsive"
										alt=""> </a>
								</div>
								<div class="men-grid">
									<h6>
										on <a href="#">Technoloy News</a> / by <a href="#">Deo</a>
									</h6>
									<span>12-11-2014</span>
									<p class="text">It is a long established fact that a reader
										will be distracted by the readable content of a page when
										looking at its layout.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="men">
								<div class="grid-men">
									<a href="#"><img src="images/pp0.jpg" class="img-responsive"
										alt=""> </a>
								</div>
								<div class="men-grid">
									<h6>
										on <a href="#">Fashion News </a>/ by <a href="#">Jolia</a>
									</h6>
									<span>12-11-2014</span>
									<p class="text">It is a long established fact that a reader
										will be distracted by the readable content of a page when
										looking at its layout.</p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</li>
					<div class="clearfix"></div>
				</ul>
			</div>

		</div>
		<div class="clearfix"></div>
	</div>
	<div class="footer">
		<div class="copyright text-center">
			<p>
				Metropanel_ui_kit &copy; 2015 All rights reserved | Template by <a
					href="http://w3layouts.com"> W3layouts</a>
			</p>
		</div>
	</div>
  <script type="text/javascript">
      jQuery(document).ready(function($) {
          $.getJSON('<?php echo Config::DB_SERVER."query.php?apikey=tejpratap&query=SELECT+COUNT(*)+FROM+feedback+WHERE+seen=0" ?>', {param1: 'value1'}, function(json, textStatus) {
                $('#newFeedbacks').text(json[0][0]);
          });
      });
      jQuery(document).ready(function($) {
          $.getJSON('<?php echo Config::DB_SERVER."query.php?apikey=tejpratap&query=SELECT+COUNT(*)+FROM+market+WHERE+1" ?>', {param1: 'value1'}, function(json, textStatus) {
                $('#totalProducts').text(json[0][0]);
          });

          $.getJSON('<?php echo Config::DB_SERVER."query.php?apikey=tejpratap&query=SELECT+COUNT(*)+FROM+customer+WHERE+1" ?>', {param1: 'value1'}, function(json, textStatus) {
                $('#totalCustomers').text(json[0][0]);
          });

          $.getJSON('<?php echo Config::DB_SERVER."query.php?query=SELECT+COUNT(username)+FROM+customer+WHERE+timestamp+LIKE+\'%".(date ("y-m-d"))."%\'&apikey=tejpratap" ?>', {param1: 'value1'}, function(json, textStatus) {
                $('#totalNewCustomers').text(json[0][0] + ' New Today');
          });

          $.getJSON('<?php echo Config::DB_SERVER."query.php?query=SELECT+COUNT(itemid)+FROM+market+WHERE+timestamp+LIKE+\'%".(date ("y-m-d"))."%\'&apikey=tejpratap" ?>', {param1: 'value1'}, function(json, textStatus) {
                $('#totalNewProducts').text(json[0][0] + ' New Today');
          });

          $.getJSON('<?php echo Config::DB_SERVER."query.php?query=SELECT+SUM(balance)+FROM+payment_completed+WHERE+timestamp+LIKE+%27%25".(date ("y-m-d"))."%25%27&apikey=tejpratap" ?>', {param1: 'value1'}, function(json, textStatus) {
                $('#totalNewPayments').text(json[0][0]);
          });

          $.getJSON('<?php echo Config::DB_SERVER."query.php?query=SELECT+SUM(balance)+FROM+payment+WHERE+timestamp+LIKE+%27%25".(date ("y-m-d"))."%25%27&apikey=tejpratap" ?>', {param1: 'value1'}, function(json, textStatus) {
                $('#totalNewPendingPayments').text(json[0][0] + ' Pending');
          });
      });
  </script>
</body>
</html>
