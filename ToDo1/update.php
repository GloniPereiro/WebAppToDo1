<?php
require_once "connect.php";

$confirm_connect = @new mysqli($host, $db_user, $db_password, $db_name);

// Pobranie ID i statusu z parametru URL
$id = $_GET['id'];
$status = $_GET['status'];

// Przygotowanie zapytania SQL do zmiany statusu rekordu
$query = "UPDATE tasks SET status= 1 WHERE id='$id'";

//Wykonanie zapytania
$result = mysqli_query($confirm_connect, $query);

// Sprawdzenie czy zapytanie zakoñczy³o siê sukcesem
if ($result) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($confirm_connect);
}

mysqli_close($confirm_connect);
?>
