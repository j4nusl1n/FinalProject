<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head><title>Logout</title>
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
	Logout successfully!<br/>
	<a href="index.php">Back to Login Page</a>
<?php
	session_destroy();
?>
</body>
</html>