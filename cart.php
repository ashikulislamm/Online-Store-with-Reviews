<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    addToCart($productId);
    header("Location: index.php");
    exit();
}

function addToCart($productId) {

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!in_array($productId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productId;
    }
}
?>

</body>
</html>