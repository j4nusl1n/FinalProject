<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head><title>Add New Household</title>
	<link rel="SHORTCUT ICON" href="123.ico">
	<style type="text/css">
	a:link {
		text-decoration: none;
		color: #1e90ff;
	}
	a:visited {
		text-decoration: none;
		color: #ff1493;
		
	}
	a:hover {
		text-decoration: underline;
		color: #ff4500;
		cursor: pointer;
	}
</style>
	</head>
	<body style="font-family:Arial; font-size: large">
	<article>
		<section>
			<form action="addhouse_fin.php" method="POST">
				<p>House ID: <input type="text" name="hid"/></p>
				<p>Address: <input type="text" name="haddress"/></p>
				<p>Size: <input type="number" name="hsize"/></p>
				<p>City: <input type="text" name="hcity"/></p>
				<p>Head ID: <input type="number" name="hheadid"/></p>
				<p><input type="submit" value="Add New Household"/></p>
			</form>
		</section>
	</article>
	</body>
</html>