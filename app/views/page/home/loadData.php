<?php
require_once '/opt/lampp/htdocs/bookstore/app/models/product.php';
require_once '/opt/lampp/htdocs/bookstore/app/models/category.php';
require_once '/opt/lampp/htdocs/bookstore/app/models/review.php';
$modelProduct = new Product();
$dataProduct = $modelProduct->getProductQuantity();
var_dump($dataProduct);
