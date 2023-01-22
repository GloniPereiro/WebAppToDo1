<?php    
require_once "config.php";
session_start(); 
?>
<!DOCTYPE html>
<html lang="pl">	
<head>
	<meta charset="utf-8" />
	<script type="text/javascript" src="js/index.js"></script>
	<title>Aplikacja ToDo</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div></br></div>
	<div class="upper">
		<br />
		<button class="upperBtn">
			<?php
				echo $_SESSION['user'];
			?>
		</button><br />
		<button  class="upperBtn" onclick="onWyloguj()">Wyloguj</button>
	</div>

	<div class="container">
			<div class="wprowadzZadanie">
				<h3>Wprowadz Zadanie</h3>
			</div>
		<form action="dodaj.php" method="post">
			<input type="text" class="poleWprowadzania" id="poleWprowadzania" name="title" required />
			<input type="submit" class="btnDodaj"  value="Add"/>
		</form>
		<div class="listaZadan" id="lista">
			<div class="zrobione"><h3>to Do</h3></div>
			<div id="zadanie" class="zadanie">
				<?php
					require_once "connect.php";
						if(!isset($_SESSION['user'])) {
							header("Location: login.php");
							exit;
						}
					$confirm_connect = @new mysqli($host, $db_user, $db_password, $db_name);
					$check_user_query = "SELECT * FROM newtable WHERE email = '{$_SESSION['user']}'";
					$check_user_result = mysqli_query($confirm_connect, $check_user_query);
					$query = "SELECT * FROM tasks WHERE email ='{$_SESSION['user']}' AND status = 0 ";
					$result = mysqli_query($confirm_connect, $query);
					while($row = mysqli_fetch_array($result))
					{
						echo "<div id='zadanie' class='zadanie'>" . $row['title'] ."
						<button onclick='deleteRecord({$row['id']})' class='delete-button' data-id='{$row['id']}'>Usun</button>
						<button onclick='markAsDone({$row['id']})' class='delete-button' data-id='{$row['id']}'>Zrobione</button>
						</div>";
					}
					mysqli_close($confirm_connect);
				?>
			</div>
		</div>
		<div class="listaZadan" id="zrobione">

			<div id="zadanie" class="zadanie"></div>
			<div class="zrobione"><h3>Done</h3></div>
		<?php
					require_once "connect.php";
					$confirm_connect = @new mysqli($host, $db_user, $db_password, $db_name);
					$query = "SELECT * FROM tasks WHERE email ='{$_SESSION['user']}' AND status = 1 ";
					$result = mysqli_query($confirm_connect, $query);
					while($row = mysqli_fetch_array($result))
					{
						echo "<div id='zadanie' class='zadanie'>" . $row['title'] ."
						<button onclick='deleteRecord({$row['id']})' class='delete-button' data-id='{$row['id']}'>Usun</button>
						</div>";
					}
					mysqli_close($confirm_connect);
				?>
		</div>
	</div>
</body>
</html>