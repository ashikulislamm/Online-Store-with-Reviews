<?php session_start(); ?>
<html lang="en">

<head>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Store with Reviews</title>

    <!----------------Custom CSS-------------------------->
    <link rel="stylesheet" href="asset/css/style.css" />
    <!-----------Sweet Alert-------------------->
    <script src="/asset/js/sweetalert.js"></script>
    <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" />
    <!-------------------BootStrap CSS------------------->
    <!--Font Awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
</head>

<body>

  <header class="header" id="header">
    <!------------------Navigation Bar----------------->
    <nav class="nav container">
      <a href="/index.php" class="nav__logo"><img src="asset/images/logo.png" width="120px" alt=""></a>

      <div class="nav__menu" id="nav-menu" style="margin-top: 15px;">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="on_sale.php" class="nav__link">On Sale</a>
          </li>

          <li class="nav__item">
            <a href="product.php" class="nav__link">Products</a>
          </li>

          <li class="nav__item">
            <a href="#" class="nav__link">Categories</a>
          </li>

          <li class="nav__item">
            <a href="#" class="nav__link">Blog</a>
          </li>

          <li class="nav__item">
            <a href="upcoming.php" class="nav__link">Coming Soon</a>
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
          echo '<div class="dropdown" id="dropdown-content">
                    <button class="dropdown__button" id="dropdown-button">
                      <i class="ri-user-line dropdown__icon"></i>
                      <span class="dropdown__name">' . $row["user_name"] . '</span>
        
                      <div class="dropdown__icons">
                        <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        <i class="ri-close-line dropdown__close"></i>
                      </div>
                    </button>
        
                    <ul class="dropdown__menu">
                      <li class="dropdown__item">
                        <i class="ri-user-line dropdown__icon"></i>
                        <span class="dropdown__name"><a href="profile.php" class="nav__link">My Account</a></span>
                      </li>
        
                      <li class="dropdown__item">
                        <i class="ri-logout-box-line dropdown__icon"></i>
                        <span class="dropdown__name"><a href="logout.php" class="nav__link">Logout</a></span>
                      </li>
                    </ul>
                  </div>';
        } else {
          echo '<div class="dropdown" id="dropdown-content">
                    <button class="dropdown__button" id="dropdown-button">
                      <i class="ri-user-3-line dropdown__icon"></i>
                      <span class="dropdown__name">My profile</span>
        
                      <div class="dropdown__icons">
                        <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        <i class="ri-close-line dropdown__close"></i>
                      </div>
                    </button>
        
                    <ul class="dropdown__menu">
                      <li class="dropdown__item">
                        <i class="ri-user-add-line dropdown__icon"></i>
                        <span class="dropdown__name"><a href="signup.php" class="nav__link">Signup</a></span>
                      </li>
        
                      <li class="dropdown__item">
                        <i class="ri-login-box-line dropdown__icon"></i>
                        <span class="dropdown__name"><a href="login.php" class="nav__link">Login</a></span>
                      </li>
                    </ul>
                  </div>';
        }
        ?>
        <!-- Toggle button -->
        <div class="nav__toggle" id="nav-toggle">
          <i class="fa-solid fa-bars"></i>
        </div>
        <i class="ri-shopping-cart-fill nav__search icon-cart"></i>
      </div>
    </nav>

    <!--==================== SEARCH ====================-->
    <div class="search" id="search">
      <form action="" class="search__form" style="margin-bottom: 20px;">
        <i class="fa-solid fa-magnifying-glass search__icon"></i>
        <input type="search" placeholder="What are you looking for?" class="search__input" id="live_search" autocomplete="off" />
        <button type="reset">&times;</button>
      </form>
      <div id="searchresult" style="height: auto;">

      </div>
      <i class="fa-solid fa-x search__close" id="search-close"></i>
    </div>
  </header>
  <div class="cartTab">
    <h1>Your Cart</h1>
    <div class="listCart">
      <?php
      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId) {
          $result = mysqli_query($con, "SELECT * FROM products WHERE product_id = $productId");
          $row = $result->fetch_assoc();
          echo '
            <div class="item">
              <div class="image">
                <img src="/asset/images/products/' . $row['product_photo'] . '" alt="">
              </div>
              <div class="name">' . $row['product_name'] . '</div>';
          if ($row["offer_price"] > 0) {
            echo '<div class="price">' . $row['offer_price'] . '<b>৳</b></div>';
          } else {
            echo '<div class="price">' . $row['price'] . '<b>৳</b></div>';
          }
          echo '
                <div class="quantity">
                  <form action="" method="post">
                  <input type="hidden" name="product_id" value="' . $row['product_id'] . '">
                    <button type="submit" name="delete" style="background-color: transparent;">
                        <i class="ri-delete-bin-2-fill deleteCart"></i>
                    </button>
                  </form>
                </div><br>
            </div>
            ';
        }
      }
      if (isset($_POST['delete'])) {
        $productIdToDelete = $_POST['product_id'];

        // Find the index of the product in the cart array
        $index = array_search($productIdToDelete, $_SESSION['cart']);

        // Remove the product from the cart array
        if ($index !== false) {
          unset($_SESSION['cart'][$index]);
          echo '
                <script>
                    swal({
                        title: "Removed!",
                        text: "Product removed from cart!",
                        icon: "success",
                        button: "Ok!",
                    });
                </script>
                ';
        }

        // Optional: Redirect back to the cart page or update the page content
        //echo '<script>location.reload(); </script>';
        //exit();
      }


      ?>
    </div>
    <div class="btnn">
      <button class="closee">Close</button>
      <button class="checkOut_btn"><a href="checkout.php" style="color: white;">Check Out</a></button>
    </div>
  </div>
  <!----------JQuery Library---------->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-----------------JS For Live Search---------------->
  <script type="text/javascript">
    $(document).ready(function() {

      $("#live_search").keyup(function() {
        var input = $(this).val();
        if (input != "") {
          $.ajax({
            url: "searchshow.php",
            method: "POST",
            data: {
              input: input
            },

            success: function(data) {
              $("#searchresult").html(data);
            }
          });
        } else {
          $("#searchresult").css("display", "none");
        }
      });
    });
  </script>
  <!-----------Custom JS--------------------->
  <script src="/asset/js/nav.js"></script>
  <script src="/asset/js/script.js"></script>
</body>

</html>