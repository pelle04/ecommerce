<?php 
include("init.php");
include_once("auth/template/head.php");
?>

<body>
      <!-- header-->
  <?php
  include_once("auth/template/header.php");
  ?>

    <!-- slider section -->
    <section class="slider_section position-relative">
    <div class="slider_bg_box">
      <img src="img/bg/log-bg.jpg" alt="">
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
          <form action="chklogin.php" method="POST">
          <h5>non sei ancora registrato?</h5>
          <a href='registrazione.php' class="slider-link">registrazione</a><br><br>
          <input type="text" id="login" name="email" placeholder="email"><br>
          <input type="password" id="password" name="password" placeholder="password"><br>
          <input type="submit" value="vai" class="slider-link"><br>
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
