<?php
session_start();
include_once("init.php");
include_once("auth/template/head.php");
?>

<body>
  <!-- header-->
  <?php
  include("auth/template/header.php");
  error_reporting(E_ALL ^ E_WARNING);



  //echo $_SESSION["admin"];
  

  ?>

  <!-- slider section -->
  <section class="slider_section position-relative">
    <div class="slider_bg_box">
      <img src="img/bg/slider-bg.jpg" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
      <div class="col-md-9 col-lg-8">
        <div class="detail-box">
          <h1 style="color: white;">
            Il tempo è prezioso,
            <br> i nostri orologi lo rendono ancora più speciale
          </h1>
          <p>
            Ogni secondo conta, scegli un orologio che ti rappresenta, disponibilità immediata
            e spedizione con pagamento alla consegna
          </p>
          <div>
            <a href="prodotti.php" class="slider-link">Shop Now</a>
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
          <div class="img-box">
            <img src="img/about.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              Il nostro negozio è stato fondato con l'obiettivo di offrire ai nostri clienti una vasta scelta di orologi
              esclusivi e di design, adatti a tutte le esigenze e ai diversi stili di vita. Ci impegniamo a fornire ai
              nostri clienti un'esperienza di acquisto online facile e sicura, accompagnata da un servizio clienti
              impeccabile. </p>
            <a href="blog.php">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  include_once("auth/template/infoSection.php");
  include_once("auth/template/footer.php");
  ?>