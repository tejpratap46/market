<?php
$page = $_GET ['page'];
$limit = $_GET ['limit'];

// if limit not set
if (! $limit) {
	$limit = 10;
}

// count total pages
if ($_GET ['q']) { // For search
	$query = "SELECT COUNT(*) as num FROM `market` WHERE itemname LIKE '%$q%' OR itemdiscreption LIKE '%$q%' OR itemcategory LIKE '%$q%' OR itembrand LIKE '%$q%'";
} else if ($_GET ['category']) { // For categoty
	$query = "SELECT COUNT(*) as num FROM market WHERE itemcategory='" . $category . "' ORDER BY `totalsold` DESC";
} else if ($_GET ['category'] && $_GET ['brand']) { // For categoty and brand
	$query = "SELECT COUNT(*) as num FROM market WHERE itemcategory = '" . $category . "' AND itembrand = '" . $brand . "' ORDER BY `totalsold` DESC";
} else { // otherwise
	$query = "SELECT COUNT(*) as num FROM `market`";
}

$total_pages = mysql_fetch_array ( mysql_query ( $query ) );
$total_pages = $total_pages ['num'];
$total_pages = $total_pages / $limit;
$total_pages = ceil ( $total_pages );

// pagination
if ($page) {
	if ($page < 2) {
		$start = 0;
	} else if ($page > $total_pages) {
		$start = $total_pages;
	} else {
		$start = ($page - 1) * $limit;
	}
} else {
	$page = 1;
	$start = 0;
}
?>