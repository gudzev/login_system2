<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>

    <link rel="stylesheet" href="css/login_register.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />

</head>
<body>

<?php

session_start();

if(isset($_COOKIE['remember_me']) == true)
{
    header('location: index.php');
    exit;
}

?>

    <div class="container">


        <section class="login"  id="login">
                <form action="functions/login_user.php" method="POST" class="animate__animated animate__fadeIn">

                        <h1 class="text-center m-2">Sign in to your account</h1>

                        <div class="login-font login-center">

                            <div class="m-2">
                                <input type="email" required placeholder="E-Mail" class="input" name="email">
                            </div>


                            <div class="m-2">
                                <input type="password" required placeholder="Password" class="input" name="password" id="password">
                                <span class="password-toggle-icon"><i class="fa fa-eye-slash" aria-hidden="true" id="see_password" onclick="showPassword()" style="width: 40px;"></i></span>
                            </div>

                            <div class="m-1">
                                <label for="">Remember me</label>
                                <input type="checkbox" name="remember_me" class="checkbox">
                            </div>

                            <button type="submit">Sign in</button>

                            <div class="login-account">
                                <p>Don't have account? <a href="#register" class="login-text">Create one.</a></p>
                            </div>

                            <?php
                            if(isset($_SESSION["success_login"]))
                            {
                                echo "<p class='success'>" . $_SESSION['success_login'] .  "</p>";
                                unset($_SESSION["success_login"]);
                            }
                            ?>

                            <?php
                            if(isset($_SESSION["error"]))
                            {
                                echo "<p class='error'>" . $_SESSION['error'] .  "</p>";
                                unset($_SESSION["error"]);
                            }
                            ?>

                        </div>

                </form>
        </section>

    <section class="register" id="register">
            <form action="functions/register_user.php" method="POST" class="animate__animated animate__fadeIn">

            <h1 class="text-center m-2">Register an account</h1>

                <div class="login-font login-center">

                    <div class="m-2">
                        <input type="text" required placeholder="Username" class="input" name="username">
                    </div>

                    <div class="m-2">
                        <input type="email" required placeholder="E-Mail" class="input" name="email">
                    </div>

                    <div class="m-2">
                        <input type="password" required placeholder="Password" class="input" name="password">
                    </div>

                    <div class="m-2">
                        <input type="password" required placeholder="Confirm password" class="input" name="confirm_password">
                    </div>

                    <button type="submit">Sign up</button>

                    <div class="login-account">
                        <p>Already have account? <a href="#login" class="login-text">Login here.</a></p>
                    </div>

                    <?php
                    if(isset($_SESSION["success_register"]))
                    {
                        echo "<p class='success'>" . $_SESSION['success_register'] .  "</p>";
                        unset($_SESSION["success_register"]);
                    }
                    ?>

                    <?php
                    if(isset($_SESSION["error_register"]))
                    {
                        echo "<p class='error'>" . $_SESSION['error_register'] .  "</p>";
                        unset($_SESSION["error_register"]);
                    }
                    ?>

                </div>

            </form>
    </section>
    </div>

    <script src="js/index.js"></script>

</body>
</html>
