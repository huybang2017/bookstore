<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4MU</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap");

        :root {
            --green: #27ae60;
            --dark-color: #219150;
            --black: #444;
            --light-color: #666;
            --border: 0.1rem solid rgba(0, 0, 0, 0.1);
            --border-hover: 0.1rem solid var(--black);
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        * {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: capitalize;
            transition: all 0.2s linear;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
            scroll-padding-top: 5rem;
            scroll-behavior: smooth;
        }

        html::-webkit-scrollbar {
            width: 1rem;
        }

        html::-webkit-scrollbar-track {
            background: transparent;
        }

        html::-webkit-scrollbar-thumb {
            background: var(--black);
        }

        section {
            padding: 5rem 9%;
        }

        .heading {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .heading::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            width: 100%;
            height: 0.01rem;
            background: rgba(0, 0, 0, 0.1);
            z-index: -1;
        }

        .heading span {
            font-size: 3rem;
            padding: 0.5rem 2rem;
            color: var(--black);
            background: #fff;
            border: var(--border);
        }

        .btn {
            margin-top: 1rem;
            display: inline-block;
            padding: 0.9rem 3rem;
            border-radius: 0.5rem;
            color: #fff;
            background: var(--green);
            font-size: 1.7rem;
            cursor: pointer;
            font-weight: 500;
        }

        .btn:hover {
            background: var(--dark-color);
        }

        .footer .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
            gap: 1.5rem;
        }

        .footer .box-container .box h3 {
            font-size: 2.2rem;
            color: var(--black);
            padding: 1rem 0;
        }

        .footer .box-container .box a {
            display: block;
            font-size: 1.4rem;
            color: var(--light-color);
            padding: 1rem 0;
        }

        .footer .box-container .box a i {
            color: var(--green);
            padding-right: 0.5rem;
        }

        .footer .box-container .box a:hover i {
            padding-right: 2rem;
        }

        .footer .box-container .box .map {
            width: 100%;
        }

        .footer .share {
            padding: 1rem 0;
            text-align: center;
        }

        .footer .share a {
            height: 5rem;
            width: 5rem;
            line-height: 5rem;
            font-size: 2rem;
            color: #fff;
            background: var(--green);
            margin: 0 0.3rem;
            border-radius: 50%;
        }

        .footer .share a:hover {
            background: var(--black);
        }

        .footer .credit {
            border-top: var(--border);
            margin-top: 2rem;
            padding: 0 1rem;
            padding-top: 2.5rem;
            font-size: 2rem;
            color: var(--light-color);
            text-align: center;
        }

        .footer .credit span {
            color: var(--green);
        }
    </style>
</head>

<body>
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
</body>

</html>