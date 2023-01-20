<?php
require_once "connect.php";

$confirm_connect = @new mysqli($host, $db_user, $db_password, $db_name);

if($confirm_connect->connect_errno!=0){
    echo "Error: ".$confirm_connect->connect_errno;
}else{
    $id = $_GET['id'];
    $query = "DELETE FROM tasks WHERE id = '$id'";
    if(mysqli_query($confirm_connect, $query)){
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($confirm_connect);
    }
    mysqli_close($confirm_connect);
}
?>
