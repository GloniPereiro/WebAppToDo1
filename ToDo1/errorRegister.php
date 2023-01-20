<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<script type="text/javascript" src="js/index.js"></script>
	<title>Login ToDo</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body >

	<div class="container">
		<div class="loginfield">
		<form action="zarejestruj.php" method="post">
			Login
			<br />
			<input type="text" class="login" name="login" />
			<br />
			Email
			<br />
			<input type="Email" class="login" name="email" />
			</br>
			Password
			<br />
			<input type="password" class="login" name="password" />
			<br />
			<input type="submit" value="Register" class="upperBtn">
		</form>
		<div class="loginfailed"> Ten email jest zajety</div>
		</div>
	</div>

</body>
</html>