<?php
include_once("connection.php");

include_once("auth/template/head.php");
$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];     // ricerca di un prodotto nella barra
}
?>
<!DOCTYPE html>
<html lang="it">
  
    <body>
    <style>
  body {
    background-color: black;
    color: white;
  }
</style>
     <?php
        include_once("auth/template/header.php");
     ?>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    
                        <?php
                        
                        $sql = "SELECT * from articoli where Codice=$id";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){ 
                                echo "
                                <div class='col-md-6'><img class='card-img-top mb-5 mb-md-0' src='img/product/".$row["IMG"]."' alt=''></div>
                                 <div class='col-md-6'>
                                <div class='small mb-1'></div>
                        <h1 class='display-5 fw-bolder'>".$row['Titolo']."</h1>
                        <div class='fs-5 mb-5'>
                            <span class='text-decoration-line-through'>".$row['Prezzo']."$</span>                            
                        </div>
                        <p class='lead'>".$row['Descrizione']."</p>
                        <div class='d-flex'>

                        <form action='pagCarrello.php' method='POST'>
                        <input type='hidden' name='prodotto' value='".$row['Titolo']."'>
                        <input name='quantita' class='form-control text-center me-3' id='inputQuantity' type='num' value='1' style='max-width: 3rem'/>
                        <input type='submit' name='aggiungi_al_carrello' value='aggiungi al carrello' class='btn btn-outline-dark flex-shrink-0'><br>
                      </form>               
                        </div>
                                
                                ";

                            }}
                        ?>
                        
                    </div>
                </div>
            </div>
        </section>
       
     <?php
        include_once("auth/template/infoSection.php");
        include_once("auth/template/footer.php");
        include_once("auth/template/footer.php");
     ?>



