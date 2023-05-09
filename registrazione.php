<?php 
require_once 'init.php';
include_once("auth/template/head.php");
?>

<body>
<?php
      include_once("auth/template/header.php");
     ?>

    <!-- slider section -->
    <section class="slider_section position-relative">
    <div class="slider_bg_box">
      <img src="img/bg/signin-bg.jpg" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
      <div class="col-md-9 col-lg-8">
        <div class="detail-box">
          <h1 style="color: white;">
            <br> 
          </h1>
          <p>

          </p>
          <div class="col-md-8 col-lg-9">
          <div class="info_form">
          <form action="chkRegistrazione.php" method="POST">  
      <input type="text" id="nome" name="nome" placeholder="nome"><br>
      <input type="text" id="cognome" name="cognome" placeholder="cognome"><br>
      <input type="email" id="email" name="email" placeholder="email"><br>
      <input type="date" id="dataNascita" name="dataNascita" placeholder="dataNascita"><br>
      <input type="password" id="password" name="password" placeholder="password"><br>
      <input type="submit"  class="slider-link" value="Registrati">
    </form>
        </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include_once("auth/template/infoSection.php");
  include_once("auth/template/footer.php");

 ?>