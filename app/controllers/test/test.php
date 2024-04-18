<?php
session_start();

// Kiểm tra xem session có tồn tại không
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Hiển thị thông tin về giỏ hàng
    echo "Các sản phẩm trong giỏ hàng:<br>";
    foreach ($_SESSION['cart'] as $item) {
        echo "Product ID: " . $item['product_id'] . ", Quantity: " . $item['quantity'] . "<br>";
    }
} else {
    echo "Giỏ hàng đang trống.";
}
