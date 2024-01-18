<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Store with Reviews</title>

  <!----------------Custom CSS-------------------------->
  <link rel="stylesheet" href="asset/css/style.css" />

  <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />

  <!-------------------BootStrap CSS------------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!--Font Awsome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!------------------------------------------------------------------------------------------------------->

<body>
  <!--Header Section-->
  <?php include 'nav.php'; ?>

  <!--Main Section-->

  <!------------------Slider----------------->
  <div id="carouselExampleFade" class="carousel slide carousel-fade">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/asset/images/banner/main_banner.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="/asset/images/banner/banner2.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="/asset/images/banner/banner5.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="/asset/images/banner/watch1.jpg" class="d-block w-100">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!------------------End Slider----------------->
  <main class="container my-1 pb-1">
    <br><br>

    <!-----Featured catagory------------>

    

    <br><br>
    <!------------------Latest Products----------------->
    <h1 class="title">Latest Products</h1>
    <div class="listProduct">
      <?php include 'config.php';
      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

      $sql = "SELECT * FROM products ORDER BY added_at DESC LIMIT 8";
      $result = $con->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="item" data-id="1">
        <img src="/asset/images/products/' . $row['product_photo'] . '" alt="">
        <a href="productDetail.php?id=' . $row['product_id'] . '" class="product_name">
          <h2>' . $row['product_name'] . '</h2>
        </a>
        <span></span>
        <div class="product_actions">
          <div class="price">' . $row['price'] . '<b>৳</b></div>
          <div class="product_links">
            <a href="wishlist.php?id=' . $row['product_id'] . '"><i class="ri-heart-fill nav__search"></i></a>
            <a href="cart.php?id=' . $row['product_id'] . '"><i class="ri-shopping-cart-fill nav__search"></i></a>
          </div>
        </div>
        
      </div>';
        }
      }

      ?>
  



    </div>
  </main>
  
  <!-------Footer Section---------->
  <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>