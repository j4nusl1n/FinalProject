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
<h1>Modification History</h1>
<?php

	include("mysqlconnect.inc.php");

	$stime=$_POST['stime'];
	$etime=$_POST['etime'];
	
	if($_SESSION['isadmin']==1)
	{
		$uid=$_POST['uid'];//echo $uid;
		if($stime!=null&&$etime!=null)
		{
			$sql="select * from pmod_history where modtime between '$stime' and '$etime' and uid='$uid' order by modtime desc";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			echo '<table style="border: 5px double;" frame="border" rules="all"><tbody>';
			echo '<tr><td>historyid</td><td>uid</td><td>name</td><td>sex</td><td>birthday</td><td>hid</td><td>ishead</td><td>modtime</td></tr>';
			while($row=mysqli_fetch_row($result))
			{
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
			}
			echo '</tbody></table><br>';
		}
		else if($uid!=null)
		{
			$sql="select * from pmod_history where uid='$uid' order by modtime desc";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			echo '<table style="border: 5px double;" frame="border" rules="all"><tbody>';
			echo '<tr><td>historyid</td><td>uid</td><td>name</td><td>sex</td><td>birthday</td><td>hid</td><td>ishead</td><td>modtime</td></tr>';
			while($row=mysqli_fetch_row($result))
			{
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
			}
			echo '</tbody></table><br>';
		}
		else
		{
			$sql="select * from pmod_history order by modtime desc";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			echo '<table style="border: 5px double;" frame="border" rules="all"><tbody>';
			echo '<tr><td>historyid</td><td>uid</td><td>name</td><td>sex</td><td>birthday</td><td>hid</td><td>ishead</td><td>modtime</td></tr>';
			while($row=mysqli_fetch_row($result))
			{
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
			}
			echo '</tbody></table><br>';
		}
	}
	else
	{
		if($stime!=null&&$etime!=null)
		{
			$sql="select * from pmod_history where modtime between '$stime' and '$etime' order by modtime desc";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			echo '<table style="border: 5px double;" frame="border" rules="all"><tbody>';
			echo '<tr><td>historyid</td><td>uid</td><td>name</td><td>sex</td><td>birthday</td><td>hid</td><td>ishead</td><td>modtime</td></tr>';
			while($row=mysqli_fetch_row($result))
			{
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
			}
			echo '</tbody></table><br>';
		}
		else
		{
			$sql="select * from pmod_history order by modtime desc";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			echo '<table style="border: 5px double;" frame="border" rules="all"><tbody>';
			echo '<tr><td>historyid</td><td>uid</td><td>name</td><td>sex</td><td>birthday</td><td>hid</td><td>ishead</td><td>modtime</td></tr>';
			while($row=mysqli_fetch_row($result))
			{
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
			}
			echo '</tbody></table><br>';
		}
	}
	echo "<a href=main.php>Back to Main Page</a>";
?>
</body>
</html>