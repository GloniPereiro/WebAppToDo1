<?php

session_start();
require_once "connect.php";

$confirm_connect = @new mysqli($host, $db_user, $db_password, $db_name);

$email = $_SESSION['user'];
$title = $_POST['title'];
$status = "new";

//Przygotowanie zapytania SQL do wstawienia danych do tabeli
$query = "INSERT INTO tasks (email, title) VALUES (?, ?)";

//Przygotowanie statement
$stmt = mysqli_prepare($confirm_connect, $query);

//Podpi�cie parametr�w do statement
mysqli_stmt_bind_param($stmt, "ss", $email, $title);

//Wykonanie zapytania
if(mysqli_stmt_execute($stmt)) {
    header('Location: index.php');
} else {
    echo "Wyst�pi� b��d podczas dodawania zadania.";
}

//Zamkni�cie statement
mysqli_stmt_close($stmt);

?>

