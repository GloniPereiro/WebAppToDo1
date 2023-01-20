<?php


    session_start();
    require_once "connect.php";

    $confirm_connect = @new mysqli($host, $db_user, $db_password, $db_name);

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Przygotowanie zapytania
    $stmt = mysqli_prepare($confirm_connect, "SELECT * FROM newtable WHERE email = ?");

    //Podpiêcie parametru do zapytania
    mysqli_stmt_bind_param($stmt, "s", $email);

    //Wykonanie zapytania
    mysqli_stmt_execute($stmt);

    //Pobranie wyniku zapytania
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0) {
        header('Location: errorRegister.php');
    } else {

        //Przygotowanie zapytania SQL do wstawienia danych do tabeli
        $query = "INSERT INTO newtable (login, email, password) VALUES ('$login', '$email', '$password')";

        //Wykonanie zapytania SQL
        if(mysqli_query($confirm_connect, $query)) {
            header('Location: login.php');
        } else {
            echo "Wyst¹pi³ b³¹d podczas rejestracji.";
        }
        mysqli_close($confirm_connect);
    }
    //Zamkniêcie zapytania
    mysqli_stmt_close($stmt);

?>
