<?php
require_once "/opt/lampp/htdocs/bookstore/app/models/user.php";
session_start();
function handleLogin($username, $password)
{
    $modelUser = new User();
    $userData = $modelUser->getUserByUsername($username);

    if ($userData->status === 200 && $userData->data) {
        $userID = $userData->data['UserID'];
        $passwordData = $modelUser->getPasswordById($userID);

        if ($passwordData->status === 200) {
            $validPassword = $passwordData->data;

            if ($password === $validPassword) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['userID'] = $userID;
                return array("status" => 200, "message" => "Đăng nhập thành công.", "data" => array("username" => $username, "password" => $password));
            } else {
                return array("status" => 400, "message" => "Tên người dùng hoặc mật khẩu không chính xác.");
            }
        } else {
            return array("status" => 400, "message" => "Không thể lấy được mật khẩu của người dùng.");
        }
    } else {
        return array("status" => 400, "message" => "Tên người dùng không tồn tại.");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $response = handleLogin($username, $password);

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array("status" => 405, "message" => "Phương thức không được hỗ trợ.");
    header('Content-Type: application/json');
    echo json_encode($response);
}
