<?php 
//include_once("connection.php");
require_once 'init.php';
include_once("auth/template/head.php");
$prodottoCercato = "";
if(isset($_POST["prodottoCercato"])){
    $prodottoCercato = $_POST["prodottoCercato"];     // ricerca di un prodotto nella barra
}
?>
<body>
     <?php
      include_once("auth/template/header.php");
     ?>

    <!-- slider section -->
    <section class="slider_section position-relative">
    <div class="slider_bg_box">
      <img src="img/bg/prodotti-bg.jpg" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
      <div class="col-md-9 col-lg-8">
        <div class="detail-box">
          <h1 style="color: white;">

          <form action="" method="POST">
        <input type="text" placeholder="cerca..." name="prodottoCercato">
        <button type="submit" class="slider-link" >cerca</button>   <!--onclick="scrollToElement('scroll-to')-->
      </form>
          Il tempo è prezioso,
            <br> i nostri orologi lo rendono ancora più speciale
          </h1>
          <p>
          Ogni secondo conta, scegli un orologio che ti rappresenta, disponibilità immediata 
          e spedizione con pagamento alla consegna
          </p>
          <div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Nostri Prodotti
        </h2>
      </div>
      <?php


if($prodottoCercato != ""){    //se utente ha cercato qualcosa 
  $productManager = new ProductManager();
  $prodotti = $productManager->getLike("$prodottoCercato");  //tutti i prodotti
  
  foreach($prodotti as $prodotto): 
    echo "
    <div class='col-sm-6 col-md-4 col-lg-3 id='scroll-to''>
          <div class='box'>
            <a href="."pagProdotto.php?id='$prodotto->Codice'".">
              <div class='img-box'>
               <img src='img/product/".$prodotto->IMG."' alt=''>
              </div>
              <div class='detail-box'>
                <h6>
                  ".$prodotto->Titolo."
                </h6>
                <h6>
                  Prezzo
                  <span>
                  ".$prodotto->Prezzo."
                  </span>
                </h6>
              </div>
              <div class='new'>
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>";   
  endforeach;
}
      


  $productManager = new ProductManager();
  $products = $productManager->getAll();  //tutti i prodotti
  
  foreach($products as $product): 
    echo "
    <div class='col-sm-6 col-md-4 col-lg-3 id='scroll-to''>
          <div class='box'>
            <a href="."pagProdotto.php?id='$product->Codice'".">
              <div class='img-box'>
               <img src='img/product/".$product->IMG."' alt=''>
              </div>
              <div class='detail-box'>
                <h6>
                  ".$product->Titolo."
                </h6>
                <h6>
                  Prezzo
                  <span>
                  ".$product->Prezzo."
                  </span>
                </h6>
              </div>
              <div class='new'>
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>";   
  endforeach;

      ?>
  </section>
 <?php
  include_once("auth/template/infoSection.php");
  include_once("auth/template/footer.php");

 ?>