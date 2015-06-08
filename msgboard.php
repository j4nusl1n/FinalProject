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
		<section><form action="msg_fin.php" method="POST">
			<?php
				$_SESSION['reply']=$_GET['reply'];
				if($_GET['reply']==1)
					$_SESSION['replymid']=$_GET['mid'];
			?>
			<p>Send to <br/><input type="text" name="msg_dest"/></p>
			<p>Message <br/><textarea rows=5 cols=20 name="msg_content"></textarea></p>
			<p><input type="submit" value="Send!"/></p>
		</form></section>
		<p><a href=main.php>Back to Main Page</a></p>
	</article>
</body>
</html>