<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Store with Reviews</title>

    <!----------------Custom CSS-------------------------->
    <link rel="stylesheet" href="asset/css/style.css" />
    <!-----------------FavIcon---------------------------->
    <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />

    <!-------------------BootStrap CSS------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!--Font Awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-------Header------>
    <?php include 'nav.php'; ?>

    <div class="formbox" id="login">
    <?php
    include "config.php";

    $username = "";
    $email = "";
    $password = "";
    $address = "";
    $active_order = 0;

    if (isset($_POST['signup'])){
        $username = $_POST['Name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['Address'];

        // verifying unique email
        $verify_query = mysqli_query($con, "SELECT email FROM user WHERE email = '$email'");

        if(mysqli_num_rows($verify_query) != 0){
            echo "<div class='message'>
            <p>This Email is used by another user! </p><br>
            <a href='signup.php' class='nested-button-link'><button class='nested-button'>Back</button></a>
            </div> <br>";
        } else {
            mysqli_query($con, "INSERT INTO user(user_name, email, user_password, user_address, active_orders) VALUES ('$username', '$email', '$password', '$address', '$active_order')") or die("Error Occurred");
           echo "<div class='message'>
            <p>Welcome to our Store</p><br>
            <a href='login.php' class='nested-button-link'><button class='nested-button'>Back</button></a>
            </div> <br>";
        }
    } else {
        
    
?>

        <form action="" class="login__form" method="post">
            <h2 class="login__title">SIGNUP</h2>

            <div class="login__group">
                <div>
                    <label for="Name" class="login__label">Name</label>
                    <input type="text" placeholder="Write your name" id="fname" class="login__input" name="Name" required/>
                </div>
                <div>
                    <label for="Address" class="login__label">Address</label>
                    <input type="text" placeholder="Write your Address" id="phone" class="login__input" name="Address" required/>
                </div>
                <div>
                    <label for="email" class="login__label">Email</label>
                    <input type="email" placeholder="Write your email" id="email" class="login__input" name="email" required/>
                </div>

                <div>
                    <label for="password" class="login__label">Password</label>
                    <input type="password" placeholder="Enter your password" id="password" class="login__input"  name="password" required/>
                </div>
            </div>

            <div>
                <p class="login__signup">
                    Already have an account? <a href="/login.php">LOGIN</a>
                </p>
                <button type="submit" class="login__button" name="signup">Sign Up</button>
            </div>
        </form>
        <?php } ?>
    </div>

    <!--Footer Section-->

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="asset/js/main.js"></script>
</body>

</html>


