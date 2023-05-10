<?php
session_start();
require_once 'init.php';
include_once("classi/carrello.php");

?>
<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <style>
      * {
      box-sizing: border-box;
    }

    body {
        background-color: black;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    label{
        color: white;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
    }

    .left-column {
      width: 60%;
      float: left;
    }

    .right-column {
      width: 40%;
      float: right;
      background-color: black;
      color: white;
      padding: 20px;
      border-radius: 5px;
    }

    h1 {
        color: white;
      text-align: center;
    }

    .checkout-form {
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="tel"],
    .form-group select {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }

    @media screen and (max-width: 768px) {
      .left-column,
      .right-column {
        width: 100%;
        float: none;
      }
    }
      </style>
</head>
<body>


<div class="container">
    <div class="left-column">
      <h1>Checkout</h1>
      <form class="checkout-form" action="process_checkout.php" method="post">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" id="name" name="nome" required value="<?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="address">Indirizzo</label>
        <textarea id="address" name="address" required></textarea>
      </div>
      <div class="form-group">
        <label for="payment-method">Metodo di pagamento</label>
        <select id="payment-method" name="metodoPagamento" required>
          <option value="">Seleziona il metodo di pagamento</option>
          <option value="credit-card">Carta di credito</option>
          <option value="paypal">PayPal</option>
          <option value="bank-transfer">Bonifico bancario</option>
        </select>
      </div>
      </form>
    </div>
    <div class="right-column">
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
                      <div ><span class='pl-2'".$prodotto->Marca."</span></div>
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
    </div>
     <a href="checkOut.php">compra</a>
    
  </div>


</body>
</html>