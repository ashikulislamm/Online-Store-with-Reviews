<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Store with Reviews</title>

    <!----------------Custom CSS-------------------------->
    <link rel="stylesheet" href="asset/css/style.css" />
    <!-----------Sweet Alert-------------------->
    <script src="/asset/js/sweetalert.js"></script>
    <!-----------Favicon---------------->
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
    <?php
    include 'config.php';
    ?>
    <?php
    if (isset($_SESSION['id'])) {
        $result = mysqli_query($con, "SELECT * FROM user WHERE user_id='$_SESSION[id]'") or die("Select Error");
        $row = mysqli_fetch_assoc($result);

        $wishlist_result = mysqli_query($con, "SELECT * FROM wishlist WHERE user_id='$_SESSION[id]'");
        $order_result = mysqli_query($con, "SELECT * FROM orders WHERE users_id='$_SESSION[id]' ") or die("Select Error");
        echo '
            <main class="main">
         <div class="container">
            <h1 class="greet">Welcome ,' . $row['user_name'] . '</h1>
            <div class="profileDiv">
                <div class="left">
                    <div class="user-profile">
                        <div class="avatar">
                            <img src="/asset/images/user.png" alt="" width="100px">
                        </div>
                        <!-----------------User Info------------------->
                        <div class="info">
                            <p><b>Name</b> : ' . $row['user_name'] . '</p>
                            <p><b>Email</b> : ' . $row['email'] . '</p>
                            <p><b>Number</b> : ' . $row['user_number'] . '</p>
                            <p><b>Active Orders</b> : ' . $row['active_orders'] . '</p>
                            <address><strong>Address</strong> : ' . $row['user_address'] . '</address>
                        </div>
                    </div>
                    <div class="profileBtns">
                        <ul class="btnList">
                            <li id="accountBtn">Account</li>
                            <li id="ordersBtn">Orders</li>
                            <li id="wishlistBtn">Wishlist</li>
                        </ul>
                    </div>
                </div>
                <div class="profile-details">
                    <div class="det" id="account">
                <form action="" class="profile__form" method="post">
                <h2 class="login__title">Update Information</h2>

                <div class="login__group">
                    <div>
                        <input type="text" placeholder="Write your name" id="fname" class="login__input" name="Name" value="' . $row['user_name'] . '" />
                    </div>
                    <div>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your telephone number" class="login__input" value="' . $row['user_number'] . '" pattern="[0-9]{11}">
                    </div>
                    <div>
                        <input type="text" placeholder="Write your Address" id="phone" class="login__input" value="' . $row['user_address'] . '" name="Address"/>
                    </div>
                    <div>
                        <input type="email" placeholder="Write your email" id="email" class="login__input" value="' . $row['email'] . '" name="email"/>
                    </div>

                    <div>
                        <input type="text" placeholder="Enter your password" id="password" class="login__input" value="' . $row['user_password'] . '"  name="password"/>
                    </div>
                </div>

                <div>
                    <button type="submit" class="login__button profile_update" name="update">Update</button>
                </div>
            </form>
                    </div>
                    <div class="det" id="orders">
                    <h3>Your Orders</h3>';
                    //Code for Showing orders
        if ($order_result && mysqli_num_rows(($order_result)) > 0) {
            while ($row3 = mysqli_fetch_assoc($order_result)) {
                echo '
                    <div class="listCart">
                        <div class="orders">
                            <div class="orderId">Order#' . $row3["order_id"] . '</div>
                            <div class="amount">' . $row3["amount"] . '<b>৳</b></div>
                            <div class="orderDate">' .$row3["order_date"]. '</div>
                            <div class="orderDetails">
                                <a href="orderDetails.php?id=' . $row3['order_id'] . '">Order Details</a>
                            </div><br>
                        </div>
                    </div>';
            }
        }

        echo '
                </div>
                <div class="det" id="wishlist">
                    <h3>Your Wishlist</h3>
                    <div class="listProduct wishlist">';
                    //Code for Showing Wishlist
        if ($wishlist_result && mysqli_num_rows($wishlist_result) > 0) {
            while ($row2 = mysqli_fetch_assoc($wishlist_result)) {
                //$p_id = null;
                $p_id = $row2["products_id"];
                $product_result = mysqli_query($con, "SELECT * FROM products WHERE product_id='$p_id'");
                $product_row = mysqli_fetch_assoc($product_result);
                echo '<div class="item" data-id="1">
                        <img src="/asset/images/products/' . $product_row['product_photo'] . '" alt="">
                        <a href="productDetail.php?id=' . $product_row['product_id'] . '" class="product_name">
                            <h2>' . $product_row['product_name'] . '</h2>
                        </a>
                        <span></span>
                        <div class="product_actions">';
                if ($product_row["offer_price"] > 0) {
                    echo '<div class="price"><strike>' . $product_row['price'] . '<b>৳</b></strike></div>';
                    echo '<div class="price">' . $product_row['offer_price'] . '<b>৳</b></div>';
                } else {
                    echo '<div class="price">' . $product_row['price'] . '<b>৳</b></div>';
                }
                echo '
                        </div>
                    </div>';
            }
        } else {
            echo 'No Products In Wishlist';
        }
        echo '
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </main>';
        //Code for updating data
        if (isset($_POST['update'])) {
            $user_email = null;
            $username = $_POST['Name'];
            $phoneNo = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['Address'];
            $user_email = $row['email'];
            $verify_query1 = mysqli_query($con, "SELECT email FROM user WHERE email = '$email'");

            if (mysqli_num_rows($verify_query1) < 1 || $user_email == $email) {
                mysqli_query($con, "UPDATE user SET user_name ='$username', user_number='$phoneNo',email='$email',user_password='$password',user_address='$address' WHERE user_id='$_SESSION[id]'");
                echo '
                <script>
                    swal({
                        title: "Profile Updated!",
                        text: "Refresh the Page to view updated Info",
                        icon: "success",
                        button: "Ok!",
                    });
                </script>
                ';
            } else {
                echo '
                <script>
                    swal({
                        title: "Email Alreday in Use!",
                        text: "Try again with another email",
                        icon: "error",
                        button: "Ok!",
                    });
                </script>
                ';
            }
        }
    } else {
        echo '
                <script>
                    swal({
                        title: "Login First!",
                        text: "Please Login to view your Profile",
                        icon: "error",
                        button: "Ok!",
                    });
                </script>
                ';
    }
    ?>
    <?php include 'footer.php'; ?>
    <script src="/asset/js/profile.js"></script>
    <script src="/asset/js/script.js"></script>
</body>

</html>