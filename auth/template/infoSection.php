
<html>
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
</html>
