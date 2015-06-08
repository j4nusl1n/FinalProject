<!DOCTYPE html>
<html>
<head><title>Login Page</title>
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
	<header><h1>Login Interface</h1></header>
	<article>
	<section><form action="main.php" method="POST">
	<p>Account: <input type="text"name="user"/><br/></p>
	<p>Password: <input type="password"name="pw"/><br/></p>
	<p><input type="Submit" value="Login"/><br/></p>
	</form></section>
	<p><section>Not a member? <a href="register.php">Regist</a></section></p>
	<p><a href="pwdretrieve.php">Forgot Password?</a></p>
	</article>
</body>
</html>