<?php
require_once '/opt/lampp/htdocs/bookstore/app/views/layout/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../../../../asset/css/signIn.css">
</head>

<body>
    <div class="container">
        <form action="#" class="sign-in-form">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
                <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" />
            </div>
            <div class="feature_sign_in">
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="remember-password">
                    <input type="checkbox" id="remember" />
                    <label for="remember">Remember Password</label>
                </div>
            </div>
            <input type="submit" value="Sign In" class="btn" />
            <p class="create-account">Don't have an account? <a href="/bookstore/app/views/page/signUp/signUp.php">Create Account</a></p>
        </form>
    </div>
</body>

</html>