<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Store with Reviews</title>
  <!----------------Custom CSS-------------------------->
  <link rel="stylesheet" href="asset/css/style.css" />
  <!----------------Favicon-------------------------->
  <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />
  <!-------------------BootStrap CSS------------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-------------------Font Awsome---------------------------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <!------------------Header Section------------------------->
  <?php include 'nav.php'; ?>
  <br><br>
  <section>
    <div class="row">
      <h1 class="title our_team">Meet Our Team Members</h1>
    </div>
    <div class="row">
      <!-- Column 1-->
      <div class="column">
        <div class="card">
          <div class="img-container">
            <img src="/asset/images/us/dona.jpg" />
          </div>
          <div class="info">
            <h3>Afia Fahmida</h3>
            <p>ID : 20210104032</p>
          </div>
          <div class="icons">
            <a href="https://www.linkedin.com/in/afia-fahmida-1b1b65243/" target="_blank">
              <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/afiafahmida" target="_blank">
              <i class="fab fa-github"></i>
            </a>
            <a href="https://www.facebook.com/afiafahmida.dona" target="_blank">
              <i class="fa-brands fa-facebook"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- Column 2-->
      <div class="column">
        <div class="card">
          <div class="img-container">
            <img src="/asset/images/us/ashik.jpg" />
          </div>
          <div class="info">
            <h3>Ashikul Islam</h3>
            <p>ID : 20210104040</p>
          </div>
          <div class="icons">
            <a href="https://www.linkedin.com/in/ashikul-islam-780/" target="_blank">
              <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/ashikulislamm" target="_blank">
              <i class="fab fa-github"></i>
            </a>
            <a href="https://www.facebook.com/ashikl.me/" target="_blank">
              <i class="fa-brands fa-facebook"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- Column 3-->
      <div class="column">
        <div class="card">
          <div class="img-container">
            <img src="/asset/images/us/zenun.jpg" />
          </div>
          <div class="info">
            <h3>Zenun Chowdhury</h3>
            <p>ID : 20210104047</p>
          </div>
          <div class="icons">
            <a href="https://www.linkedin.com/in/zenun-chowdhury-770629223/" target="_blank">
              <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/zenuncrack" target="_blank">
              <i class="fab fa-github"></i>
            </a>
            <a href="https://www.facebook.com/profile.php?id=100009391418444" target="_blank">
              <i class="fa-brands fa-facebook"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!---------------------Footer Section---------------------->
  <?php include 'footer.php'; ?>

</body>

</html>