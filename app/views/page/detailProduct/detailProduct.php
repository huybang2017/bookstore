<?php
require_once '/opt/lampp/htdocs/bookstore/app/views/page/detailProduct/loadData.php';
require_once '/opt/lampp/htdocs/bookstore/app/views/layout/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutorial</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link href="../../../../asset/css/detailProduct.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />

</head>

<body>
    <main class="container">

        <div class="left-column">
            <img data-image="red" class="active" src="../../../../asset/img/<?php echo $dataImage['ImageURL'] ?>" alt="">
        </div>
        <div class="right-column">
            <div class="product-description">
                <span>Category: <?php echo $dataProduct['CategoryName'] ?></span>
                <h1>
                    <?php echo $dataProduct['ProductName']; ?>
                </h1>
                <p><?php echo $dataProduct['Description'] ?></p>
            </div>

            <div class="product-configuration">
                <div class="cable-config">
                    <span>Quantity</span>
                    <div class="cable-choose">
                        <button><?php echo $dataProduct['StockQuantity'] ?></button>
                    </div>
                    <span>Authur: </span>
                    <button><?php echo $dataProduct['AuthorName'] ?></button>
                </div>
            </div>
            <div class="product-price">
                <span><?php echo $dataProduct['Price'] ?>$</span>
                <a href="#" class="cart-btn">Add to cart</a>
            </div>
        </div>
    </main>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="../../../../asset/js/script.js" charset="utf-8"></script>
</body>

</html>

<?php
require_once '/opt/lampp/htdocs/bookstore/app/views/layout/footer.php';
