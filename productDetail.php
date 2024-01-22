<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store with Reviews</title>
    <!----------------Custom CSS-------------------------->
    <link rel="stylesheet" href="asset/css/style.css" />

    <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />
    <!-----------Sweet Alert-------------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-------------------BootStrap CSS------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--Font Awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!--Header Section-->

    <?php include 'nav.php'; ?>

    <!--Main Section-->
    <div class="container">
        <div class="title">Product Detail</div>
        <?php include 'config.php';
        //Dsplay the Product details

        $productId = isset($_GET['id']) ? $_GET['id'] : null;
        $result = mysqli_query($con, "SELECT * FROM products WHERE product_id = $productId");
        $row = $result->fetch_assoc();
        $product_cat = $row['catagory'];
        if ($result->num_rows > 0) {
            echo '
            <div class="detail">
            <div class="image">
                <img src="/asset/images/products/' . $row['product_photo'] . '" alt="">
            </div>
            <div class="content">
                <div class="cat">Brand : ' . $row['brand'] . '</div>
                <h1 class="name">' . $row['product_name'] . '</h1>
                <div class="cat">Category : ' . $row['catagory'] . '</div>
                <div class="price">' . $row['price'] . '<b>৳</b></div>';

            if ($row["stock_status"] > 0) {
                echo '<div class="instock">In Stock</div>';
            } else {
                echo '<div class="outstock">Out of Stock</div>';
            }
            echo '
                <div class="buttons">
                    <form action="" method="post">
                        <button type="submit" name="wishlist">
                            Wishlist
                            <span><i class="ri-heart-fill"></i></span>
                        </button>
                        <button type="submit" name="addtocart">
                            Add To Cart
                            <span><i class="ri-shopping-cart-fill"></i></span>
                        </button>
                    </form>
                </div>
                <div class="description">
                ' . $row['product_descr'] . '
                </div>
            </div>
        </div>
            
            ';
        } else {
            echo '<p>Product not found</p>';
        }
        //Show Related Products
        $sql2 = "SELECT * FROM products WHERE catagory = '$product_cat' AND product_id != $productId LIMIT 4";
        $result2 = mysqli_query($con, $sql2);
        if ($result2->num_rows > 0) {
            echo '
            <div class="title">Related Products</div>
            <div class="listProduct">
            ';
            while ($row2 = $result2->fetch_assoc()) {
                echo '<div class="item" data-id="1">
                            <img src="/asset/images/products/' . $row2['product_photo'] . '" alt="">
                            <a href="productDetail.php?id=' . $row2['product_id'] . '" class="product_name">
                                <h2>' . $row2['product_name'] . '</h2>
                            </a>
                            <span></span>
                            <div class="product_actions">
                            <div class="price">' . $row2['price'] . '<b>৳</b></div>
                            </div>
                        </div>';
            }
            echo '</div>';
        }
        ?>
    </div>
    <?php
    //Add Products to Wishlist
    if (isset($_POST['wishlist'])) {
        if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
            $product_id = isset($_GET['id']) ? $_GET['id'] : null;
            $user_id = $_SESSION['id'];
            $sql = "INSERT INTO wishlist (user_id, products_id) VALUES ('$user_id', '$product_id')";
            if ($con->query($sql) === TRUE) {
                echo '
                <script>
                    swal({
                        title: "Added to wishlist!",
                        text: "visit your Profile Dashboard to View Favourites Products!",
                        icon: "success",
                        button: "Ok!",
                    });
                </script>
                ';
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        } else {
            echo '
                <script>
                    swal({
                        title: "Can not Add!",
                        text: "Please Login to Add Products to Your WIshlist!",
                        icon: "error",
                        button: "Ok!",
                    });
                </script>
                ';
        }
    }


    ?>

    <?php
    //Add to Cart Products
    if (isset($_POST['addtocart'])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $_SESSION['cart'][] = $productId;
        echo '
                <script>
                    swal({
                        title: "Product Added to Cart!",
                        text: "View Your Cart to see products!",
                        icon: "success",
                        button: "Ok!",
                    });
                </script>
                ';
    }

    ?>


    <!-------Footer Section---------->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>