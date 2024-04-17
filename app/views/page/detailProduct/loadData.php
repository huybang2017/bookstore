<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '/opt/lampp/htdocs/bookstore/app/models/product.php';
require_once '/opt/lampp/htdocs/bookstore/app/models/image.php';
if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];
    // Nếu có, tiếp tục xử lý
    $modelProduct = new Product();
    $dataProduct = $modelProduct->getProductById($productID)->data;
    $modelImage = new Image();
    $dataImage = $modelImage->getImageByProductID($productID)->data;
} else {
    header('Location: /bookstore/app/views/page/home/home.php');
}
