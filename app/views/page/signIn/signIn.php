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
        <form id="signInForm" class="sign-in-form">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
                <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" required />
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
            <button type="submit" class="btn">Sign In</button>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../../../asset/js/message.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(() => {
        $('#signInForm').submit(function(event) {
            event.preventDefault();

            // Lấy dữ liệu từ form và chuyển đổi thành chuỗi dạng query string
            let formData = $(this).serialize();
            let rememberPassword = $('#remember').prop('checked'); // Kiểm tra trạng thái của checkbox
            $.ajax({
                type: 'POST',
                url: '/bookstore/app/controllers/user/signInController.php',
                data: formData,
                success: (response) => {
                    console.log(response);
                    console.log(response.data?.username); // Lấy username từ response
                    console.log(response.data?.password); // Lấy password từ response
                    if (response.status === 200) {
                        if (rememberPassword) { // Nếu đã chọn Remember Password
                            // Lưu username và password vào cookie
                            document.cookie = `username=${response.data.username}; expires=${new Date(Date.now() + 86400 * 30).toUTCString()}; path=/`;
                            document.cookie = `password=${response.data.password}; expires=${new Date(Date.now() + 86400 * 30).toUTCString()}; path=/`;
                        }
                        window.location.href = '/bookstore/app/views/page/home/homepage.php';
                    } else {
                        showErrorAlert(response.message);
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