<?php

require_once('functions/config.php');

if(isset($_SESSION['user_id']) == false && isset($_COOKIE['remember_me']) == false)
{
    header('location: login.php');
    exit;
}
else
{
    echo "Welcome.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="functions/log_out.php" method="POST">
    <button class="log-out-btn">
        Log Out
    </button>
    </form>
    
</body>
</html>