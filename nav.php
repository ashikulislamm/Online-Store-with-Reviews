<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Online Store with Reviews</title>

        <!----------------Custom CSS-------------------------->
        <link rel="stylesheet" href="asset/css/style.css" />

        <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />

        <!-------------------BootStrap CSS------------------->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <!--Font Awsome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
</head>

<body>

    <header class="header" id="header">
        <!------------------Navigation Bar----------------->
        <nav class="nav container">
            <a href="/index.php" class="nav__logo">Online Store</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#" class="nav__link">On Sale</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Products</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Categories</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Blog</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Coming Soon</a>
                    </li>
                </ul>

                <!-- Close button -->
                <div class="nav__close" id="nav-close">
                    <i class="fa-regular fa-x"></i>
                </div>
            </div>

            <div class="nav__actions">
                <!-- Search button -->
                <i class="fa-solid fa-magnifying-glass nav__search" id="search-btn"></i>

                <!-- Login button -->
                <a href="./login.php"><i class="fa-regular fa-user nav__login" id="login-btn"></i></a>

                <!-- Toggle button -->
                <div class="nav__toggle" id="nav-toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </nav>

        <!--==================== SEARCH ====================-->
        <div class="search" id="search">
            <form action="" class="search__form">
                <i class="fa-solid fa-magnifying-glass search__icon"></i>
                <input type="search" placeholder="What are you looking for?" class="search__input" />
            </form>

            <i class="fa-solid fa-x search__close" id="search-close"></i>
        </div>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="asset/js/main.js"></script>
</body>

</html>