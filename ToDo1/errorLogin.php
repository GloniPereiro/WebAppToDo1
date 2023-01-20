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
		<form action="zaloguj.php" method="post">
			Login
			<br />
			<input type="text" class="login" name="login" />
			<br />
			Password
			<br />
			<input type="password" class="login" name="password" />
			<br />
			<input type="submit" value="Login" class="upperBtn">
		</form>
		<div class="loginfailed"> Bledne dane logowania</div>
		<div class="registerDiv">
			Nie posiadasz konta zarejestruj sie </br> <a href="register.php">Tutaj!</a> 
		</div>
		</div>
	</div>

</body>
</html>