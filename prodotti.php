<?php 
session_start();
include("connection.php");
include("prodotto.php");
include("ClassCarrello.php");
$prodottoCercato = "";
if(isset($_POST["prodottoCercato"])){
    $prodottoCercato = $_POST["prodottoCercato"];     // ricerca di un prodotto nella barra
}
?>

<form action="" method="POST">
        <input type="text" placeholder="cerca..." name="prodottoCercato">
        <button type="submit">cerca</button>
</form>

<?php

    //impaginazione ricerca 
    if($prodottoCercato != ""){    //se utente ha cercato qualcosa 
        $sql = "SELECT * from articoli where Titolo LIKE '%$prodottoCercato%'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){    
                $prodotto = new prodotto();
                $prodotto.print($row);               
                }  
            }
        }
    
   
?>