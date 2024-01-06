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
    <?php
    include 'config.php';
    ?>
    <?php
    if (isset($_SESSION['id'])) {
        $result = mysqli_query($con, "SELECT * FROM user WHERE user_id='$_SESSION[id]'") or die("Select Error");
        $row = mysqli_fetch_assoc($result);
        
        $wishlist_result = mysqli_query($con, "SELECT * FROM wishlist WHERE user_id='$_SESSION[id]'");
        if ($wishlist_result && mysqli_num_rows($wishlist_result) > 0) {
            echo '
            <main class="main">
         <div class="container">
            <h1 style="text-align: center; margin-bottom: 30px;">Welcome ,' . $row['user_name'] . '</h1>
            <div class="profileDiv">
                <div class="left">
                    <div class="user-profile">
                        <div class="avatar">
                            <img src="/asset/images/user.png" alt="" width="100px">
                        </div>
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
                    <form action="" class="login__form" method="post">
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
                    <button type="submit" class="login__button" name="update">Update</button>
                </div>
            </form>
                    </div>
                    <div class="det" id="orders">This is Orders Section</div>
                    <div class="det" id="wishlist">
                    <h3>Your Wishlist</h3>
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                        </tr>';
                
                        while ( $row2 = mysqli_fetch_assoc($wishlist_result)) {
                           
                            //$p_id = null;
                            $p_id = $row2["products_id"];
                            $product_result = mysqli_query($con, "SELECT * FROM products WHERE product_id='$p_id'");
                            $product_row = mysqli_fetch_assoc($product_result);

                            echo '
                            <tr>
                                <td>' . $product_row["product_name"] . '</td>
                                <td>' . $product_row["price"] . '</td>
                            </tr>';
                        }
                        echo '
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>';

        } else {
            echo '
            <main class="main">
        <div class="container">
            <h1 style="text-align: center; margin-bottom: 30px;">Welcome ,' . $row['user_name'] . '</h1>
            <div class="profileDiv">
                <div class="left">
                    <div class="user-profile">
                        <div class="avatar">
                            <img src="/asset/images/user.png" alt="" width="100px">
                        </div>
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
                    <form action="" class="login__form" method="post">
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
                    <button type="submit" class="login__button" name="update">Update</button>
                </div>
            </form>
                    </div>
                    <div class="det" id="orders">This is Orders Section</div>
                    <div class="det" id="wishlist">
                    <h3>No products in your wishlist</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>';
        }


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
                echo '<script>window.location="successful.php"</script>';
                exit();
            } else {
                echo '<script>window.location="emailconfig.php"</script>';
                exit();
            }
        }
    } else {
        echo "<div class='message'>
                <h5>Please Login to view your profile </h5><br>
                <a href='login.php' class='nested-button-link'><button class='nested-button'>Login</button></a>
                </div> <br>";
    }


    ?>
    <?php include 'footer.php'; ?>
    <script src="/asset/js/profile.js"></script>
</body>

</html>