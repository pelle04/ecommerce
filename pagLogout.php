<?php 
session_start();
include("connection.php");
include("chkSession.php");
include("prodotto.php");
include("ClassCarrello.php");
?>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>pelleClock</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>
<body>
      <!-- header-->
      <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.php">
          <span>
            pelleClock
          </span>
        </a>
        <div class="" id="">
          <div class="custom_menu-btn">
            <button onclick="openNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="index.php">Home</a>
                <?php
                if(!$_SESSION["loggato"]){  //se non sono loggato login/signin
                    echo "<a href='login.php'>login</a>";
                }else {                     //se sono loggato carrello / account
                    echo "<a href='pagCarrello.php'>carrello</a>";
                    echo "<a href='account.php'>account</a>";
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

    <!-- slider section -->
    <section class="slider_section position-relative">
    <div class="slider_bg_box">
      <img src="img/bg/logout-bg.jpg" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
      <div class="col-md-9 col-lg-8">
        <div class="detail-box">
        <h1 style="color: white;">
              
            <br> 
          </h1>

          <div>
            <a href="logout.php" class="slider-link">esci</a>
          </div>
        </div>
      </div>
    </div>
  </section>
 

  <!--about-->
  <section class="about_section  ">
    <div class="container">
      <div class="row">
      <div class="col-md-6">
  <div class="img-box" style="float: left;">
    <img src="img/about.jpg" alt="">
  </div>
</div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Garanzie 
              </h2>
            </div>
            <p>
            Il nostro negozio è stato fondato con l'obiettivo di offrire ai nostri clienti una vasta scelta di orologi esclusivi e di design, adatti a tutte le esigenze e ai diversi stili di vita. Ci impegniamo a fornire ai nostri clienti un'esperienza di acquisto online facile e sicura, accompagnata da un servizio clienti impeccabile.            </p>
            <a href="garanzie.php">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row info_form_social_row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">

          <div class="social_box">
            <a href="https://it-it.facebook.com">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="https://it-it.facebook.com">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="https://it.linkedin.com">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="row info_main_row">
        <div class="col-md-6 col-lg-3">
          <div class="info_links">
            <h4>
              Menu
            </h4>
            <div class="info_links_menu">
              <a href="index.php">Home</a>
            <?php
                if(!$_SESSION["loggato"]){  //se non sono loggato login/signin
                    echo "<a href='login.php'>login</a>";
                }else {                     //se sono loggato carrello / account
                    echo "<a href='pagCarrello.php'>carrello</a>";
                    echo "<a href='account.php'>account</a>";
                }
            ?>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_insta">
            <h4>
              Instagram
            </h4>
            <div class="insta_box">
              <div class="img-box">
                <img src="img/p1.png" alt="">
              </div>
              <p>
                aggiornato sulle nuove uscite con i nostri social
              </p>
            </div>
            <div class="insta_box">
              <div class="img-box">
                <img src="img/p2.png" alt="">
              </div>
              <p>
               aggiornato sulle nuove uscite con i nostri social
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_detail">
            <h4>
              About Us
            </h4>
            <p class="mb-0">
            Il nostro negozio è stato fondato con l'obiettivo di offrire ai nostri clienti una vasta scelta di orologi esclusivi e di design, adatti a tutte le esigenze e ai diversi stili di vita. Ci impegniamo a fornire ai nostri clienti un'esperienza di acquisto online facile e sicura, accompagnata da un servizio clienti impeccabile.            </p>
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <h4>
            Contact Us
          </h4>
          <div class="info_contact">
          <a href="https://www.google.it/maps/place/Via+Fratelli+Rosselli,+17,+20833+Giussano+MB,+Italia">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Location
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call +39 3911882713
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope"></i>
              <span>
                pelleclock@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
         pelleclock srl
      </p>
    </div>
  </footer>
  <!-- footer section -->


  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>



</body>

</html>
<html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>