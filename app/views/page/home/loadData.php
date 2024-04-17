<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '/opt/lampp/htdocs/bookstore/app/models/product.php';
require_once '/opt/lampp/htdocs/bookstore/app/models/category.php';
require_once '/opt/lampp/htdocs/bookstore/app/models/review.php';
$modelProduct = new Product();
$dataProducts = $modelProduct->getProductQuantity();
