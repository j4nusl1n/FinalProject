<!DOCTYPE html>
<html>
<head><title>Regist Page</title>
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
	<header><h1>Regist Page</h1><header>
	<article>
		<form name="form" method="post" action="reg_fin.php">
			<p>Account: <input type="text" name="account"/></p>
			<p>Password: <input type="password" name="pw"/></p>
			<p>Enter Password Again: <input type="password" name="pw2"/></p>
			<p>Household Address: <input type="text" name="address"/></p>
			<p>Household ID: <input type="text" name="hid"/></p>
			<p>Name: <input type="text" name="username"/></p>
			<p>Sex: <input type="radio" name="sex" value='M' checked/>Male<input type="radio" name="sex" value='F'/>Female</p>
			<p>Birth Date: <input type="date" name="BDate"/></p>
			<p>Email: <input type="email" name="mail"/></p>
			<input type="Submit" value="Regist"/>
		</form>
	</article>
	<p><a href=index.php>Back to Login Page</a></p>
</body>
</html>
<?php
?>