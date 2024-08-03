<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "login_system2";

$connect = mysqli_connect($hostname, $username, $password, $database);

if($connect == false)
{
    die("Connection to the database failed.");
}

?>