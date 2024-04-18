<?php
session_start();

// Function to add product to cart
function addToCart($product_id)
{
    // Khởi tạo giỏ hàng nếu chưa tồn tại
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $index = array_search($product_id, array_column($_SESSION['cart'], 'product_id'));
    if ($index !== false) {
        // Nếu sản phẩm đã tồn tại, tăng số lượng lên 1
        $_SESSION['cart'][$index]['quantity']++;
        return array("status" => 200, "message" => "Sản phẩm đã được thêm vào giỏ hàng.");
    } else {
        // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng với số lượng là 1
        $_SESSION['cart'][] = array("product_id" => $product_id, "quantity" => 1);
        return array("status" => 200, "message" => "Sản phẩm đã được thêm vào giỏ hàng.");
    }
}

// Function to remove product from cart
function removeFromCart($product_id)
{
    if (!empty($_SESSION['cart'])) {
        // Tìm index của sản phẩm trong giỏ hàng
        $index = array_search($product_id, array_column($_SESSION['cart'], 'product_id'));
        if ($index !== false) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($_SESSION['cart'][$index]);
            // Đặt lại chỉ mục của mảng
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            return array("status" => 200, "message" => "Sản phẩm đã được xóa khỏi giỏ hàng.");
        }
    }
    return array("status" => 400, "message" => "Sản phẩm không tồn tại trong giỏ hàng.");
}

// Function to minus product quantity in cart
function minusQuantity($product_id)
{
    if (!empty($_SESSION['cart'])) {
        // Tìm index của sản phẩm trong giỏ hàng
        $index = array_search($product_id, array_column($_SESSION['cart'], 'product_id'));
        if ($index !== false) {
            // Giảm số lượng sản phẩm đi 1
            $_SESSION['cart'][$index]['quantity']--;
            // Kiểm tra nếu số lượng sản phẩm là 0, xóa sản phẩm khỏi giỏ hàng
            if ($_SESSION['cart'][$index]['quantity'] <= 0) {
                return removeFromCart($product_id);
            }
            return array("status" => 200, "message" => "Số lượng sản phẩm đã được giảm.");
        }
    }
    return array("status" => 400, "message" => "Sản phẩm không tồn tại trong giỏ hàng.");
}

// Function to bonus product quantity in cart
function bonusQuantity($product_id)
{
    if (!empty($_SESSION['cart'])) {
        // Tìm index của sản phẩm trong giỏ hàng
        $index = array_search($product_id, array_column($_SESSION['cart'], 'product_id'));
        if ($index !== false) {
            // Tăng số lượng sản phẩm lên 1
            $_SESSION['cart'][$index]['quantity']++;
            return array("status" => 200, "message" => "Số lượng sản phẩm đã được tăng.");
        }
    }
    return array("status" => 400, "message" => "Sản phẩm không tồn tại trong giỏ hàng.");
}

// Check if action is provided in the AJAX request
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Handle different actions
    switch ($action) {
        case 'add_to_cart':
            if (isset($_POST['product_id'])) {
                $product_id = $_POST['product_id'];
                $response = addToCart($product_id);
                http_response_code($response['status']);
                echo json_encode($response);
            } else {
                http_response_code(400);
                echo json_encode(array("status" => 400, "message" => "Lỗi: Không có product_id."));
            }
            break;
        case 'remove_from_cart':
            if (isset($_POST['product_id'])) {
                $product_id = $_POST['product_id'];
                $response = removeFromCart($product_id);
                http_response_code($response['status']);
                echo json_encode($response);
            } else {
                http_response_code(400);
                echo json_encode(array("status" => 400, "message" => "Lỗi: Không có product_id."));
            }
            break;
        case 'minus_quantity':
            if (isset($_POST['product_id'])) {
                $product_id = $_POST['product_id'];
                $response = minusQuantity($product_id);
                http_response_code($response['status']);
                echo json_encode($response);
            } else {
                http_response_code(400);
                echo json_encode(array("status" => 400, "message" => "Lỗi: Không có product_id."));
            }
            break;
        case 'bonus_quantity':
            if (isset($_POST['product_id'])) {
                $product_id = $_POST['product_id'];
                $response = bonusQuantity($product_id);
                http_response_code($response['status']);
                echo json_encode($response);
            } else {
                http_response_code(400);
                echo json_encode(array("status" => 400, "message" => "Lỗi: Không có product_id."));
            }
            break;
        default:
            http_response_code(400);
            echo json_encode(array("status" => 400, "message" => "Lỗi: Hành động không hợp lệ."));
            break;
    }
} else {
    http_response_code(400);
    echo json_encode(array("status" => 400, "message" => "Lỗi: Hành động không được cung cấp."));
}
