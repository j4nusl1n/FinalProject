<!DOCTYPE html>
<html>
<head><title>Change Password</title>
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
	<header><h1>Change Password</h1><header>
	<article>
		<form name="form" method="post" action="pwdre_fin.php">
			<p>Account: <input type="text" name="account"/></p>
			<p>Email: <input type="email" name="mail"/></p>
			<p>Enter New Password: <input type="password" name="pw"/></p>
			<p>Enter Again: <input type="password" name="pw2"/></p>
			<input type="Submit" value="OK"/>
		</form>
	</article>
	<p><a href=index.php>Back to Login Page</a></p>
</body>
</html>
<?php
?>