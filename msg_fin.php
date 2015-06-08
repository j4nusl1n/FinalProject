<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head><title>Message Board</title>
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
<header><h1>Message Board</h1></header>
	<article>
	<section>
	<?php
		include("mysqlconnect.inc.php");
		//echo $_POST['msg_send']."<br/>";
		//echo $_POST['msg_dest']."<br/>";
		//echo $_POST['msg_content']."<br/>";
		if($_POST['msg_dest']!=null&&$_POST['msg_content']!=null)
		{
			$sql="select mid from msgboard order by mid desc";
			$result=mysqli_query($con, $sql);
			$row=mysqli_fetch_row($result);
			$mid=$row[0]+1;
			$source=$_SESSION['current_name'];
			$sid=$_SESSION['current_uid'];
			//echo $sid;
			$dest=$_POST['msg_dest'];
			$sql="select uid from users where users.username='$dest'";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			$row=mysqli_fetch_row($result);
			$did=$row[0];
			//echo $did;
			$content=$_POST['msg_content'];
			$newContent=mysqli_real_escape_string($con, $content);
			$unread=1;
			
			date_default_timezone_set('Asia/Taipei');
			$msgtime=date("Y-m-d H:i:s");
			$sql="insert into msgboard (mid, sid, srcname, did, dstname, content, unread, time) values ('$mid', '$sid', '$source', '$did', '$dest', '$newContent', '$unread', '$msgtime')";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			
			if($_SESSION['reply']==1)
			{
				//echo $_SESSION['replymid'];
				$sql="update msgboard set unread=0 where mid=".$_SESSION['replymid'];
				$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			}
			
			echo "Message Sent Successfully!";
			echo "<meta http-equiv=REFRESH CONTENT=3;url=main.php>";
		}
		else
		{
			echo "Please fill all the block!";
			echo "<p><img src='asdf.png' height=20% width=20%></p>";
			echo "<meta http-equiv=REFRESH CONTENT=3;url=main.php>";
		}
	?>
	</section>
	</article>
</body>
</html>