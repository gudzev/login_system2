<?php

require_once('config.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']) ? true : false;

    $sql = "SELECT user_id, password FROM users WHERE email = ?";

    $run = $connect -> prepare($sql);
    $run -> bind_param("s", $email);

    if($run -> execute())
    {
        $results = $run -> get_result();
    
        if($results -> num_rows == 1)
        {
            $row = $results -> fetch_assoc();
    
            if(password_verify($password, $row['password']) == true)
            {
                if($remember_me == true)
                {
                    setcookie("remember_me", "true", time() + (86400 * 30), '/');
                }

                $_SESSION['user_id'] = $row['user_id'];

                header('location: ../index.php');
                exit;
            }
            else
            {
                $_SESSION['error'] = "Wrong password!";
                header('location: ../login.php#login');
                exit;
            }
        }
        else
        {
            $_SESSION['error'] = "Email like that doesn't exist.";
            header('location: ../login.php#login');
            exit;
        }
    }
    else
    {
        $_SESSION['error'] = "Execution failed!";
        header('location: ../login.php#login');
        exit;
    }
}

$connect -> close();
$run -> close();

header('location: ../login.php#login');
exit;

?>