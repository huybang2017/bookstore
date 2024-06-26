<?php
require_once '/opt/lampp/htdocs/bookstore/app/views/page/home/loadData.php';
?>
<<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4MU</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../../../asset/css/homepage.css">
  </head>

  <body>

    <!-- header section starts  -->

    <header class="header">

      <div class="header-1">

        <a href="" class="logo"> <i class="fas fa-book"></i> Books4MU </a>

        <form action="" class="search-form">
          <input type="search" name="" placeholder="search here..." id="search-box">
          <label for="search-box" class="fas fa-search"></label>
        </form>
        <div class="icons">
          <div id="search-btn" class="fas fa-search"></div>
          <a type="button" class="fas fa-shopping-cart" data-bs-toggle="modal" data-bs-target="#cart"></a>
          <?php
          session_start();
          if (empty($_SESSION['username'])) {
            echo '<a href="/bookstore/app/views/page/signIn/signIn.php" id="login-btn" class="fas fa-user"></a>';
          } else {
            echo '<div class="btn-group loginSuccess">
            <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              <img src="../../../../asset/img/imgAccount.jpeg" alt="img account">
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear"></i>Setting</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa-regular fa-folder-open"></i>Admin</a></li>
              <li><a class="dropdown-item" href="/bookstore/app/controllers/user/logOutController.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log Out</a></li>
            </ul>
          </div>';
          }
          ?>

        </div>
    </header>

    <!-- cart -->

    <div class="modal fade" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-3" id="exampleModalLabel">CART</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="cd-cart__product">
              <div class="cd-cart__image">
                <img src="path_to_product_image" alt="Product Image">
              </div>
              <div class="cd-cart__details">
                <h3><a href="product_details_page_url">Product Name</a></h3>
                <p class="cd-cart__price">$10.99</p>
              </div>
              <div class="cd-cart__actions">
                <button class="cd-cart__delete-item" onclick="removeFromCart(product_id)">Remove</button>
                <div class="cd-cart__quantity">
                  <label for="quantity">Quantity:</label>
                  <select id="quantity" onchange="updateQuantity(product_id, this.value)">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
            <button type="button" class="btn btn-primary">CHECKOUT</button>
          </div>
        </div>
      </div>
    </div>

    <!-- home section starts  -->

    <section class="home" id="home">

      <div class="row">

        <div class="content">
          <h3>upto 75% off</h3>
          <p>If you’re an Engineering student and need a books, Books4MU has great deals on a wide range of books. Shop for these books from top authors and avail hugely discounted prices</p>
          <a href="#" class="btn">shop now</a>
        </div>

        <div class="swiper books-slider">
          <div class="swiper-wrapper">
            <a href="#" class="swiper-slide"><img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-1.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-2.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-3.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-4.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-5.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-6.png" alt=""></a>
          </div>
          <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/stand.png" class="stand" alt="">
        </div>

      </div>

    </section>

    <!-- home section ense  -->

    <!-- icons section starts  -->

    <section class="icons-container">

      <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
          <h3>free shipping</h3>
          <p>order over $100</p>
        </div>
      </div>

      <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
          <h3>secure payment</h3>
          <p>100 secure payment</p>
        </div>
      </div>

      <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
          <h3>easy returns</h3>
          <p>10 days returns</p>
        </div>
      </div>

      <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
          <h3>24/7 support</h3>
          <p>call us anytime</p>
        </div>
      </div>

    </section>

    <!-- icons section ends -->

    <!-- featured section starts  -->

    <section class="featured" id="featured">
      <h1 class="heading"> <span>featured books</span> </h1>
      <div class="swiper featured-slider">
        <div class="swiper-wrapper">
          <?php foreach ($dataProducts->data as $product) : ?>
            <div class="swiper-slide box">
              <div class="image">
                <a href="/bookstore/app/views/page/detailProduct/detailProduct.php?productID=<?php echo $product['ProductID']; ?>"><img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-1.png" alt=""></a>
                <a href="" class="addFavorite">
                  <i class="fa-solid fa-heart"></i>
                </a>
              </div>
              <div class="content">
                <h3><?php echo $product['ProductName']; ?></h3>
                <div class="price">$<?php echo $product['Price']; ?> <span>$20.99</span></div>
                <button type="button" class="btn add-to-cart" data-product-id=<?php echo $product['ProductID']; ?>>add to cart</button>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>


    <!-- pagination product -->
    <div class="pagination_page">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
    </div>
    <!-- featured section ends -->

    <!-- newsletter section starts -->

    <section class="newsletter">

      <form action="">
        <h3>subscribe for latest updates</h3>
        <input type="email" name="" placeholder="enter your email" id="" class="box">
        <input type="submit" value="subscribe" class="btn">
      </form>

    </section>

    <!-- newsletter section ends -->

    <!-- category section starts  -->

    <section class="arrivals" id="arrivals">

      <h1 class="heading"> <span>Category</span> </h1>

      <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-1.png" alt="">
            </div>
            <div class="content">
              <h3>Semester 1</h3>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-4.png" alt="">
            </div>
            <div class="content">
              <h3>Semester 2</h3>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-6.png" alt="">
            </div>
            <div class="content">
              <h3>Semester 3</h3>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-7.png" alt="">
            </div>
            <div class="content">
              <h3>Semester 4</h3>
            </div>
          </a>

        </div>

      </div>

      <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-8.png" alt="">
            </div>
            <div class="content">
              <h3>Semester 5</h3>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-9.png" alt="">
            </div>
            <div class="content">
              <h3>Semester 6</h3>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book-10.png" alt="">
            </div>
            <div class="content">
              <h3>Semester 7</h3>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/book3.png" alt="">
            </div>
            <div class="content">
              <h3>Semester 8</h3>
            </div>
          </a>

        </div>

      </div>

    </section>

    <!-- category section ends -->

    <!-- deal section starts  -->

    <section class="deal">

      <div class="content">
        <h3>deal of the day</h3>
        <h1>upto 50% off</h1>
        <p>Checkout before this deal expires at midnight.</p>
        <a href="#" class="btn">shop now</a>
      </div>

      <div class="image">
        <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/deal-img.jpg" alt="">
      </div>

    </section>

    <!-- deal section ends -->

    <!-- reviews section starts  -->

    <section class="reviews" id="reviews">

      <h1 class="heading"> <span>client's reviews</span> </h1>

      <div class="swiper reviews-slider">

        <div class="swiper-wrapper">

          <div class="swiper-slide box">
            <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/pic-1.png" alt="">
            <h3>ujjwal </h3>
            <p>First of all it customer service is excellent. We get all author book for Mumbai University. People should try here affordable and best price.</p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/pic-2.png" alt="">
            <h3>marry </h3>
            <p>Best book store almost all books are available for prepartion of exam related or other books are available on reaonable price also.</p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/pic-3.png" alt="">
            <h3>Raghu </h3>
            <p>Customer Service is good. Greetings to customer and making the required Books available to Customers is very good.</p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <div class="swiper-slide box">
            <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/pic-4.png" alt="">
            <h3>Pooja </h3>
            <p>This book centre have large amount of a books. The engineering study material all semester books are available.then the peacefull and nice book centre.</p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/pic-5.png" alt="">
            <h3>Abhinav </h3>
            <p>I migrated to the online platform on Just books because I was finding it difficult to go to their libraries before closing time.</p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/pic-6.png" alt="">
            <h3>Sidddhi </h3>
            <p>I love the product because it is very easy to find. The book are in really organized manner you can easily find the book you want.</p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- reviews section ends -->

    <!-- feedback section starts  -->

    <section class="blogs" id="blogs">

      <h1 class="heading"> <span>feedback</span> </h1>

      <section class="newsletter">

        <form action="">
          <h3>give your feedback here...</h3>
          <a href="./feedback.html" class="btn">Feedback</a>
          <!-- <a href="./feedback.html"><input type="submit" value="feedback"> -->
          </a>
        </form>

      </section>
    </section>

    <!-- feedback section ends -->

    <!-- footer section starts  -->

    <section class="footer">

      <div class="box-container">

        <div class="box">
          <h3>our locations</h3>
          <a href="#"> <i class="fas fa-map-marker-alt"></i> india </a>
          <a href="#"> <i class="fas fa-map-marker-alt"></i> USA </a>
        </div>

        <div class="box">
          <h3>quick links</h3>
          <a href="./index.html"> <i class="fas fa-arrow-right"></i> home </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> Category </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> reviews </a>
          <a href="./feedback.html"> <i class="fas fa-arrow-right"></i> feedback </a>
        </div>

        <div class="box">
          <h3>extra links</h3>
          <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> privacy policy </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
        </div>

        <div class="box">
          <h3>contact info</h3>
          <a href="#"> <i class="fas fa-phone"></i> 9167064054 </a>
          <a href="#"> <i class="fas fa-phone"></i> 77388 44717 </a>
          <a href="#"> <i class="fas fa-envelope"></i> kordepriyanka1118@gmail.com </a>
          <a href="#"> <i class="fas fa-envelope"></i> rohitmishra.rm2106@gmail.com </a>
          <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/worldmap.png" class="map" alt="">
        </div>

      </div>

      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="https://twitter.com/priyankakorde" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com/im_priyankak_/" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com/in/priyanka-korde-2029521a1/" class="fab fa-linkedin"></a>
        <a href="https://www.linkedin.com/in/rohit-m-3494521a2/" class="fab fa-linkedin"></a>
      </div>

      <div class="credit"> created by <span>Priyanka Korde & Rohit Mishra </span>copyright ©2022 all rights reserved! </div>

    </section>

    <!-- footer section ends -->

    <!-- library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- custom js file link  -->
    <script src="../../../../asset/js/homepage.js"></script>
    <script src="../../../../asset/js/message.js"></script>
    <script>
      $(document).ready(() => {
        $(".add-to-cart").click(function() {
          let product_id = $(this).data("product-id");
          let action = "add_to_cart"; // Define the action here

          sendActionToServer(action, product_id);
        });

        // Add event listeners for other actions like "minus", "bonus", "remove" here

        function sendActionToServer(action, product_id) {
          $.ajax({
            type: "POST",
            url: "/bookstore/app/controllers/cart/cart_actions.php", // Assuming this is the correct URL for handling cart actions
            data: {
              action: action,
              product_id: product_id
            },
            success: (response) => {
              const responseJSON = JSON.parse(response);
              console.log(responseJSON);
              if (responseJSON.status === 200) {
                showSuccessAlert();
              } else {
                showErrorAlert(responseJSON.message);
              }
            },
            error: () => {
              showErrorAlert('Đã xảy ra lỗi khi thực hiện hành động.');
            }
          });
        }
      });
    </script>

  </body>

  </html>