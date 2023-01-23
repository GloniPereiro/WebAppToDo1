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
			<input type="text" class="poleWprowadzania" id="login" name="login" minlengh="4" required="required"
			placeholder="minimum 5 characters" pattern="[a-zA-Z0-9_@!]*" />
			<br />
			Email
			<br />
			<input type="Email" class="poleWprowadzania" name="email"  required="required"/>
			</br>
			Password
			<br />
			<input type="password" class="poleWprowadzania" id="password" name="password" minlengh="8" required="required"
			 placeholder="minimum 8 characters" pattern="[a-zA-Z0-9_@!]*" />
			<br />
			<input type="submit" value="Register" class="upperBtn">
			<br />
			OR
			<br />
			<button class="upperBtn" onclick="onZaloguj()">Login</button>
		</form>
		<div class="loginfailed"> Email moze byc zajety albo zle wprowadziles dane</div>
		<br />
		OR
		<br />
		<button class="upperBtn" onclick="onZaloguj()">Login</button>
		</div>
	</div>
</body>
</html>