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
    <!--Font Awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!--Header Section-->

    <?php include 'nav.php';
    ?>


    <div class="container checkout">
        <div class="title">Checkout</div>
        <div class="row checkout_row">
            <div class="col-25">
                <div class="container">
                    <h4>Items <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
                    <?php
                    include 'config.php';

                    $totalPrice = 0;

                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $cartItemID) {
                            $result = mysqli_query($con, "SELECT product_name, price FROM products WHERE product_id='$cartItemID'");
                            $row = mysqli_fetch_assoc($result);

                            echo '<p style="font-weight: bold;font-size 20px;">' . $row['product_name'] . ' <span class="price">৳' . $row['price'] . '</span></p>';
                            $totalPrice += $row['price'];
                        }
                    }
                    ?>
                    <hr>
                    <p>Total <span class="price" style="color:black"><b>৳<?php echo $totalPrice; ?></b></span></p>
                </div>
            </div>
            <div class="col-75">
                <div class="container">
                    <form action="" class="" method="post">
                        <div class="row payment_row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="fname" class="login__label">Full Name</label>
                                <input type="text" class="login__input" id="name" name="name" required placeholder="Enter Full Name">
                                <label for="email" class="login__label">Email</label>
                                <input type="text" class="login__input" id="email" name="email" required placeholder="youremail@gamil.com">
                                <label for="adr" class="login__label">Address</label>
                                <input type="text" class="login__input" id="adr" name="address" required placeholder="Delivery Address">
                                <label for="city" class="login__label">Phone Number</label>
                                <input type="tel" class="login__input" id="tel" name="tel" required placeholder="Contact Number">
                            </div>

                            <div class="col-50">
                                <h3>Payment Methods</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="flexRadioDefault1" value="COD" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cash On Delivery
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="flexRadioDefault2" value="Paid" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Online Payment
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="flexRadioDefault2" value="Paid" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        POS On Delivery
                                    </label>
                                </div>
                                <label for="fname" class="login__label">Accepted Cards</label>
                                <div class="icon-container">
                                    <i class="fa-brands fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa-brands fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa-brands fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa-brands fa-cc-discover" style="color:orange;"></i>
                                </div>
                                <img src="/asset/images/Payment_Brands.png" alt="">
                            </div>
                        </div>
                        <input type="submit" value="Place Order" class="login__button place_order" name="submit">
                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-------Footer Section---------->
    <?php include 'footer.php'; ?>
    <script src="/asset/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>
<?php

$amount =  $totalPrice;
$order_date = date("Y-m-d");
$order_status = "on hold";
$payment_status = "";
$user_id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
        $name = $_POST['name'];
        $phoneNo = $_POST['tel'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['paymentMethod'])) {
                $payment_status = $_POST['paymentMethod'];
            } else {
                $payment_status = "No payment method selected.";
            }
        }

        mysqli_query($con, "INSERT INTO orders(amount, users_id, receiver_name, dil_address, receiver_phone, receiver_email, order_date, order_status, payment_status) VALUES ('$amount', '$user_id', '$name', '$address', '$phoneNo', '$email', '$order_date', '$order_status', '$payment_status')") or die("Error Occurred");

        $query = mysqli_query($con, "SELECT * FROM orders WHERE users_id='$user_id' AND order_date = '$order_date' AND amount= '$amount'");
        $row = mysqli_fetch_assoc($query);
        $order_id = $row['order_id'];

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cartItemID) {
                mysqli_query($con, "INSERT INTO order_details(order_id, product_id, quantity) VALUES ('$order_id', '$cartItemID', 1)") or die("Error Occurred");
            }
        }


        echo '
         <script>
             swal({
                 title: "Order Placed Successfully",
                 text: "Thanks for shopping with us!",
                 icon: "success",
                 button: "Ok!",
             });
             
         </script>
         ';
        unset($_SESSION['cart']);
    } else {

        echo '
         <script>
             swal({
                 title: "Cannot Place Order",
                 text: "Please Log In to place order!",
                 icon: "error",
                 button: "Ok!",
             });
             
         </script>
         ';
    }


    // echo'<script>window.location="index.php"</script>';
}
?>