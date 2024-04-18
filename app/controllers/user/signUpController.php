<?php
// UserController.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '/opt/lampp/htdocs/bookstore/app/models/user.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu từ yêu cầu POST
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Kiểm tra mật khẩu và xác nhận mật khẩu
    if ($password !== $confirmPassword) {
        echo json_encode(array("status" => 400, "message" => "Mật khẩu và xác nhận mật khẩu không khớp."));
        exit;
    }

    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
    $user = new User();
    $existingUser = $user->getUserByEmail($email)->data;
    $existingUserName = $user->getUserByUsername($username)->data;

    // Nếu email đã tồn tại, trả về thông báo lỗi
    if ($existingUser) {
        echo json_encode(array("status" => 400, "message" => "Email đã được sử dụng. Vui lòng chọn một email khác."));
        exit;
    } elseif ($existingUserName) {
        echo json_encode(array("status" => 400, "message" => "Tên người dùng đã được sử dụng. Vui lòng chọn một tên khác."));
        exit;
    }


    // Email chưa tồn tại trong cơ sở dữ liệu, tiến hành tạo người dùng mới
    $result = $user->createProduct($username, $password, $email);

    // Kiểm tra kết quả từ phương thức createUser
    if ($result) {
        // Trả về phản hồi thành công
        echo json_encode(array("status" => 200, "message" => "Đăng ký thành công."));
    } else {
        // Trả về phản hồi lỗi
        echo json_encode(array("status" => 500, "message" => "Đã xảy ra lỗi khi đăng ký."));
    }
} else {
    header("Location: /bookstore/app/views/page/signUp/signUp.php");
    exit;
}
