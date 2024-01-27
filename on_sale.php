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

<body>
  <?php include 'nav.php'; ?>
  <!-----Show start---->
  <div class="container">
    <h1 class="title" style="margin-top: 120px;">Products</h1>
    <div class="listProduct">
      <?php include 'config.php';
      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

      $sql = "SELECT * FROM on_sale";
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
                        <div class="price"><strike>' . $row['old_price'] . '<b>৳</b></strike></div>
                        <div class="price">' . $row['new_price'] . '<b>৳</b></div>
                    </div>
                </div>';
        }
      }
      ?>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<!----------------------
<div class="product_links">
            <a href=""><i class="ri-heart-fill nav__search"></i></a>
            <a href=""><i class="ri-shopping-cart-fill nav__search"></i></a>
          </div>
--------->