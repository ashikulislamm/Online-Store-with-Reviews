<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Store with Reviews</title>
  <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon" />
  <!-------------------BootStrap CSS------------------->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <!--Font Awsome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600&display=swap");

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      display: grid;
      grid-template-rows: auto 1fr auto;
      font-size: 14px;
      background-color: #f4f4f4;
      align-items: start;
      min-height: 100vh;
    }

    .footer {
      display: flex;
      flex-flow: row wrap;
      padding: 50px 30px 20px 30px;
      color: #2f2f2f;
      background-color: hsl(230, 100%, 98%);
      border-top: 1px solid #e5e5e5;
      margin-top: 10px;
    }

    .footer>* {
      flex: 1 100%;
    }

    .footer__addr {
      margin-right: 1.25em;
      margin-bottom: 2em;
    }

    .footer__logo {
      font-family: "Syne", sans-serif;
      font-weight: 400;
      text-transform: uppercase;
      font-size: 1.5rem;
    }

    .footer__addr h2 {
      margin-top: 1.3em;
      font-size: 15px;
      font-weight: 400;
    }

    .navvv__title {
      font-weight: 400;
      font-size: 15px;
    }

    .footer address {
      font-style: normal;
      color: #999;
    }

    .footer__btn {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 36px;
      max-width: max-content;
      background-color: hsl(230, 75%, 56%);
      border-radius: 100px;
      color: white;
      line-height: 0;
      margin: 0.6em 0;
      font-size: 1rem;
      padding: 0 1.3em;
      transition: 0.4s;
    }

    .footer__btn:hover {
      color: white !important;
      box-shadow: 0 4px 24px hsla(230, 75%, 40%, 0.4) !important;
    }

    .footer ul {
      list-style: none;
      padding-left: 0;
    }

    .footer li {
      line-height: 2em;
    }

    .footer a {
      text-decoration: none;
    }

    .footer__navvv {
      display: flex;
      flex-flow: row wrap;
    }

    .footer__navvv>* {
      flex: 1 50%;
      margin-right: 1.25em;
    }

    .footer__navvv li a:hover {
      transition: 0.5s;
      color: hsl(230, 75%, 56%);
    }

    .navvv__ul a {
      color: #999;
      text-decoration: none;
    }


    .legal {
      display: flex;
      flex-wrap: wrap;
      color: #999;
      justify-content: center;
      font-family: "Syne", sans-serif;
    }

    .legal__links {
      display: flex;
      align-items: center;
    }

    .heart {
      color: #2f2f2f;
    }

    .subdiv {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      z-index: var(--z-modal);
      backdrop-filter: blur(24px);
      visibility: hidden;
    }

    .show_sub {
      visibility: visible;
    }

    .subs {
      width: calc(100% - 20px);
      max-width: 650px;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .sub_close {
      position: absolute;
      top: 15px;
      right: 30px;
      border: none;
      color: black;
      background: transparent;
      font-size: 20px;
    }

    .subs {
      background: hsl(230, 100%, 98%);
      box-shadow: 0 8px 32px hsla(230, 75%, 15%, 0.2);
      border-radius: 20px;
      display: grid;
      gap: 10px;
      padding: 50px 40px 40px;
      grid-template-columns: repeat(2, 1fr);
    }

    .subs .left {
      display: flex;
      align-items: center;
    }

    .subs .left img{
      border-radius: 20px;
    }

    .subs .right h3 {
      color: hsl(230, 75%, 56%);
      font-size: 22px;
      text-align: center;
      font-family: "Syne", sans-serif;
    }

    .subs .right p {
      font-size: 15px;
      font-family: "Syne", sans-serif;
      text-align: center;
    }

    .subform input {
      width: 100%;
      padding: 1rem;
      border-radius: 0.5rem;
      border: 2px solid hsl(230, 75%, 56%);
      margin-bottom: 10px;
    }

    .subbtn button {
      width: 100%;
      background: hsl(230, 75%, 56%);
      color: white;
      padding: 0.75rem;
      border-radius: 0.5rem;
      cursor: pointer;
      margin-top: 10px;
    }

    .subbtn button:hover {
      transition: 0.4s;
      box-shadow: 0 4px 24px hsla(230, 75%, 40%, 0.4);
    }

    @media screen and (max-width : 580px) {
      .subs {
        grid-template-columns: repeat(1, 1fr);
      }

    }

    @media screen and (min-width: 24.375em) {
      .legal .legal__links {
        margin-left: auto;
      }
    }

    @media screen and (min-width: 40.375em) {
      .footer__navvv>* {
        flex: 1;
      }

      .navvv__item--extra {
        flex-grow: 2;
      }

      .footer__addr {
        flex: 1 0px;
      }

      .footer__navvv {
        flex: 2 0px;
      }
    }
  </style>

</head>

<body>
  <footer class="footer">
    <div class="footer__addr">
      <h1 class="footer__logo">Online Store With Reviews</h1>
      <h2>Contact</h2>
      <address>
        Tejgoan , Dhaka. Bangladesh<br>
        <button type="button" class="footer__btn" id="footer__btn">Subscribe</button>
      </address>
    </div>

    <ul class="footer__navvv">
      <li class="navvv__item">
        <h2 class="navvv__title">Quick Links</h2>

        <ul class="navvv__ul">
          <li>
            <a href="/index.php">About Us</a>
          </li>
          <li>
            <a href="/product.php">Products</a>
          </li>
          <li>
            <a href="/on_sale.php">On Sale</a>
          </li>
          <li>
            <a href="#">Blog</a>
          </li>
        </ul>
      </li>
      <li class="navvv__item">
        <h2 class="navvv__title">Legal</h2>

        <ul class="navvv__ul">
          <li>
            <a href="#">Privacy Policy</a>
          </li>

          <li>
            <a href="#">Terms & Condition</a>
          </li>

          <li>
            <a href="#">Refund Policy</a>
          </li>
        </ul>
      </li>
    </ul>
    <div class="legal">
      <p>&copy; 2023.All rights reserved.</p>
    </div>
  </footer>
  <div class="subdiv" id="subdiv">
    <div class="subs">
      <div class="left">
        <img src="/asset/images/newsletter.jpg" alt="">
      </div>
      <div class="right">
        <h3>Subscribe for Newsletter</h3>
        <p>Subscribe for latest offers and news</p>
        <div class="subform">
          <input type="email" id="subsemail" placeholder="Enter your email">
        </div>
        <div class="subbtn">
          <button class="subscribe">Subscribe</button>
        </div>
      </div>
      <button type="button" class="sub_close" id="sub_close"><i class="fa-solid fa-xmark" id="sub_close"></i></button>
    </div>
  </div>
  <script src="/asset/js/footer.js"></script>
</body>

</html>