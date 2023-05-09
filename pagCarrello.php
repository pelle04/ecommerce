<?php 
session_start();
include_once("connection.php");
include_once("chkSession.php");

if (isset($_POST['aggiungi_al_carrello'])) {
    $prodotto = $_POST['prodotto'];
    $quantita = $_POST['quantita'];
  
    // Esegui le operazioni desiderate con i dati ricevuti dal form
    // Ad esempio, puoi aggiungere il prodotto al carrello o salvarlo nel database

    //2--> sistemo il db 
   

    //3--> impagino

    //sistemo il db
  
    // Esempio di output dei dati ricevuti
    echo "Prodotto: " . $prodotto . "<br>";
    echo "Quantità: " . $quantita . "<br>";
  }
?>
<html>
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
  <link href="css/InputType.css" rel="stylesheet" />
</head>

</html>
<body>  
<style>
  body {
    background-color: black;
    color: white;
  }


</style>
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
                                    //se sono loggato carrello / account
                    echo "<a href='account.php'>account</a>";
                    echo "<a href='logout.php'>logout</a>";
                
                ?>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
</body>

<div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12 pt-3">
           
            <div class="d-flex flex-column pt-4">
                <div><h5 class="text-uppercase font-weight-normal"></h5></div>
                <div class="font-weight-normal">2 items</div>
            </div>
            <div class="d-flex flex-row px-lg-5 mx-lg-5 mobile" id="heading">
                <div class="px-lg-5 mr-lg-5" id="produc">PRODUCTS</div>
                <div class="px-lg-5 ml-lg-5" id="prc">PRICE</div>
                <div class="px-lg-5 ml-lg-1" id="quantity">QUANTITY</div>
                <div class="px-lg-5 ml-lg-3" id="total">TOTAL</div>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center pt-lg-4 pt-2 pb-3 border-bottom mobile">
                <div class="d-flex flex-row align-items-center">
                    <div><img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" width="150" height="150" alt="" id="image"></div>
                    <div class="d-flex flex-column pl-md-3 pl-1">
                        <div><h6>COTTON T-SHIRT</h6></div>
                        <div >Art.No:<span class="pl-2">091091001</span></div>
                        <div>Color:<span class="pl-3">White</span></div>
                        <div>Size:<span class="pl-4"> M</span></div>
                    </div>                    
                </div>
                <div class="pl-md-0 pl-1"><b>$9.99</b></div>
                <div class="pl-md-0 pl-2">
                    <span class="fa fa-minus-square text-secondary"></span><span class="px-md-3 px-1">2</span><span class="fa fa-plus-square text-secondary"></span>
                </div>
                <div class="pl-md-0 pl-1"><b>$19.98</b></div>
                <div class="close">&times;</div>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center pt-4 pb-3 mobile">
                <div class="d-flex flex-row align-items-center">
                    <div><img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" width="150" height="150" alt="" id="image"></div>
                    <div class="d-flex flex-column pl-md-3 pl-1">
                        <div><h6>WHITE T-SHIRT</h6></div>
                        <div >Art.No:<span class="pl-2">056289891</span></div>
                        <div>Color:<span class="pl-3">White</span></div>
                        <div>Size:<span class="pl-4"> XL</span></div>
                    </div>                    
                </div>
                <div class="pl-md-0 pl-1"><b>$20.9</b></div>
                <div class="pl-md-0 pl-2">
                    <span class="fa fa-minus-square text-secondary"></span><span class="px-md-3 px-1">2</span><span class="fa fa-plus-square text-secondary"></span>
                </div>
                <div class="pl-md-0 pl-1"><b>$41.8</b></div>
                <div class="close">&times;</div>
            </div>
            <form method="POST" action=checkOut.php>
            <button type="submit" class="slider-link" >checkout</button>   
            </form>
        </div>
    </div>
</div>




 <!-- info section -->
 <section class="info_section layout_padding2">
    <div class="container">
      <div class="row info_form_social_row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
           
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
                if(!isset($_SESSION["loggato"])){  //se non sono loggato login/signin
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