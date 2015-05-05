<!DOCTYPE html>
<html>
<head>
<title>Bank manager</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

	<header>
		<a href="insert.html">Bank Manager</a>
	</header>

	<div class="menuBar">
		<div class="app_card">
			<form action="../../bank/bank.showall.php">
				<input type="text" value="tejpratap" name="apikey" required
					placeholder="apikey" /><br /> <input class="button" type="submit"
					value="Show All" />
			</form>
		</div>

		<div class="app_card">
			<form action="../../bank/bank.deleteall.php">
				<input type="text" value="tejpratap" name="apikey" required
					placeholder="apikey" /><br /> <input class="button" type="submit"
					value="Delete All" />
			</form>
		</div>
	</div>

	<div class="menuBar">
		<div class="app_card">
			<h1>Update previous</h1>

			<form method="GET" action="../../bank/bank.update.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="text"
					name="bankid" placeholder="bankid" /> <br /> <input type="number" min="1"
					name="balance" placeholder="balance" /> <br /> <input
					class="button" type="submit" value="Update" /> <br />
			</form>
		</div>
		<div class="app_card">
			<h1>Show</h1>

			<form method="GET" action="../../bank/bank.show.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="text"
					name="bankid" placeholder="bankid" required /> <br /> <input
					class="button" type="submit" value="Show" /> <br />
			</form>
		</div>
	</div>
</body>
</html>