<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head><title>Add Household</title>
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
	
	$hid=$_POST['hid'];
	$haddress=$_POST['haddress'];
	$hsize=$_POST['hsize'];
	$hcity=$_POST['hcity'];
	$hheadid=str_pad($_POST['hheadid'], 2, '0', STR_PAD_LEFT);
	
	if($hid!=null&&$haddress!=null&&$hsize!=null&&$hcity!=null&&$hheadid!=null)
	{
		$sql="insert into household (hid, address, size, city, headid) values ('$hid', '$haddress', '$hsize', '$hcity', '$hheadid')";
		$result=mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));
		echo "Adding new household success!";
		echo "<meta http-equiv=REFRESH CONTENT=3;url=main.php>";
	}
	else
	{
		echo "Adding new household fail!";
		echo "<meta http-equiv=REFRESH CONTENT=3;url=main.php>";
	}
	mysqli_close($con);
?>
</body>	
</html>
