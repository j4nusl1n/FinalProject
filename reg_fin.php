<!DOCTYPE html>
<?php session_start(); ?>
<html>
<header><title>Registration</title>
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
</header>
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
		echo "<p><img src="asdf.png" height=20% width=20%></p>";
	}
	else
	{
		$account=$_POST['account'];
		$pw=$_POST['pw'];
		$pw2=$_POST['pw2'];
		$address=$_POST['address'];
		$hid=$_POST['hid'];
		$name=$_POST['username'];
		$sex=$_POST['sex'];
		$bdate=$_POST['BDate'];
		$mail=$_POST['mail'];
		$id=0;
		
		//echo "$account<br>$pw<br>$pw2<br>$address<br>$hid<br>$name<br>$sex<br>$bdate<br>$mail<br>";
		if($account!=null&&$pw!=null&&$pw2!=null&&$pw==$pw2)
		{
			$sql="select * from users order by users.uid desc";
			$result=mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));
			$row=mysqli_fetch_row($result);
			if($row!=null)
				$id=$row[2];
			//echo $id+1;
			$id++;
			$id=str_pad($id, 2, '0', STR_PAD_LEFT);
			$pwstr=md5($pw);
			//echo "<br> $pwstr<br>";
			$sql="insert into users (username, password, uid, email, isadmin) values ('$account', '$pwstr', '$id', '".mysqli_real_escape_string($con, $mail)."', '0')";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			//echo $id;
			date_default_timezone_set('Asia/Taipei');
			$modtime=date("Y-m-d H:i:s");
			$sql="insert into personal_info (uid, name, sex, birthday, hid, modtime) values ('$id', '$name', '$sex', '$bdate', '$hid', '$modtime')";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			//echo $sex;
			$sql="select max(historyid) from pmod_history";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			$row=mysqli_fetch_row($result);
			$historyid=$row[0]+1;//echo $historyid;
			$sql="select headid from household where household.hid='$hid'";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			$row=mysqli_fetch_row($result);
			if($id==$row[0])
				$ishead=1;
			else $ishead=0;
			$sql="insert into pmod_history (historyid, uid, name, sex, birthday, hid, ishead, modtime) values ('$historyid', '$id', '$name', '$sex', '$bdate', '$hid', '$ishead', '$modtime')";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			echo "Registration Success!<br>Back to Login Page...<meta http-equiv=REFRESH CONTENT=3;url=index.php>";
		}
		else
		{
			echo "Registration Fail!";
			echo "<p><img src='asdf.png' height=20% width=20%></p>";
			echo "<meta http-equiv=REFRESH CONTENT=3;url=index.php>";
		}
	}
	mysqli_close($con);
?>
</body>
</html>
