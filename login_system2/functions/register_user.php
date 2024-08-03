<?php

require_once('config.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

        // Provera da li su sifre iste
        if($password != $confirm_password)
        {
        $_SESSION['error_register'] = "Passwords don't match!";
    
        header('location: ../login.php#register');
        exit;
        }
    
    
        // Provera da li sifra ima bar 8 karaktera
        if(strlen($password) <= 7)
        {
        $_SESSION["error_register"] = "Password must be at least 8 characters long!";
    
        header('location: ../login.php#register');
        exit;
        }
    
        // Provera da li username ima bar 3 karaktera
        if(strlen($username) <= 2)
        {
        $_SESSION["error_register"] = "Username must be at least 3 characters long!";
        
        header('location: ../login.php#register');
        exit;
        }
    
    
        // Provera da li sifra ima bar 1 broj
        if(preg_match('/\d/', $password) == false)
        {
            $_SESSION["error_register"] = "Password must contain at least 1 number!";
    
            header('location: ../login.php#register');
            exit;
        }
    
        // Provera da li sifra sadrzi prazno mesto
        if(str_contains($password, ' ') == true)
        {
            $_SESSION["error_register"] = "Password can't contain an empty space!";
    
            header('location: ../login.php#register');
            exit;
        }
    
        $sql = "SELECT username FROM users WHERE username = ?";
        $run = $connect -> prepare($sql);
        $run -> bind_param("s", $username);
        $run -> execute();
        $results = $run -> get_result();
    
        // Provera da li username vec postoji u bazi
        if($results -> num_rows > 0)
        {
            $_SESSION["error_register"] = "Username like that already exists.";
    
            header('location: ../login.php#register');
            exit;
        }

        $sql = "SELECT email FROM users WHERE email = ?";
        $run = $connect -> prepare($sql);
        $run -> bind_param("s", $email);
        $run -> execute();
        $results = $run -> get_result();

        // Provera da li email vec postoji u bazi
        if($results -> num_rows > 0)
        {
            $_SESSION["error_register"] = "Email like that already exists.";
    
            header('location: ../login.php#register');
            exit;
        }

        $sql = "INSERT INTO users(username, password, email) VALUES(?, ?, ?)";
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $run = $connect -> prepare($sql);

        $run -> bind_param("sss", $username, $hashed_password, $email);

        if($run -> execute() == TRUE)
        {
            $_SESSION["success_register"] = "Your account has been succesfully registred";
        }
}

$run -> close();
$connect -> close();

header('location: ../login.php#register');
exit;

?>