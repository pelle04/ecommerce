<?php 
session_start();
include("connection.php");
$prodottoCercato = "";
if(isset($_POST["prodottoCercato"])){
    $prodottoCercato = $_POST["prodottoCercato"];     // ricerca di un prodotto nella barra
}
?>

<html>
<form action="index.php" method="POST">
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
?>