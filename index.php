<?php 
session_start();
include("connection.php");
include("prodotto.php");
$prodottoCercato = "";
if(isset($_POST["prodottoCercato"])){
    $prodottoCercato = $_POST["prodottoCercato"];     // ricerca di un prodotto nella barra
}
?>

<html>
<form action="" method="POST">
        <input type="text" placeholder="cerca..." name="prodottoCercato">
        <button type="submit">cerca</button>
</form>
</html>


<?php
 //se non sono loggato , bottone per loggare/ registrarmi 
 if(!$_SESSION["loggato"] || !isset($_SESSION["loggato"]) ){
    echo "<a href='login.php'>LOGIN</a><br>";
    echo "<a href='registrazione.php'>SIGN IN</a><br>";

}else{ //se sono loggato, bottone per logout e carrello 
    echo "ciao!".$_SESSION["nome"]."<br>";
    echo "<a href='pagCarrello.php'>carrello</a>";
    echo "<a href='logout.php'>LOGOUT</a><br>";
}


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