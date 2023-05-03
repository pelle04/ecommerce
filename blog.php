<?php 
session_start();
include("connection.php");
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
                    echo "<a href='registrazione.php'>sign in</a>";
                }else {                     //se sono loggato carrello / account
                    echo "<a href='pagCarrello.php'>carrello</a>";
                    echo "<a href='account.php'>account</a>";
                    echo "<a href='pagLogout.php'>logout</a>";
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
      <img src="img/bg/blog-bg.jpg" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
      <div class="col-md-9 col-lg-8">
        <div class="detail-box">
          <h1 style="color: white;">
          motivi per cui gli orologi di lusso sono un investimento intelligente
            <br> 
          </h1>
          <p>

          </p>
          
        </div>
      </div>
    </div>
  </section>
  <!--about-->
  <section class="about_section  ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="img/brandLogo/hublotMarchio.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
            
              </h2>
            </div>
            <p>
                
Se stai cercando un investimento che combini la bellezza, la funzionalità e il valore, gli orologi di lusso sono un'opzione intelligente da considerare. Sebbene questi orologi possano essere costosi, la loro qualità e il loro design eccezionali li rendono una scelta di investimento affidabile e sicura. In questo articolo, esploreremo i motivi per cui gli orologi di lusso sono un investimento intelligente e come potrebbero rappresentare un'ottima scelta per chi cerca di investire in un prodotto di alta qualità.

Materiali di alta qualità
Gli orologi di lusso sono spesso realizzati con materiali di alta qualità, come l'oro, l'argento, il platino e il titanio. Questi materiali non solo conferiscono all'orologio un aspetto sofisticato, ma ne aumentano anche il valore nel tempo. Gli orologi di lusso sono spesso progettati per durare a lungo, il che significa che possono diventare patrimonio di famiglia, passando di generazione in generazione.

Artigianato e design di alta qualità
Gli orologi di lusso sono spesso considerati vere opere d'arte. Il loro design è curato nei minimi dettagli e l'artigianato utilizzato per crearli è di altissimo livello. Gli orologi di lusso sono spesso prodotti in quantità limitata, il che li rende unici e molto ricercati da collezionisti e appassionati. Questa limitazione di produzione aumenta il loro valore nel tempo.

Valore di rivendita
Gli orologi di lusso mantengono spesso il loro valore nel tempo e possono addirittura aumentarlo. Sebbene il valore di un orologio dipenda da vari fattori, tra cui la sua rarità, il modello, la marca e le condizioni in cui è conservato, gli orologi di lusso sono generalmente considerati un investimento solido. Se si sceglie un orologio di una marca di prestigio, il valore può aumentare ancora di più nel tempo.

Investimento sicuro
Gli orologi di lusso sono un investimento sicuro, poiché il loro valore tende a rimanere stabile o addirittura a crescere nel tempo. Ciò significa che un orologio di lusso potrebbe rappresentare un'ottima scelta di investimento a lungo termine. Tuttavia, è importante ricordare che ogni investimento comporta rischi e che i risultati possono variare.

Passione e divertimento
Gli orologi di lusso possono essere molto divertenti e appaganti da possedere. Molte persone sono appassionate di orologi e possono trascorrere ore a studiare i modelli, le marche e le caratteristiche. Gli orologi di lusso possono rappresentare una vera e propria passione, che può portare molta soddisfazione a chi li possiede. Inoltre, possedere un orologio di lusso può migliorare il proprio status sociale e far sentire la persona più sicura di sé.
           <br> <a href="prodotti.php">
              Compra Ora
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