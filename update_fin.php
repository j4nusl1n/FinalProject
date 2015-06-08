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
<body style="font-family:Arial; font-size: large">
<?php
	
	include("mysqlconnect.inc.php");
	$update_uid=$_SESSION['update_uid'];
	$sql="select * from personal_info where uid='$update_uid'";
	$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
	$row=mysqli_fetch_row($result);
	if($row!=null)
	{
		$olduid=$row[0]; 
		$oldname=$row[1];
		$oldsex=$row[2]; 
		$oldbdate=$row[3];
		$oldhid=$row[4];
		$modname=$_POST['modname'];
		$modsex=$_POST['modsex'];
		$modbdate=$_POST['modBDate'];
		$modhid=$_POST['modhid'];
		
		$sql="select max(historyid) from pmod_history";
		$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
		$row=mysqli_fetch_row($result);
		$historyid=$row[0]+1;//echo $historyid;
		
		$sql="select headid from household where household.hid='$oldhid'";
		$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
		$row=mysqli_fetch_row($result);
		if($olduid==$row[0])
			$ishead=1;
		else $ishead=0;
		
		date_default_timezone_set('Asia/Taipei');
		$modtime=date("Y-m-d H:i:s");
		
		$sql="insert into pmod_history (historyid, uid, name, sex, birthday, hid, ishead, modtime) values ('$historyid', '$olduid', '$oldname', '$oldsex', '$oldbdate', '$oldhid', '$ishead', '$modtime')";
		$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
		
		$sql="update personal_info set uid='$olduid', name='$modname', sex='$modsex', birthday='$modbdate', hid='$oldhid', modtime='$modtime' where uid=$olduid";
		$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
		
		echo "Information Update Success!<br>Back to Main Page...<meta http-equiv=REFRESH CONTENT=3;url=main.php>";
	}
	else
	{
		echo "Information Update Fail!<meta http-equiv=REFRESH CONTENT=3;url=main.php>";
	}
	mysqli_close($con);
?>
</body>
</html>
