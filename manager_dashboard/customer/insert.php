<!DOCTYPE html>
<html>
<head>
<title>customer manager</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

	<header>
		<a href="insert.html">Customer Manager</a>
	</header>

	<div class="menuBar">
		<div class="app_card">
			<form action="../../customer/customer.showall.php">
				<input type="text" value="tejpratap" name="apikey" required
					placeholder="apikey" /><br /> <input class="button" type="submit"
					value="Show All" />
			</form>
		</div>

		<div class="app_card">
			<form action="../../customer/customer.deleteall.php">
				<input type="text" value="tejpratap" name="apikey" required
					placeholder="apikey" /><br /> <input class="button" type="submit"
					value="Delete All" />
			</form>
		</div>
	</div>

	<div class="menuBar">
		<div class="app_card">
			<h1>Add New</h1>

			<form method="GET" action="../../customer/customer.register.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="text"
					name="username" placeholder="username" required /> <br /> <input
					type="text" name="name" placeholder="name" required /> <br /> <input
					type="email" name="email" placeholder="email" required /> <br />
				<input type="text" name="password" placeholder="password" required />
				<br /> <input type="text" name="bankid" placeholder="bankid"
					required /> <br /> <input class="button" type="submit"
					value="Insert" required /> <br />
			</form>
		</div>

		<div class="app_card">
			<h1>Update previous</h1>

			<form method="GET" action="../../customer/customer.update.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="text"
					name="username" placeholder="username" required /> <br /> <input
					type="text" name="name" placeholder="name" /> <br /> <input
					type="email" name="email" placeholder="email" /> <br /> <input
					type="text" name="password" placeholder="password" /> <br /> <input
					type="text" name="bankid" placeholder="bankid" /> <br /> <input
					class="button" type="submit" value="Update" /> <br />
			</form>
		</div>
	</div>

	<div class="menuBar">
		<div class="app_card">
			<h1>Search</h1>

			<form method="GET" action="../../customer/customer.search1.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /><br /> <input type="text" name="q"
					placeholder="q" required /><br /> <input class="button"
					type="submit" value="Search" />
			</form>
		</div>

		<div class="app_card">
			<h1>Search category</h1>

			<form method="GET" action="../../customer/customer.search.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="text"
					name="name" placeholder="name" /> <br /> <input type="email"
					name="email" placeholder="email" /> <br /> <input type="text"
					name="username" placeholder="username" /> <br /> <input
					type="text" name="bankid" placeholder="bankid" /> <br /> <input
					class="button" type="submit" value="Search" /> <br />
			</form>
		</div>
	</div>

	<div class="menuBar">
		<div class="app_card">
			<h1>Delete One</h1>

			<form method="GET" action="../../customer/customer.delete.php">
				<input type="text" name="apikey" placeholder="apikey"
					value="tejpratap" required /> <br /> <input type="text" name="id"
					placeholder="id" required /> <br /> <input class="button"
					type="submit" value="Delete" /> <br />
			</form>
		</div>
	</div>
</body>
</html>