<!DOCTYPE html>
<?php session_start() ?>
<html>
	<head><title>Delete Message</title>
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
	<?php
		include("mysqlconnect.inc.php");
		$mid=$_GET['mid'];
		$sql="delete from msgboard where mid=$mid";
		$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
		echo "Message Delete Successfully!<br/>";
	?>
	<button onclick="window.close()">Close</button>
	</body>
</html>