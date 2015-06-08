<!DOCTYPE html>
<?php session_start() ?>
<html>
<head><title>Geolocation</title>
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
	$hid=$_GET['hid'];
		
	$sql="select address, city from household where hid='$hid'";
	$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
	$row=mysqli_fetch_row($result);
	$address=$row[0].", ".$row[1];//echo $address;
	
	//$address = '1001 University Road, Hsinchu, Taiwan 300'; 
	$prepAddr = str_replace(' ','+',$address);
 
	$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
 
	$output= json_decode($geocode);
	if($output->status=="ZERO_RESULTS")
	{
		echo "Geocoder Cannot Get Information!";
	}
	else
	{
		$lat = $output->results[0]->geometry->location->lat;
		$long = $output->results[0]->geometry->location->lng;
	
		//echo $address.'<br>Lat: '.$lat.'<br>Long: '.$long;
		$sql="select * from houselatlng where hid='$hid'";
		$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
		$row=mysqli_fetch_row($result);
		if(isset($row[0]))
		{
			echo "<p>Household Latitude & Longitude Found!</p>";
		}
		else
		{
			$sql="insert into houselatlng (hid, latitude, longitude) values ('$hid', '$lat', '$long');";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			echo "<p>Household latitude and longitude added successfully!</p>";
		}	
	
	
		echo "<p><a href=showmap.php?lat=$lat&lng=$long>Show in Map</a></p>";
	}
	echo "<p><a href=householdinfo.php>Back to Household Information</a></p>";
?>
</body>
</html>
