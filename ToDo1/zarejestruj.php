<?php
    session_start();
    require_once "connect.php";

    $confirm_connect = @new mysqli($host, $db_user, $db_password, $db_name);

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = mysqli_prepare($confirm_connect, "SELECT * FROM newtable WHERE email = ?");

    if(strlen($login) < 5 || strlen($login) > 20) {
    header('Location: errorRegister.php?error=loginLength');
    exit();
    }
    if(strlen($password) < 8 || strlen($password) > 30) {
    header('Location: errorRegister.php?error=passwordLength');
    exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0) {
        header('Location: errorRegister.php');
    } else {
        $query = "INSERT INTO newtable (login, email, password) VALUES ('$login', '$email', '$password')";

        if(mysqli_query($confirm_connect, $query)) {
            header('Location: login.php');
        } else {
            echo "Wyst¹pi³ b³¹d podczas rejestracji.";
        }
        mysqli_close($confirm_connect);
    }
    mysqli_stmt_close($stmt);

?>
