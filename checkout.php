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

    <?php include 'nav.php'; ?>


    <div class="container checkout">
        <div class="title">Checkout</div>
        <div class="row checkout_row">
            <div class="col-25">
                <div class="container">
                    <h4>Items <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
                    <p><a href="#">Nike Shoes </a> <span class="price">₹2000</span></p>
                    <p><a href="#">Jio Phone</a> <span class="price">₹1000</span></p>
                    <p><a href="#">Iphone 13 pro max</a> <span class="price">₹20000</span></p>
                    <p><a href="#">Tomato</a> <span class="price">₹400</span></p>
                    <hr>
                    <p>Total <span class="price" style="color:black"><b>₹23400</b></span></p>
                </div>
            </div>
            <div class="col-75">
                <div class="container">
                    <form action="" class="">
                        <div class="row payment_row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="fname" class="login__label">Full Name</label>
                                <input type="text" class="login__input"  id="fname" name="firstname" required placeholder="Enter Full Name">
                                <label for="email" class="login__label">Email</label>
                                <input type="text" class="login__input" id="email" name="email" required placeholder="youremail@gamil.com">
                                <label for="adr" class="login__label">Address</label>
                                <input type="text" class="login__input" id="adr" name="address" required placeholder="Delivery Address">
                                <label for="city" class="login__label">City</label>
                                <input type="text" class="login__input" id="city" name="city" required placeholder="Delivery City">

                                <div class="row">
                                    <div class="col-50">
                                        <label for="state" class="login__label">State</label>
                                        <input type="text" class="login__input" id="state" required name="state" placeholder="Delivery State">
                                    </div>
                                    <div class="col-50">
                                        <label for="zip" class="login__label">Zip</label>
                                        <input type="text" class="login__input" id="zip" required name="zip" placeholder="Area Postal Code">
                                    </div>
                                </div>
                            </div>

                            <div class="col-50">
                                <h3>Payment Methods</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cash On Delivery
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Online Payment
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
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
                        <input type="submit" value="Place Order" class="login__button place_order">
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