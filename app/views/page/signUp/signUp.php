<?php
require_once '/opt/lampp/htdocs/bookstore/app/views/layout/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../../../asset/css/dangki.css">
</head>

<body>
    <div class="container">
        <form action="#" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
                <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
                <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" />
            </div>
            <div class="input-field">
                <input type="password" placeholder="Confirm Password" />
            </div>
            <input type="submit" value="Sign Up" class="btn" />
        </form>
    </div>
</body>

</html>