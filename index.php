<?php 
session_start();
include("connection.php");
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
 if(!$_SESSION["loggato"]){
    echo "<a href='login.php'>LOGIN</a><br>";
    echo "<a href='registrazione.php'>SIGN IN</a><br>";

}else{ //se sono loggato, bottone per logout 
    echo "ciao!".$_SESSION["nome"]."<br>";
    echo "<a href='logout.php'>LOGOUT</a><br>";}


    //impaginazione ricerca 
    if($prodottoCercato != ""){    //se utente ha cercato qualcosa 
        $sql = "SELECT * from articoli where Titolo LIKE '%$prodottoCercato%'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){                    
                echo "<tr>".
                    "<td>".$row["Titolo"]."</td>". 
                    "<td>".$row["Autore"]."</td>". 
                    "<td>".$row["Prezzo"]."</td>". 
                    "<td><img src='img/".$row["IMG"]."'>"."</td>";
                    echo "</tr>";      
                    
                }  
            }
        }
    else{
        echo "ciao";
    }
    
   
?>