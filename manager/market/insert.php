<!DOCTYPE html>
<?php
error_reporting ( 0 );
?>
<html>
<head>
<title>Market manager</title>
<link rel="stylesheet" type="text/css" href="index.css">

<script>
	function todaysdate() {
		var d = new Date();
		var n = d.getFullYear() + "-" + d.getMonth() + "-" + d.getDate();
		document.getElementById("date1").value = n;
		document.getElementById("date2").value = n;
		document.getElementById("date3").value = n;
	}
</script>

</head>
<body>

	<header>
		<a href="insert.html">Market Manager</a>
	</header>

	<div class="menuBar">
		<div class="app_card">
			<form action="../../market/market.showall.php">
				<input type="text" value="tejpratap" name="apikey" required
					placeholder="apikey" /><br /> <input class="button" type="submit"
					value="Show All" />
			</form>
		</div>

		<div class="app_card">
			<form action="../../market/market.deleteall.php">
				<input type="text" value="tejpratap" name="apikey" required
					placeholder="apikey" /><br /> <input class="button" type="submit"
					value="Delete All" />
			</form>
		</div>
	</div>

	<div class="menuBar">
		<div class="app_card">
			<h1>Add New</h1>

			<form method="GET" action="../../market/market.insert.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="number" min="1"
					name="itemid" placeholder="itemid" maxlength="10" required /> <br />
				<input type="text" name="itemname" placeholder="itemname"
					maxlength="100" required /> <br /> <input type="number" min="1"
					name="itemprice" placeholder="itemprice" maxlength="10" required />
				<br /> <input type="text" name="itemdiscreption"
					placeholder="itemdiscreption" required /> <br /> <input type="text"
					name="itemspecification" placeholder="itemspecification" required />
				<br /> <input type="text" name="itemcategory"
					placeholder="itemcategory" maxlength="100" required /> <br /> <input
					type="text" name="itembrand" placeholder="itembrand"
					maxlength="100" required /> <br /> <input type="number" min="1"
					name="quantity" placeholder="quantity" maxlength="10" required /> <br />
				<input type="text" name="date" placeholder="date" id="date1"
					onclick="todaysdate()" required /> <br /> <input type="text"
					name="imageurl" placeholder="imageurl" maxlength="200" required />
				<br /> <input type="text" name="itemlocation"
					placeholder="itemlocation" maxlength="30" required /> <br /> <input
					type="text" name="tags" placeholder="tags" maxlength="500" required />
				<br /> <input class="button" type="submit" value="Insert" /> <br />
			</form>
		</div>

		<div class="app_card">
			<h1>Update previous</h1>

			<form method="GET" action="../../market/market.update.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="number" min="1"
					name="itemid" placeholder="itemid"
					value="<?php echo updateValue("itemid"); ?>" maxlength="10"
					required /> <br /> <input type="text" name="itemname"
					placeholder="itemname"
					value="<?php echo updateValue("itemname"); ?>" maxlength="100" /> <br />
				<input type="number" min="1" name="itemprice"
					placeholder="itemprice"
					value="<?php echo updateValue("itemprice"); ?>" maxlength="10" /> <br />
				<input type="text" name="itemdiscreption"
					placeholder="itemdiscreption"
					value="<?php echo updateValue("itemdiscreption"); ?>" /> <br /> <input
					type="text" name="itemspecification"
					placeholder="itemspecification"
					value="<?php echo updateValue("itemspecification"); ?>" /> <br /> <input
					type="text" name="itemcategory" placeholder="itemcategory"
					value="<?php echo updateValue("itemcategory"); ?>" maxlength="100" />
				<br /> <input type="text" name="itembrand" placeholder="itembrand"
					value="<?php echo updateValue("itembrand"); ?>" maxlength="100" />
				<br /> <input type="number" min="1" name="quantity"
					placeholder="quantity"
					value="<?php echo updateValue("quantity"); ?>" maxlength="10" /> <br />
				<input type="text" name="date" placeholder="date"
					value="<?php echo updateValue("date"); ?>" id="date2"
					onclick="todaysdate()" /> <br /> <input type="text" name="imageurl"
					placeholder="imageurl"
					value="<?php echo updateValue("imageurl"); ?>" maxlength="200" /> <br />
				<input type="text" name="itemlocation" placeholder="itemlocation"
					value="<?php echo updateValue("itemlocation"); ?>" maxlength="30" />
				<br /> <input type="text" name="tags" placeholder="tags"
					value="<?php echo updateValue("tags"); ?>" maxlength="500" /> <br />
				<input class="button" type="submit" value="Update" /> <br />
			</form>
		</div>
	</div>

	<div class="menuBar">
		<div class="app_card">
			<h1>Search</h1>

			<form method="GET" action="../../market/market.search1.php">
				<input type="text" name="apikey" value="tejpratap" required
					placeholder="apikey" /><br /> <input type="text" name="q" required
					placeholder="q" /> <input type="submit" value="Search"
					class="button" />
			</form>
		</div>
		<div class="app_card">
			<h1>Search category</h1>

			<form method="GET" action="../../market/market.search.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="number" min="1"
					name="itemid" placeholder="itemid" maxlength="10" /> <br /> <input
					type="text" name="itemname" placeholder="itemname" maxlength="100" />
				<br /> <input type="number" min="1" name="itemprice"
					placeholder="itemprice" maxlength="10" /> <br /> <input type="text"
					name="itemdiscreption" placeholder="itemdiscreption"
					maxlength="500" /> <br /> <input type="text"
					name="itemspecification" placeholder="itemspecification"
					maxlength="50000" /> <br /> <input type="text" name="itemcategory"
					placeholder="itemcategory" maxlength="100" /> <br /> <input
					type="text" name="itembrand" placeholder="itembrand"
					maxlength="100" /> <br /> <input type="number" min="1"
					name="quantity" placeholder="quantity" maxlength="10" /> <br /> <input
					type="date" name="date" placeholder="date" id="date3"
					onclick="todaysdate()" /> <br /> <input type="text" name="imageurl"
					placeholder="imageurl" maxlength="200" /> <br /> <input type="text"
					name="itemlocation" placeholder="itemlocation" maxlength="30" /> <br />
				<input type="text" name="tags" placeholder="tags" maxlength="500" />
				<br /> <input class="button" type="submit" value="Search" /> <br />
			</form>
		</div>
	</div>

	<div class="menuBar">
		<div class="app_card">
			<h1>Delete One</h1>

			<form method="GET" action="../../market/market.delete.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="text" name="id"
					placeholder="itemid" required /> <br /> <input class="button"
					type="submit" value="Delete" /> <br />
			</form>
		</div>
	</div>
</body>
<?php
function updateValue($element) {
	if ($_GET [$element]) {
		return $_GET [$element];
	} else {
		return "";
	}
}
?>
</html>