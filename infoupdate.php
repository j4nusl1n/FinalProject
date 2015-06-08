<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head><title>Information Update</title>
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
<body style="font-family:Arial; font-size: large"><header><h1>Information Update</h1></header>
<?php
	
	include("mysqlconnect.inc.php");
	
	$uid=$_GET['uid'];//echo $uid;
	$_SESSION['update_uid']=$uid;
	$sql="select * from personal_info where uid='$uid'";
	$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
	echo '<form name="form" method="post" action="update_fin.php">';
	echo '<p><table style="border: 5px double;" frame="border" rules="all"><tbody>';
	echo '<tr><td>name</td><td>sex</td><td>birthday</td><td>hid</td><tr>';
	$row=mysqli_fetch_row($result);
	echo "<tr><td><input type='text' name='modname' value='$row[1]'></td><td><input type='text' name='modsex' value='$row[2]'></td><td><input type='date' name='modBDate' value='$row[3]'></td><td><input type='text' name='modhid' value='$row[4]'></td><tr>";
	echo '</tbody></table></p>';
	echo "<input type='submit' value='Update'></form>";
	echo '<a href=main.php>Back to Main Page</a>';
?>
</body>
</html>
