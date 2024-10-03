<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Store with Reviews</title>
  <!----------------Custom CSS-------------------------->
  <link rel="stylesheet" href="asset/css/style.css" />
  <!----------------Favicon-------------------------->
  <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />
  <!-------------------BootStrap CSS------------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-------------------Font Awsome---------------------------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <!------------------Header Section------------------------->
  <?php include 'nav.php'; ?>
  <!---------------------Main Section--------------------------->
  <!------------------Slider----------------->
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active indicator" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" class="indicator"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" class="indicator"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4" class="indicator"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/asset/images/banner/main_banner.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/asset/images/banner/banner2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/asset/images/banner/banner5.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/asset/images/banner/watch1.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!------------------Slider----------------->
  <main class="container my-1 pb-1">
    <br><br>
    <!-------------Featured catagory--------------->
    <h1 class="title">Featured Categories</h1>
    <div class="row">
      <div class="col-12 col-md-3">
        <div class="category-card">
          <a href="">
            <div class="category-card-img">
              <img src="/asset/images/catagory/smart-watch.png" class="w-40" alt="Laptop">
            </div>
            <div class="category-card-body">
              <a href="">Smart Watch</a>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="category-card">
          <a href="">
            <div class="category-card-img">
              <img src="/asset/images/catagory/earbuds.png" class="w-40" alt="Mobile Devices">
            </div>
            <div class="category-card-body">
              <a href="">Earbuds</a>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="category-card">
          <a href="">
            <div class="category-card-img">
              <img src="/asset/images/catagory/power-bank.png" class="w-40" alt="Mens Fashion">
            </div>
            <div class="category-card-body">
              <a href="">Powerbank</a>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="category-card">
          <a href="">
            <div class="category-card-img">
              <img src="/asset/images/catagory/smart-band.png" class="w-40" alt="Women Fashion">
            </div>
            <div class="category-card-body">
              <a href="">Smart Band</a>
            </div>
          </a>
        </div>
      </div>
    </div>
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
        <div class="product_actions">';
          if ($row["offer_price"] > 0) {
            echo '<div class="price"><strike>' . $row['price'] . '<b>৳</b></strike></div>';
            echo '<div class="price">' . $row['offer_price'] . '<b>৳</b></div>';
          } else {
            echo '<div class="price">' . $row['price'] . '<b>৳</b></div>';
          }
          echo '
        </div>
      </div>';
        }
      }
      ?>
    </div>
    <div class="seeAllBtn">
      <a href="product.php" class="seeAll">See All Products</a>
    </div>
  </main>
  <!-------Footer Section---------->
  <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>