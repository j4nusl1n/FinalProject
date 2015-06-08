<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head><title>Modification History</title>
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
<header><h1>Modification History</h1></header>
	<article>
		<section>
			<form action="show_fin.php" method="POST">
			Enter Time Interval
				<p>Start: <input type="text" name="stime"></p>
				<p>End: <input type="text" name="etime"></p>
			<?php
				if($_SESSION['isadmin']==1)
				{
					echo "Enter UID (Admin Only)";
					echo "<p><input type='number' name='uid'></p>";
				}
			?>
				<p><input type="submit" value="submit"></p>
			</form>
		</section>
	</article>
	<a href=main.php>Back to Main Page</a>
</body>
</html>