<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head><title>Anounce Board</title>
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
<header><h1>Anounce Board</h1></header>
	<article>
	<section>
	<?php
		include("mysqlconnect.inc.php");
		//echo $_POST['msg_send']."<br/>";
		//echo $_POST['msg_dest']."<br/>";
		//echo $_POST['msg_content']."<br/>";
		if($_POST['msg_content']!=null)
		{
			$sql="select aid from anounceboard order by aid desc";
			$result=mysqli_query($con, $sql);
			$row=mysqli_fetch_row($result);
			$aid=$row[0]+1;
			$content=$_POST['msg_content'];
			$newContent=mysqli_real_escape_string($con, $content);
			$unread=1;
			
			date_default_timezone_set('Asia/Taipei');
			$anoutime=date("Y-m-d H:i:s");
			$sql="insert into anounceboard (aid, content, time, unread) values ('$aid', '$newContent', '$anoutime', '$unread')";
			$result=mysqli_query($con, $sql) or die("Error:".mysqli_error($con));
			
			echo "Anounce Successfully!";
			echo "<meta http-equiv=REFRESH CONTENT=3;url=main.php>";
		}
		else
		{
			echo "Please fill the block!";
			echo "<meta http-equiv=REFRESH CONTENT=3;url=main.php>";
		}
	?>
	</section>
	</article>
</body>
</html>