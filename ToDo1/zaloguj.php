<?php
    session_start();
    require_once "connect.php";

    $confirm_connect = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($confirm_connect->connect_errno != 0)
    {
        
    }
    else
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        if ($resoult = @$confirm_connect->query(
            sprintf("SELECT * FROM newtable WHERE login='$login' AND password = '$password'",
            mysqli_real_escape_string($confirm_connect, $login),
            mysqli_real_escape_string($confirm_connect, $password))))
        {
            $useres = $resoult->num_rows;
            if ($useres>0)
            {
                $row = $resoult->fetch_assoc();
                $_SESSION['user'] = $row['login'];
                $resoult->free_result();
                header('Location: index.php');
            }
            else{
                
                header('Location: errorLogin.php');
            }
        }

        $confirm_connect->close();

    }

?>