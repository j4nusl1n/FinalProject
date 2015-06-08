<!DOCTYPE html>
<!-- CSS is AWEEEEEEEEEEEEEEEEEEEEEEESOME -->
<?php session_start(); ?>
<html>
<head><title>Main Page</title>
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
<script type="text/javascript">
	function askDelAnounce(aid, admin)
	{
		if(confirm("Delete this anouncement?")==true)
		{
			if(admin==1)
				window.open("delanou.php?aid="+aid, "", "height=500, width=500, menubar=no");
			else
				alert("Only Administor Can Delete!");
				
				window.open("main.php", "_self");
		}
	}
	function askDel(msgid)
	{
		if(confirm("Delete this message?")==true)
		{
			window.open("delmsg.php?mid="+msgid, "", "height=500, width=500, menubar=no");
			window.open("main.php", "_self");
		}
	}
</script>
</head>
<body style="font-family:Arial; font-size: large">
<header><h1>Main Page</h1></header>
<?php
function checkUnread($con, $uid)
{
	$sql="select srcname, content, time, mid from msgboard where msgboard.did='$uid' and unread=1 order by time desc";
	$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
	
	echo "<section>
			<p><h3>Unread Message</h3></p>
			<p>";
	echo "<table style='border: 5px double;' frame='border' rules='all'><tbody>";
	echo "<tr><td>Sender</td><td>Message</td><td>When</td><td>Reply?</td><td>Delete Message</td></tr>";
	while($row=mysqli_fetch_row($result))
	{
		$msg=str_replace("\n", "<br/>", $row[1]);
		echo "<tr><td>".$row[0]."</td><td>".$msg."</td><td>".$row[2]."</td><td><a href=msgboard.php?reply=1&mid=".$row[3].">Reply</a></td><td><button onclick='askDel($row[3])'>Delete</button></td></tr>";
	}
	echo "</tbody></table>";
	echo "<p><a href=msgboard.php?reply=0>Send Message</a></p>";
	echo "</p></section>";

	
}

function checkAnounce($con, $admin)
{
	$sql="select content, time, aid from anounceboard where unread=1 order by time desc";
	$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
	echo "<section>
			<p><h3>Anouncement</h3></p>
			<p><table style='border: 5px double;' frame='border' rules='all'><tbody>
			<tr><td>Anouncement</td><td>Time</td><td>Delete</td></tr>";
	while($row=mysqli_fetch_row($result))
	{
		$content=str_replace("\n", "<br/>", $row[0]);
		echo "<tr><td>$content</td><td>$row[1]</td><td><button onclick='askDelAnounce($row[2], $admin)'>Delete</button></td></tr>";
	}
	echo "</tbody></table></p></section>";
}

function statistic($con)
{
	echo "<h3>Household Statistics</h3>";
	$sql="select count(*) from personal_info where sex='M'";
	$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
	$row=mysqli_fetch_row($result);
	$mcount=$row[0];
	//echo "<p>Male: $mcount</p>";
	$sql="select count(*) from personal_info where sex='F'";
	$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
	$row=mysqli_fetch_row($result);
	$fcount=$row[0];
	//echo "<p>Female: $fcount</p>";
	$ratio=$mcount/$fcount;
	echo "<p>Male/Female: $ratio</p>";
}

function housemember($con, $uid)
{
	echo "<p><h3>Household Member</h3>";
	$sql="SELECT personal_info.hid FROM personal_info WHERE personal_info.uid=".$uid;
	$result=mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));
	$row=mysqli_fetch_row($result);
	$hid=$row[0]; //echo $hid;
	$sql="SELECT personal_info.hid, personal_info.name, personal_info.uid FROM personal_info WHERE personal_info.hid='".$hid."'";
	$result=mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));
	echo '<table style="border: 5px double;" frame="border" rules="all"><tbody>';
	while($row=mysqli_fetch_row($result))
	{
		echo "<tr><td>".$row[0]."</td><td><a href=userinfo.php?uid=".$row[2].">".$row[1]."</a></td></tr>";
	}
	echo '</tbody></table></p>';
}

function welcomemsg($con, $uid, $admin)
{
	$sql="SELECT personal_info.name FROM personal_info WHERE personal_info.uid=".$uid;
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_row($result);
	echo "<section>";
	echo "<h2>Welcome, ".$row[0]." !</h2>";
	echo "<p><a href=userinfo.php?uid=".$uid.">User Info</a><br><a href=householdinfo.php>Household Info</a><br><a href=showhistory.php>Modification History</a><br><a href=logout.php>Logout</a><br>";
	echo "</p></section>";
	echo "<section>";
	if($admin==1)		//admin
	{
		checkAnounce($con, $admin);
		housemember($con, $uid);
		echo "<p><h3>Modification History</h3></p>";
		$sql="SELECT uid, name, modtime FROM personal_info ORDER BY modtime DESC";
		$result=mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));
		echo '<table style="border: 5px double;" frame="border" rules="all"><tbody>';
		for($i=0;$i<5;$i++)
		{
			$row=mysqli_fetch_row($result);
			echo "<tr><td>".$row[0]."</td><td><a href=userinfo.php?uid=".$row[0].">".$row[1]."</a></td><td>".$row[2]."</td></tr>";
		}
		echo "</tbody></table>";
		echo "<p><a href=addhouse.php>Add New Household</a></p>";
		//echo "<p><a href=infoupdate.php>Information Update</a></p>";
		statistic($con);
		echo "<p><a href=anounce.php>Anouncement</a></p>";
	}
	else			//other
	{
		checkAnounce($con, $admin);
		housemember($con, $uid);
	}
	echo "</section>";
}
	$host="localhost";
	$username="dbuser";
	$password="dbuser";
	$database="db_0016201";
	
	$con=mysqli_connect($host, $username, $password, $database);
	if(mysqli_connect_error($con))
	{
		echo "Fail to connect to MySQL: ".mysqli_connect_error();
		echo "<p><img src='asdf.png' height=20% width=20%></p>";
	}
	else
	{
		if(isset($_POST['user'])&&isset($_POST['pw']))
		{
			$account=$_POST['user'];
			$pwstr=md5($_POST['pw']);
			$sql="alter table pmod_history modify historyid int(15)";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			$sql="SELECT users.username, users.uid, users.isadmin FROM users WHERE username='".mysqli_real_escape_string($con, $account)."'AND password='".mysqli_real_escape_string($con, $pwstr)."'";
			$result=mysqli_query($con, $sql) or die("Error: ".mysqli_error($con)); 
			$row=mysqli_fetch_array($result);
			if($row!=null)
			{
				$_SESSION['current_uid']=$row['uid'];
				$_SESSION['current_name']=$row['username'];
				$_SESSION['isadmin']=$row['isadmin'];//echo $admin;
				$sql="SELECT personal_info.hid FROM personal_info WHERE personal_info.uid=".$_SESSION['current_uid'];
				$result=mysqli_query($con, $sql);
				$row=mysqli_fetch_row($result);
				$_SESSION['hid']=$row[0];
				welcomemsg($con, $_SESSION['current_uid'], $_SESSION['isadmin']);
				echo "<section>";
				checkUnread($con, $_SESSION['current_uid']);
				echo "</section>";
			}
			else
			{
				echo "Wrong Password!";
				echo "<p><img src='asdf.png' height=20% width=20%></p>";
				echo "<meta http-equiv=REFRESH CONTENT=3;url=index.php>";
			}
		}
		else if(isset($_SESSION['current_uid'])&&isset($_SESSION['current_name']))
		{
			welcomemsg($con, $_SESSION['current_uid'], $_SESSION['isadmin']);
			echo "<section>";
			checkUnread($con, $_SESSION['current_uid']);
			echo "</section>";
		}
		else
		{
			echo "You haven't login yet!";
			echo "<p><img src='asdf.png' height=20% width=20%></p>";
			echo "<meta http-equiv=REFRESH CONTENT=3;url=index.php>";
		}
		mysqli_close($con);
	}
?>
</body>
</html>