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
    <script src="/asset/js/sweetalert.js"></script>
    <!-------------------BootStrap CSS------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!---------------------Font Awsome------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                <div class="price">Regular Price : ' . $row['price'] . '<b>৳</b></div>';
            if ($row["offer_price"] > 0) {
                echo '<div class="price">Discounted Price : ' . $row['offer_price'] . '<b>৳</b></div>';
            }
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
                echo '  <div class="item" data-id="1">
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
        <?php
        //Add Products to Wishlist
        if (isset($_POST['wishlist'])) {
            if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
                $product_id = isset($_GET['id']) ? $_GET['id'] : null;
                $user_id = $_SESSION['id'];

                $checkquery = "SELECT * FROM wishlist WHERE user_id = $user_id AND products_id = $product_id ";
                $checkresult = mysqli_query($con, $checkquery);
                if ($checkresult->num_rows > 0) {
                    echo '
                <script>
                    swal({
                        title: "Cannot Add to Wishlist!",
                        text: "Product is Already in your Wishlist",
                        icon: "warning",
                        button: "Ok!",
                    });
                </script>
                ';
                } else {
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
                }
            } else {
                echo '
                <script>
                    swal({
                        title: "Failed to Add!",
                        text: "Please Login to Add Products to Your Wishlist!",
                        icon: "error",
                        button: "Ok!",
                    });
                </script>
                ';
            }
        }
        ?>
    </div>

    <?php
    //Add to Cart Products
    if (isset($_POST['addtocart'])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if ($row["stock_status"] > 0) {
            if (in_array($productId, $_SESSION['cart'])) {
                echo '
                <script>
                    swal({
                        title: "Cannot Add to Cart!",
                        text: "Product is Already in yout cart",
                        icon: "warning",
                        button: "Ok!",
                    });
                </script>
                ';
                //exit();
            } else {
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
        } else {
            echo '
                <script>
                    swal({
                        title: "Can not Add to Cart!",
                        text: "Product is out of stock!",
                        icon: "error",
                        button: "Ok!",
                    });
                </script>
                ';
        }
    }
    ?>

    <!-------Review Section---------->
    <div class="title">Reviews</div>
    <div class="rcard">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <h1 class="text-warning mt-4 mb-4">
                        <?php
                        $sql = "SELECT AVG(rating) as average_rating, COUNT(*) as total_review";
                        $sql .= " FROM review WHERE product_id = $productId";
                        $result = mysqli_query($con, $sql);
                        $row = $result->fetch_assoc();
                        echo '<b><span id="average_rating">' . number_format($row['average_rating'], 1) . '</span> / 5</b>';
                        ?>

                    </h1>
                    <div class="mb-3">
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                    </div>
                    <?php
                    echo '<h3><span id="total_review">' . $row['total_review'] . '</span> Review</h3>';
                    ?>

                </div>
                <div class="col-sm-4">
                    <p>
                    <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                    </div>
                    </p>
                    <p>
                    <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                    </div>
                    </p>
                    <p>
                    <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                    </div>
                    </p>
                    <p>
                    <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                    </div>
                    </p>
                    <p>
                    <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                    </div>
                    </p>
                </div>
                <div class="col-sm-4 text-center">
                    <h3 class="mt-4 mb-3">Write Review Here</h3>
                    <button type="button" name="add_review" id="add_review" class="btn btn-primary review__btn">Review</button>
                </div>
            </div>
        </div>
    </div>
    <!-------Review Content---------->
    <div class="mt-5" id="review_content">
        <?php
        $sql = "SELECT * FROM review WHERE product_id = $productId ORDER BY review_id DESC";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                    <div class="rcard">
                        <div class="card-body">
                            <h4 class="card-title">' . $row['user_name'] . '</h4>
                            <h5 class="card-subtitle mb-2 text-muted">';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $row['rating']) {
                        echo '<i class="fas fa-star text-warning"></i>';
                    } else {
                        echo '<i class="far fa-star text-warning"></i>';
                    }
                }
                echo '
                            </h5>
                            <p class="card-text">' . $row['user_review'] . '</p>
                            <p class="card-text"><small class="text-muted">' .  $row["date_time"] . '</small></p>
                        </div>';
            }
        }
        ?>
    </div>
    <!-------Review Modal---------->
    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4">
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
                    <div class="form-group">
                        <?php
                        $productId = isset($_GET['id']) ? $_GET['id'] : null;

                        echo '<input type="hidden" name="productId" id="productId" value="' . $productId . '">';

                        if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
                            $user_id = $_SESSION['id'];
                            $sql = "SELECT * FROM user WHERE user_id = $user_id";
                            $result = mysqli_query($con, $sql);
                            $row = $result->fetch_assoc();
                            echo '<input type="text" name="user_name" id="user_name" class="form-control" value="' . $row['user_name'] . '" disabled/>';
                        } else {
                            echo '<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="button" class="btn btn-primary review__btn" id="save_review">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-------Footer Section---------->
    <?php include 'footer.php'; ?>
    <!-------------------Custom JS------------------->
    <script src="/asset/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>