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
    <!---------------------Font Awsome--------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
</head>

<body>
    <!--Header Section-->

    <?php include 'nav.php'; ?>
    <?php
    include 'config.php';
    $orderId = isset($_GET['id']) ? $_GET['id'] : null;
    $orderresult = mysqli_query($con, "SELECT * FROM orders WHERE order_id = $orderId");
    $orderrow = $orderresult->fetch_assoc();
    $userId = $orderrow['users_id'];
    $orderDetailresult = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $orderId");
    //$orderDetailrow = $orderDetailssql->fetch_assoc();
    $deliverycharge = 60;
    ?>
    <br><br><br><br><br><br>
    <div class="container">
        <!-----------Order Details--------------------->
        <div class="ordertitle">
            <h1>Order# <?php echo $orderId; ?></h1>
            <span><?php echo $orderrow['order_status']; ?></span>
        </div>
        <div class="summary">
            <div class="address">
                <h3>Shipping Address</h3>
                <p>Name : <?php echo $orderrow['receiver_name']; ?></p>
                <p>Address : <?php echo $orderrow['dil_address']; ?></p>
                <p>Mobile : <?php echo $orderrow['receiver_phone']; ?></p>
                <p>Email : <?php echo $orderrow['receiver_email']; ?></p>
                <p>Date : <?php echo $orderrow['order_date']; ?></p>
            </div>
            <div class="total">
                <h3>Order Summary</h3>
                <table>
                    <tr>
                        <td>Sub Total</td>
                        <td><?php echo $orderrow['amount']; ?><b>৳</b></td>
                    </tr>
                    <tr>
                        <td>Delivery Charge</td>
                        <td><?php echo $deliverycharge ?> <b>৳</b></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><?php echo $orderrow['amount'] + $deliverycharge; ?><b>৳</b></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="products">
            <div class="ordertitle">
                <h1>Products</h1>
                <table>
                    <tr>
                        <th>Image</th>
                        <th>Product name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    if ($orderDetailresult && mysqli_num_rows($orderDetailresult) > 0) {
                        while ($orderDetailsrow = $orderDetailresult->fetch_assoc() ) {
                            $p_id = $orderDetailsrow["product_id"];
                            $product_result = mysqli_query($con, "SELECT * FROM products WHERE product_id='$p_id'");
                            $product_row = mysqli_fetch_assoc($product_result);
                            echo '<tr>
                                <td><img src="/asset/images/products/' . $product_row['product_photo'] . '" alt="img1"></td>
                                <td><a href="productDetail.php?id=' . $p_id . '">' . $product_row['product_name'] . '</a></td>
                                <td>' . $orderDetailsrow['quantity'] . '</td>
                                <td>' . $product_row['price'] . '<b>৳</b></td>
                            </tr>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <!-----------------Order tracking--------------------->
        <div class=" mb-3">
            <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking Order </span><span class="text-medium"></span></div>
            <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2">
                <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped Via:</span> Redex</div>
                <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span> <?php echo $orderrow['order_status'] ?></div>
                <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected Date:</span> SEP 09, 2017</div>
            </div>
            <div class="card-body">
                <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                    <?php
                    //Checking Order Status
                    $orderStatus = $orderrow['order_status'];
                    if ($orderStatus === 'Confirmed') {
                        echo '
                        <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-config"></i></div>
                        </div>
                        <h4 class="step-title">Processing Order</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-medal"></i></div>
                        </div>
                        <h4 class="step-title">Quality Check</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-car"></i></div>
                        </div>
                        <h4 class="step-title">Product Dispatched</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-home"></i></div>
                        </div>
                        <h4 class="step-title">Product Delivered</h4>
                    </div>
                        ';
                    } elseif ($orderStatus === 'Processing') {
                        echo '
                        <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                    </div>
                    <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-config"></i></div>
                        </div>
                        <h4 class="step-title">Processing Order</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-medal"></i></div>
                        </div>
                        <h4 class="step-title">Quality Check</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-car"></i></div>
                        </div>
                        <h4 class="step-title">Product Dispatched</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-home"></i></div>
                        </div>
                        <h4 class="step-title">Product Delivered</h4>
                    </div>
                        ';
                    } elseif ($orderStatus === 'Quality Check') {
                        echo '
                        <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                    </div>
                    <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-config"></i></div>
                        </div>
                        <h4 class="step-title">Processing Order</h4>
                    </div>
                    <div class="step completed ">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-medal"></i></div>
                        </div>
                        <h4 class="step-title">Quality Check</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-car"></i></div>
                        </div>
                        <h4 class="step-title">Product Dispatched</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-home"></i></div>
                        </div>
                        <h4 class="step-title">Product Delivered</h4>
                    </div>
                        ';
                    } elseif ($orderStatus === 'Dispatched') {
                        echo '
                        <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                    </div>
                    <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-config"></i></div>
                        </div>
                        <h4 class="step-title">Processing Order</h4>
                    </div>
                    <div class="step completed ">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-medal"></i></div>
                        </div>
                        <h4 class="step-title">Quality Check</h4>
                    </div>
                    <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-car"></i></div>
                        </div>
                        <h4 class="step-title">Product Dispatched</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-home"></i></div>
                        </div>
                        <h4 class="step-title">Product Delivered</h4>
                    </div>
                        ';
                    } elseif ($orderStatus === 'Delivered') {
                        echo '
                        <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                    </div>
                    <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-config"></i></div>
                        </div>
                        <h4 class="step-title">Processing Order</h4>
                    </div>
                    <div class="step completed ">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-medal"></i></div>
                        </div>
                        <h4 class="step-title">Quality Check</h4>
                    </div>
                    <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-car"></i></div>
                        </div>
                        <h4 class="step-title">Product Dispatched</h4>
                    </div>
                    <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="pe-7s-home"></i></div>
                        </div>
                        <h4 class="step-title">Product Delivered</h4>
                    </div>
                        ';
                    }
                    ?>

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