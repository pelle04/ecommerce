<?php 
include_once("auth/template/header.php");
require_once 'init.php';
include_once("auth/template/head.php");
include_once("classi/carrello.php");
?>
<html>
    <?php
        include_once("auth/template/header.php");
     ?>
</html>
<body>  
<style>
  body {
    background-color: black;
    color: white;
  }
</style>
</body>

<div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12 pt-3">
           
            <div class="d-flex flex-column pt-4">
                <div><h5 class="text-uppercase font-weight-normal"></h5></div>
                <div class="font-weight-normal"></div> <!--numero di item -->
            </div>
            <div class="d-flex flex-row px-lg-5 mx-lg-5 mobile" id="heading">
                <div class="px-lg-5 mr-lg-5" id="produc">PRODUCTS</div>
                <div class="px-lg-5 ml-lg-5" id="prc">PRICE</div>
                <div class="px-lg-5 ml-lg-1" id="quantity">QUANTITY</div>
                <div class="px-lg-5 ml-lg-3" id="total">TOTAL</div>
                
            </div>

          <?php
            if(isset($_COOKIE["carrello"]) && $_COOKIE["carrello"] != "") {///se ho aggiunto un prodotto 
              $cart = new CartManager();
              $idUtente = $_SESSION["idUtente"];
              $prodotti =$cart->visualizzaCarrello();
              $cartID = $cart->getCarrelloID($idUtente);
              foreach($prodotti as $prodotto):
                echo "
                <div class='d-flex flex-row justify-content-between align-items-center pt-lg-4 pt-2 pb-3 border-bottom mobile'>
                <div class='d-flex flex-row align-items-center'>
                    <div><img src='img/product/".$prodotto->IMG."' width='150' height='150' alt='' id='image'></div>
                    <div class='d-flex flex-column pl-md-3 pl-1'>
                        <div><h6></h6>".$prodotto->Titolo."</div>
                        <div >Art.No:<span class='pl-2'".$prodotto->Marca."</span></div>
                        <div>Color:<span class='pl-3'>".$prodotto->Descrizione."</span></div>
                    </div>                    
                </div>
                <div class='pl-md-0 pl-1'><b>".$prodotto->Prezzo."$</b></div>
                <div class='pl-md-0 pl-2'>
                <a href='removeCart.php?quantita=1&idProdotto=".$prodotto->Codice."'>
                <span class='fa fa-minus-square text-secondary'></span>
                </a>


                <span class='px-md-3 px-1'>".$prodotto->Quantita."</span>
                <a href='addCart.php?quantita=1&idProdotto=".$prodotto->Codice."'>
                <span class='fa fa-plus-square text-secondary'></span>
                </a>
     
      
                </div>
                <div class='pl-md-0 pl-1'><b></b></div>  
                <div class='close'>&times;</div>
            </div>
                
                ";
              endforeach;
            }else{
              echo "non hai niente nel carrello";
            }


          ?>
            <form method="POST" action="pagCheckout.php">
            <button type="submit" class="slider-link" >checkout</button>   
            </form>
        </div>
    </div>
</div>


<?php
        include_once("auth/template/infoSection.php");
        include_once("auth/template/footer.php");
        include_once("auth/template/footer.php");
?>