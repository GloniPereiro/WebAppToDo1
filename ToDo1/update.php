<?php
require_once "connect.php";

$confirm_connect = @new mysqli($host, $db_user, $db_password, $db_name);
$id = $_GET['id'];
$status = $_GET['status'];
$query = "UPDATE tasks SET status= 1 WHERE id='$id'";
$result = mysqli_query($confirm_connect, $query);

if ($result) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($confirm_connect);
}
mysqli_close($confirm_connect);
?>
