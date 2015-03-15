<?php
$page = $_GET ['page'];
$limit = $_GET ['limit'];

// if limit not set
if (! $limit) {
	$limit = 10;
}

// count total pages
if ($_GET ['q']) { // For search
	$query = "SELECT COUNT(*) as num FROM customer WHERE name LIKE '%$q%' OR username LIKE '%$q%' OR bankid LIKE '%$q%' OR email LIKE '%$q%'";
} else if($_GET['username']){ // otherwise
	$query = "SELECT COUNT(*) as num FROM `lists` WHERE `customerid`=".$_GET['username'];
}

$total_pages = mysql_fetch_array ( mysql_query ( $query ) );
$total_pages = $total_pages [num];
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