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
        <form id="signupForm" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
                <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="input-field">
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" required />
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" required />
            </div>
            <div class="input-field">
                <input type="password" name="confirmPassword" placeholder="Confirm Password" required />
            </div>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../../../asset/js/message.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(() => {
        $('#signupForm').submit(function(event) {
            event.preventDefault();

            let formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: '/bookstore/app/controllers/user/signInController.php',
                data: formData,
                success: (response) => {
                    let responseObject = JSON.parse(response);

                    if (responseObject.status === 200) {
                        window.location.href = '/bookstore/app/views/page/signIn/signIn.php';
                    } else if (responseObject.status === 400) {
                        showErrorAlert(responseObject.message);
                    } else {
                        showErrorAlert('Đã xảy ra lỗi khi xử lý yêu cầu.');
                    }
                },
                error: () => {
                    showErrorAlert('Đã xảy ra lỗi khi gửi yêu cầu.');
                }
            });

        });
    });
</script>

</html>