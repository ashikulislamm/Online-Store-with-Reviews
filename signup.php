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
        <form action="" class="login__form">
            <h2 class="login__title">SIGNUP</h2>

            <div class="login__group">
                <div>
                    <label for="Name" class="login__label">Name</label>
                    <input type="text" placeholder="Write your name" id="fname" class="login__input" />
                </div>
                <div>
                    <label for="Age" class="login__label">Number</label>
                    <input type="tel" placeholder="Write your phone number" id="phone" class="login__input" />
                </div>
                <div>
                    <label for="email" class="login__label">Email</label>
                    <input type="email" placeholder="Write your email" id="email" class="login__input" />
                </div>

                <div>
                    <label for="password" class="login__label">Password</label>
                    <input type="password" placeholder="Enter your password" id="password" class="login__input" />
                </div>
            </div>

            <div>
                <p class="login__signup">
                    Already have an account? <a href="/login.php">LOGIN</a>
                </p>
                <button type="submit" class="login__button">Sign Up</button>
            </div>
        </form>
    </div>

    <!--Footer Section-->

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="asset/js/main.js"></script>
</body>

</html>