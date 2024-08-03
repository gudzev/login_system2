<?php

session_start();
session_unset();
session_destroy();

unset($_COOKIE['remember_me']);
setcookie('remember_me', '', time() - 3600, '/'); 

header('location: ../login.php');
return;


?>