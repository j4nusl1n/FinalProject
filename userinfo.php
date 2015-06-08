<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head><title>User Information</title>
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
	else if(isset($_SESSION['current_uid'])&&isset($_SESSION['current_name'])&&isset($_GET['uid']))
	{
		$uid=$_GET['uid'];//echo $uid;
		$sql="SELECT * FROM personal_info WHERE uid='".mysqli_real_escape_string($con, $uid)."'";
		$result=mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));
		$row=mysqli_fetch_array($result);
		if($row!=null)
		{
			$_SESSION['hid']=$row['hid'];
			echo "Name: ".$row['name']."<br>";
			echo "Sex: ".$row['sex']."<br>";
			echo "Birth Date: ".$row['birthday']."<br>";
			echo "<a href=householdinfo.php>Household Info</a><br><a href=main.php>Main Page</a><br>";
		}
		if($_SESSION['isadmin']==1)
		{
			echo "<a href=infoupdate.php?uid=$uid>Information Update</a>";
		}
		mysqli_close($con);
	}
	else
	{
		echo "You haven't login yet!";
		echo "<meta http-equiv=REFRESH CONTENT=3;url=index.php>";
		mysqli_close($con);
	}
?>
</body>
</html>