<?php session_start(); ?>
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
        <!--Font Awsome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
</head>

<body>

    <header class="header" id="header">
        <!------------------Navigation Bar----------------->
        <nav class="nav container">
            <a href="/index.php" class="nav__logo">Online Store</a>

            <div class="nav__menu" id="nav-menu" style="margin-top: 15px;">
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
                <?php
                include 'config.php';
                if (isset($_SESSION['id'])) {
                    $sql = "SELECT user_name FROM user WHERE user_id='$_SESSION[id]'";
                    $query = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($query);
                    echo '<a class="acc" id="login-btn" style="display: flex; justify-content:space-between;margin-top:15px; cursor:pointer;">
                        <i class="fa-regular fa-user nav__login"></i>
                        <p class="myacc">Hello , ' . $row["user_name"] . '</p>
                    </a>
                    <div class="sub-menu-wrap" id="sub-menu-wrap">
                        <div class="sub-menu">
                            <div class="user">
                                <a href="profile.php">
                                    <i class="fa-solid fa-user"></i>
                                    <h4>My Account</h4>
                                </a>
                                <a href="/logout.php" style="margin-top: 10px;">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <h4>Logout</h4>
                                </a>
                            </div>
                        </div>
                    </div>';
                } else {
                    echo '<a class="acc" id="login-btn" style="display: flex; justify-content:space-between;margin-top:15px; cursor:pointer;">
                        <i class="fa-regular fa-user nav__login"></i>
                        <p class="myacc">My Account</p>
                        
                    </a>
                    <div class="sub-menu-wrap" id="sub-menu-wrap">
                        <div class="sub-menu">
                            <div class="user">
                                <a href="login.php">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <h4>Login</h4>
                                </a>
                                <a href="/signup.php" style="margin-top: 10px;">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <h4>Signup</h4>
                                </a>
                            </div>
                        </div>
                    </div>';
                }
                ?>


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
                <input type="search" placeholder="What are you looking for?" class="search__input" /><button type="reset">&times;</button>
            </form>

            <i class="fa-solid fa-x search__close" id="search-close"></i>
        </div>
    </header>

    <script src="/asset/js/nav.js"></script>
</body>

</html>