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

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .header-1 {
            background: #fff;
            padding: 1.5rem 9%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: bolder;
            color: var(--black);
        }

        .logo i {
            color: var(--green);
        }

        .search-form {
            width: 50rem;
            height: 5rem;
            border: var(--border);
            overflow: hidden;
            background: #fff;
            display: flex;
            align-items: center;
            border-radius: 0.5rem;
        }

        .search-form input {
            font-size: 1.6rem;
            padding: 0 1.2rem;
            height: 100%;
            width: 100%;
            text-transform: none;
            color: var(--black);
        }

        .search-form label {
            font-size: 2.5rem;
            padding-right: 1.5rem;
            color: var(--black);
            cursor: pointer;
        }

        .search-form label:hover {
            color: var(--green);
        }

        .icons div,
        .icons a {
            font-size: 2.5rem;
            margin-left: 1.5rem;
            color: var(--black);
            cursor: pointer;
        }

        .icons div:hover,
        .icons a:hover {
            color: var(--green);
        }

        #search-btn {
            display: none;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-1">
            <a href="#" class="logo"> <i class="fas fa-book"></i> Books4MU </a>
        </div>
    </div>
</body>

</html>