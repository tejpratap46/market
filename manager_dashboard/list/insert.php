<!DOCTYPE html>
<html>
<head>
<title>List manager</title>
<link rel="stylesheet" type="text/css" href="index.css">

<script>
        function todaysdate() {
            var d = new Date();
            var n = d.getDate() + "-" + d.getMonth() + "-" + d.getFullYear();
            document.getElementById("date1").value = n;
            document.getElementById("date2").value = n;
        }
    </script>

</head>
<body>

	<header>
		<a href="insert.html">List Manager</a>
	</header>

	<div class="menuBar">
		<div class="app_card">
			<form action="../../lists/lists.showall.php">
				<input type="text" value="tejpratap" name="apikey" required
					placeholder="apikey" /><br /> <input class="button" type="submit"
					value="Show All" />
			</form>
		</div>

		<div class="app_card">
			<form action="../../lists/lists.deleteall.php">
				<input type="text" value="tejpratap" name="apikey" required
					placeholder="apikey" /><br /> <input class="button" type="submit"
					value="Delete All" />
			</form>
		</div>
	</div>

	<div class="menuBar">
		<div class="app_card">
			<h1>Add New</h1>

			<form method="GET" action="../../lists/lists.insert.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="text"
					name="customerid" placeholder="customerid" maxlength="30" required />
				<br /> <input type="text" name="items" placeholder="items"
					maxlength="500" required /> <br /> <input class="button"
					type="submit" value="Insert" required /> <br />
			</form>
		</div>

		<div class="app_card">
			<h1>Update previous</h1>

			<form method="GET" action="../../lists/lists.update.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="number"
					name="itemid" placeholder="itemid" maxlength="10" required /> <br />
				<input type="text" name="customerid" placeholder="customerid"
					maxlength="30" required /> <br /> <input type="text" name="items"
					placeholder="items" maxlength="500" required /> <br /> <input
					class="button" type="submit" value="Update" /> <br />
			</form>
		</div>
	</div>

	<div class="menuBar">
		<div class="app_card">
			<h1>Search</h1>

			<form method="GET" action="../../lists/lists.search1.php">
				<input type="text" name="apikey" value="tejpratap" required
					placeholder="apikey" /><br /> <input type="text" name="q" required
					placeholder="q" /> <input type="submit" value="Search"
					class="button" />
			</form>
		</div>
		<div class="app_card">
			<h1>Search category</h1>

			<form method="GET" action="../../lists/lists.search.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="number"
					name="itemid" placeholder="itemid" /> <br /> <input type="text"
					name="itemname" placeholder="itemname" /> <br /> <input
					type="number" name="itemprice" placeholder="itemprice" /> <br /> <input
					class="button" type="submit" value="Search" /> <br />
			</form>
		</div>
	</div>
</body>
</html>