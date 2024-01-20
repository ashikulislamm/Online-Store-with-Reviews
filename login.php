<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Store with Reviews</title>

    <!----------------Custom CSS-------------------------->
    <link rel="stylesheet" href="asset/css/style.css" />
    <!-------------------Favicon------------------------->
    <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />
    <!-----------Sweet Alert-------------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-------------------BootStrap CSS------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!--Font Awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .loginsuccess {
            color: green;
        }
    </style>
</head>

<body>
    <!------header--------->
    <?php include 'nav.php'; ?>

    <div class="formbox" id="login">
        <?php
        include 'config.php';
        if (isset($_POST['login'])) {
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $result = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND user_password='$password'") or die("Select Error");
            $row = mysqli_fetch_assoc($result);
            $_SESSION['valid'] = null;
            $_SESSION['id'] = null;
            if (is_array($row) && !empty($row)) {
                $_SESSION['valid'] = true;
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_address'] = $row['user_address'];
                $_SESSION['active_orders'] = $row['active_orders'];
                $_SESSION['user_id'] = $row['user_id'];
            } else { 
                echo '
                <script>
                    swal({
                        title: "Login Failed!",
                        text: "Please enter correct Email and Password!",
                        icon: "error",
                        button: "Try Again!",
                    });
                </script>
                ';
            }

            if (isset($_SESSION['valid'])) {
                $_SESSION['id'] = $_SESSION['user_id'];
                echo '<script>window.location="index.php"</script>';
                exit();
            }
        } //else {

        ?>
        <form action="" class="login__form" method="post">
            <h2 class="login__title">Log In</h2>

            <div class="login__group">
                <div>
                    <label for="email" class="login__label">Email</label>
                    <input type="email" required placeholder="Write your email" id="email" class="login__input" name="email" />
                </div>

                <div>
                    <label for="password" class="login__label">Password</label>
                    <input type="password" required placeholder="Enter your password" id="password" class="login__input" name="password" />
                </div>
            </div>

            <div>
                <p class="login__signup">
                    You do not have an account? <a href="/signup.php">SIGNUP</a>
                </p>

                <a href="#" class="login__forgot"> You forgot your password </a>

                <button type="submit" class="login__button" name="login">Log In</button>
            </div>
        </form>
        <?php //} 
        ?>
    </div>
    <!--Footer Section-->

    <?php include 'footer.php'; ?>
</body>

</html>