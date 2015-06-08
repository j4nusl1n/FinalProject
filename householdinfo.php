<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head><title>Household Information</title>
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
	$host="localhost";
	$username="dbuser";
	$password="dbuser";
	$database="db_0016201";
	$con=mysqli_connect($host, $username, $password, $database);
	if(mysqli_connect_error($con))
	{
		echo "Fail to connect to MySQL: ".mysqli_connect_error();
	}
	else
	{
		if(isset($_SESSION['hid']))
		{
			echo "<body><h1>Household Information</h1></body>";
			$hid=$_SESSION['hid'];
			$sql="SELECT * FROM household WHERE household.hid='".$hid."'";
			$result=mysqli_query($con, $sql);
			$row=mysqli_fetch_row($result);
			echo "Household ID: ".$row[0]."<br>Address: ".$row[1]."<br>Size: ".$row[2]."<br>City: ".$row[3]."<br>";
			echo "<a href=geolocation.php?hid=$hid>Geometric Location</a>";
			echo "<h2>Household Member</h2><br>";
			$sql="SELECT personal_info.name, personal_info.uid FROM personal_info WHERE personal_info.hid='".$hid."'";
			$result=mysqli_query($con, $sql);
			echo '<table style="border: 5px double;" frame="border" rules="all"><tbody>';
			while($row=mysqli_fetch_row($result))
			{
				echo "<tr><td><a href=userinfo.php?uid=".$row[1].">".$row[0]."</a></td></tr>";
			}
			echo '</tbody></table><br>';
			echo "<a href=main.php>Back to Main Page</a>";
		}
		else
		{
			echo "You haven't login yet!";
			echo "<meta http-equiv=REFRESH CONTENT=3;url=index.php>";
		}
		mysqli_close($con);
	}
?>
<body>
</html>