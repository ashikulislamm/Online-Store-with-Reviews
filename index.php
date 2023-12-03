<?php
$servername = "localhost"; // Change to your database server
$username = "root";
$password = "";
$dbname = "online_store_with_review";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Store with Reviews</title>

  <!----------------Custom CSS-------------------------->
  <link rel="stylesheet" href="asset/css/style.css" />

  <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />

  <!-------------------BootStrap CSS------------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!---------------------Owl Carousel Cdn----------------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Font Awsome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!------------------------------------------------------------------------------------------------------->

<body>
  <!--Header Section-->
  <header class="header" id="header">
    <!------------------Navigation Bar----------------->
    <nav class="nav container">
      <a href="#" class="nav__logo">Online Store</a>

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
        <i class="fa-regular fa-user nav__login" id="login-btn"></i>

        <!-- Toggle button -->
        <div class="nav__toggle" id="nav-toggle">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
    </nav>

    <!--==================== SEARCH ====================-->
    <div class="search" id="search">
      <form action="" class="search__form">
        <i class="ri-search-line search__icon"></i>
        <input type="search" placeholder="What are you looking for?" class="search__input" />
      </form>

      <i class="fa-solid fa-x search__close" id="search-close"></i>
    </div>

    <!--==================== LOGIN ====================-->
    <div class="login" id="login">
      <form action="" class="login__form">
        <h2 class="login__title">Log In</h2>

        <div class="login__group">
          <div>
            <label for="email" class="login__label">Email</label>
            <input type="email" placeholder="Write your email" id="email" class="login__input" />
          </div>

          <div>
            <label for="password" class="login__label">Password</label>
            <input type="password" placeholder="Enter your password" id="password" class="login__input" />
          </div>
        </div>

        <div>
          <p class="login__signup">
            You do not have an account? <a href="#">Sign up</a>
          </p>

          <a href="#" class="login__forgot"> You forgot your password </a>

          <button type="submit" class="login__button">Log In</button>
        </div>
      </form>

      <i class="fa-solid fa-x login__close" id="login-close"></i>
    </div>
  </header>

  <!--Main Section-->

  <main class="container">
    <h4>Data from Whishlist table</h4>
    <table>
      <tr>
        <th>Product ID</th>
        <th>User ID</th>
      </tr>
      <?php
      // SQL query to retrieve data
      $sql = "SELECT * FROM wishlist";
      $result = $conn->query($sql);

      // Check if there are rows in the result set
      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["products_id"] . "</td>";
          echo "<td>" . $row["user_id"] . "</td>";
          echo "</tr>";
          //echo "Order ID :  " . $row["order_id"] . "  Order Amount : " . $row["amount"] . " Date : ".$row["order_date"];
        }
      } else {
        echo "0 results";
      }
      ?>
    </table>
    <br>
    <h4>Data from Orders table</h4>
    <table>
      <tr>
        <th>Order ID</th>
        <th>Ordeer Amount</th>
        <th>Order Date</th>
        <th>Product ID</th>
        <th style="text-align: center;">Order Status</th>
      </tr>
      <?php
      // SQL query to retrieve data
      $sql = "SELECT * FROM orders";
      $result = $conn->query($sql);

      // Check if there are rows in the result set
      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["order_id"] . "</td>";
          echo "<td>" . $row["amount"] . "</td>";
          echo "<td>" . $row["order_date"] . "</td>";
          echo "<td>" . $row["product_id"] . "</td>";
          echo "<td>" . $row["order_status"] . "</td>";
          echo "</tr>";
          //echo "Order ID :  " . $row["order_id"] . "  Order Amount : " . $row["amount"] . " Date : ".$row["order_date"];
        }
      } else {
        echo "0 results";
      }
      // Close the connection
      //$conn->close();
      ?>
    </table>
    <br>
    <h4>Data from Payment table</h4>
    <br>
    <table>
      <tr>
        <th>Order ID</th>
        <th>Payment Amount</th>
        <th>Payment Date</th>
        <th>Payemnt Details</th>
        <th style="text-align: center;">Payment Method</th>
      </tr>
      <?php
      // SQL query to retrieve data
      $sql = "SELECT * FROM payment";
      $result = $conn->query($sql);

      // Check if there are rows in the result set
      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["order_id"] . "</td>";
          echo "<td>" . $row["payment_amount"] . "</td>";
          echo "<td>" . $row["payment_date"] . "</td>";
          echo "<td>" . $row["payment_details"] . "</td>";
          echo "<td>" . $row["payment_method"] . "</td>";
          echo "</tr>";
          //echo "Order ID :  " . $row["order_id"] . "  Order Amount : " . $row["amount"] . " Date : ".$row["order_date"];
        }
      } else {
        echo "0 results";
      }
      // Close the connection
      //$conn->close();
      ?>
    </table>
    <br>

    <h4>Data from Products table</h4>
    <br>
    <table>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Category</th>
        <th>Product Price</th>
        <th>Product Details</th>
        <th style="text-align: center;">Stock Status</th>
      </tr>
      <?php
      // SQL query to retrieve data
      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      // Check if there are rows in the result set
      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["product_id"] . "</td>";
          echo "<td>" . $row["product_name"] . "</td>";
          echo "<td>" . $row["catagory"] . "</td>";
          echo "<td>" . $row["price"] . "</td>";
          echo "<td>" . $row["product_descr"] . "</td>";
          echo "<td>" . $row["stock_status"] . "</td>";
          echo "</tr>";
          //echo "Order ID :  " . $row["order_id"] . "  Order Amount : " . $row["amount"] . " Date : ".$row["order_date"];
        }
      } else {
        echo "0 results";
      }
      // Close the connection
      //$conn->close();
      ?>
    </table>
    <br>

    
  </main>

  <!--Footer Section-->

  <footer></footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="asset/js/main.js"></script>
</body>

</html>